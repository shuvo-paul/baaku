<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\SubmitProfileForReview;
use App\Http\Requests\StoreProfileEducationRequest;
use App\Http\Requests\UpdateProfileEducationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class ProfileEducationController extends Controller
{
    public function create(): View
    {
        /** @var View $view */
        $view = view('profile.educations.create');

        return $view;
    }

    public function store(StoreProfileEducationRequest $request): RedirectResponse
    {
        $request->user()->educations()->create($request->validated());
        (new SubmitProfileForReview)->handle($request->user());

        return redirect(route('dashboard.profile').'#education')
            ->with('status', __('education.education_created'));
    }

    public function edit(Request $request, int $education): View
    {
        $education = $request->user()->educations()->findOrFail($education);

        /** @var View $view */
        $view = view('profile.educations.edit', compact('education'));

        return $view;
    }

    public function update(UpdateProfileEducationRequest $request, int $education): RedirectResponse
    {
        $education = $request->user()->educations()->findOrFail($education);
        $education->update($request->validated());
        (new SubmitProfileForReview)->handle($request->user());

        return redirect(route('dashboard.profile').'#education')
            ->with('status', __('education.education_updated'));
    }

    public function destroy(Request $request, int $education): RedirectResponse
    {
        $request->user()->educations()->findOrFail($education)->delete();
        (new SubmitProfileForReview)->handle($request->user());

        return redirect(route('dashboard.profile').'#education')
            ->with('status', __('education.education_deleted'));
    }
}
