<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StorePositionRequest;
use App\Http\Requests\UpdatePositionRequest;
use App\Models\Position;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class PositionController extends Controller
{
    public function index(): View
    {
        $positions = Position::withCount('committeeMembers')->get();

        /** @var View $view */
        $view = view('positions.index', compact('positions'));

        return $view;
    }

    public function create(): View
    {
        /** @var View $view */
        $view = view('positions.create');

        return $view;
    }

    public function store(StorePositionRequest $request): RedirectResponse
    {
        Position::create($request->validated());

        return redirect()->route('dashboard.positions.index')
            ->with('status', __('committee.position_created'));
    }

    public function edit(Position $position): View
    {
        /** @var View $view */
        $view = view('positions.edit', compact('position'));

        return $view;
    }

    public function update(UpdatePositionRequest $request, Position $position): RedirectResponse
    {
        $position->update($request->validated());

        return redirect()->route('dashboard.positions.index')
            ->with('status', __('committee.position_updated'));
    }

    public function destroy(Position $position): RedirectResponse
    {
        $position->delete();

        return redirect()->route('dashboard.positions.index')
            ->with('status', __('committee.position_deleted'));
    }
}
