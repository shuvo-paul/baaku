<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Career;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasCareers
{
    /** @return HasMany<Career, $this> */
    public function careers(): HasMany
    {
        return $this->profile->careers();
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    public function addCareer(array $attributes): Career
    {
        return $this->careers()->create($attributes); // @phpstan-ignore return.type
    }

    public function currentCareer(): ?Career
    {
        return $this->careers()->where('is_current', true)->first(); // @phpstan-ignore return.type
    }
}
