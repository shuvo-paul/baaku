<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\SubmitProfileForReview;
use App\Http\Requests\StoreProfileCareerRequest;
use App\Http\Requests\UpdateProfileCareerRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class ProfileCareerController extends Controller
{
    public function create(): View
    {
        $employmentTypes = config('alumkit.career.employment_types', []);

        /** @var View $view */
        $view = view('profile.careers.create', compact('employmentTypes'));

        return $view;
    }

    public function store(StoreProfileCareerRequest $request): RedirectResponse
    {
        $request->user()->careers()->create($request->validated());
        (new SubmitProfileForReview)->handle($request->user());

        return redirect(route('dashboard.profile').'#career')
            ->with('status', __('career.career_created'));
    }

    public function edit(Request $request, int $career): View
    {
        $career = $request->user()->careers()->findOrFail($career);
        $employmentTypes = config('alumkit.career.employment_types', []);

        /** @var View $view */
        $view = view('profile.careers.edit', compact('career', 'employmentTypes'));

        return $view;
    }

    public function update(UpdateProfileCareerRequest $request, int $career): RedirectResponse
    {
        $career = $request->user()->careers()->findOrFail($career);
        $career->update($request->validated());
        (new SubmitProfileForReview)->handle($request->user());

        return redirect(route('dashboard.profile').'#career')
            ->with('status', __('career.career_updated'));
    }

    public function destroy(Request $request, int $career): RedirectResponse
    {
        $request->user()->careers()->findOrFail($career)->delete();
        (new SubmitProfileForReview)->handle($request->user());

        return redirect(route('dashboard.profile').'#career')
            ->with('status', __('career.career_deleted'));
    }
}
