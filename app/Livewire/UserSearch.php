<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class UserSearch extends Component
{
    public string $name;

    public ?string $fieldLabel = null;

    public ?int $selectedUserId = null;

    public ?string $query = null;

    /** @var array<int, array{id: int, name: string, email: string}> */
    public array $results = [];

    public bool $showResults = false;

    public function mount(string $name, ?string $fieldLabel = null, ?int $selectedUserId = null): void
    {
        $this->name = $name;
        $this->fieldLabel = $fieldLabel;
        $this->selectedUserId = $selectedUserId;

        if ($selectedUserId) {
            $user = User::find($selectedUserId);

            if ($user) {
                /** @phpstan-ignore property.notFound */
                $userName = $user->name;
                /** @phpstan-ignore property.notFound */
                $userEmail = $user->email;
                $this->query = $userName.' — '.$userEmail;
            }
        }
    }

    public function updatedQuery(): void
    {
        if (blank($this->query) || strlen($this->query) < 2) {
            $this->results = [];
            $this->showResults = false;

            return;
        }

        $this->results = User::query()
            ->where('state', 'active')
            ->where(function (Builder $q): void {
                $q->where('name', 'like', '%'.$this->query.'%')
                    ->orWhere('email', 'like', '%'.$this->query.'%');
            })
            ->limit(8)
            ->get(['id', 'name', 'email'])
            ->toArray();

        $this->showResults = true;
    }

    public function select(int $userId, string $name): void
    {
        $this->selectedUserId = $userId;
        $this->query = $name;
        $this->showResults = false;
        $this->results = [];
    }

    public function clear(): void
    {
        $this->selectedUserId = null;
        $this->query = null;
        $this->results = [];
        $this->showResults = false;
    }

    public function render(): View
    {
        return view('livewire.user-search');
    }
}
