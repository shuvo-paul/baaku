<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Models\Education;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class EducationController extends Controller
{
    public function index(): View
    {
        $educations = Education::with('profile')->latest()->get();

        /** @var View $view */
        $view = view('educations.index', compact('educations'));

        return $view;
    }

    public function create(): View
    {
        $users = User::all();

        /** @var View $view */
        $view = view('educations.create', compact('users'));

        return $view;
    }

    public function store(StoreEducationRequest $request): RedirectResponse
    {
        Education::create($request->validated());

        return redirect()->route('dashboard.educations.index')
            ->with('status', __('education.education_created'));
    }

    public function edit(Education $education): View
    {
        /** @var View $view */
        $view = view('educations.edit', compact('education'));

        return $view;
    }

    public function update(UpdateEducationRequest $request, Education $education): RedirectResponse
    {
        $education->update($request->validated());

        return redirect()->route('dashboard.educations.index')
            ->with('status', __('education.education_updated'));
    }

    public function destroy(Education $education): RedirectResponse
    {
        $education->delete();

        return redirect()->route('dashboard.educations.index')
            ->with('status', __('education.education_deleted'));
    }
}
