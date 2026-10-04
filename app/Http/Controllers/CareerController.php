<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
use App\Models\Career;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class CareerController extends Controller
{
    public function index(): View
    {
        $careers = Career::with('profile')->latest()->get();

        /** @var View $view */
        $view = view('careers.index', compact('careers'));

        return $view;
    }

    public function create(): View
    {
        $employmentTypes = config('alumkit.career.employment_types', []);
        $userModel = config('alumkit.auth.user_model');
        $users = $userModel::all();

        /** @var View $view */
        $view = view('careers.create', compact('employmentTypes', 'users'));

        return $view;
    }

    public function store(StoreCareerRequest $request): RedirectResponse
    {
        Career::create($request->validated());

        return redirect()->route('dashboard.careers.index')
            ->with('status', __('career.career_created'));
    }

    public function edit(Career $career): View
    {
        $employmentTypes = config('alumkit.career.employment_types', []);

        /** @var View $view */
        $view = view('careers.edit', compact('career', 'employmentTypes'));

        return $view;
    }

    public function update(UpdateCareerRequest $request, Career $career): RedirectResponse
    {
        $career->update($request->validated());

        return redirect()->route('dashboard.careers.index')
            ->with('status', __('career.career_updated'));
    }

    public function destroy(Career $career): RedirectResponse
    {
        $career->delete();

        return redirect()->route('dashboard.careers.index')
            ->with('status', __('career.career_deleted'));
    }
}
