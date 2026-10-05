<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\CommitteeMember;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CommitteeOrdering extends Component
{
    /** @param  array<int, int>  $ids */
    public function reorder(array $ids): void
    {
        foreach ($ids as $position => $id) {
            CommitteeMember::where('id', $id)->update(['sort_order' => $position]);
        }
    }

    public function render(): View
    {
        return view('livewire.committee-ordering');
    }
}
