<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\UpdateProfileDetails;
use App\Enums\EmploymentType;
use App\Http\Requests\ProfileDetailsRequest;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class CompleteProfileController extends Controller
{
    public function create(Request $request): View|RedirectResponse
    {
        if ($request->user()->profile?->isComplete()) {
            return redirect()->route('dashboard');
        }

        $employmentTypes = config('alumkit.career.employment_types', []);
        $adminRole = config('alumkit.permission.default_roles', ['admin', 'moderator', 'member'])[0] ?? 'admin';
        $isAdmin = $request->user()->hasRole($adminRole);

        /** @var View $view */
        $view = view('auth.complete-profile', compact('employmentTypes', 'isAdmin'));

        return $view;
    }

    public function store(ProfileDetailsRequest $request): RedirectResponse
    {
        if ($request->user()->profile?->isComplete()) {
            return redirect()->route('dashboard');
        }

        $validated = $request->validated(); // detail fields (FormRequest)
        $validator = Validator::make($request->all(), [
            'gender' => ['required'],
            'blood_group' => ['required'],
            'careers' => ['nullable', 'array'],
            'careers.*.job_title' => ['required', 'string', 'max:255'],
            'careers.*.company' => ['required', 'string', 'max:255'],
            'careers.*.employment_type' => ['required', Rule::in(array_column(EmploymentType::cases(), 'value'))],
            'careers.*.industry' => ['nullable', 'string', 'max:255'],
            'careers.*.location' => ['nullable', 'string', 'max:255'],
            'careers.*.start_year' => ['required', 'integer', 'digits:4'],
            'careers.*.start_month' => ['nullable', 'integer', 'between:1,12'],
            'careers.*.is_current' => ['boolean'],
            'careers.*.end_year' => ['nullable', 'integer', 'digits:4'],
            'careers.*.end_month' => ['nullable', 'integer', 'between:1,12'],
            'careers.*.description' => ['nullable', 'string'],
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $validated = array_merge($validated, $validator->validated());

        $user = $request->user();

        /** @var Profile $profile */
        $profile = $user->profile()->firstOrCreate();

        $user->setRelation('profile', $profile);

        (new UpdateProfileDetails)->handle($profile, $validated, $request->file('photo'));

        foreach ($validated['careers'] ?? [] as $career) {
            $user->careers()->create($career);
        }

        activity('profile')->performedOn($user)->event('submitted')->log('profile submitted');

        $adminRole = config('alumkit.permission.default_roles', ['admin', 'moderator', 'member'])[0] ?? 'admin';

        if (! $user->hasRole($adminRole)) {
            return redirect()->route('dashboard')
                ->with('status', __('auth.profile_completed'));
        }

        return redirect()->route('dashboard');
    }
}
