<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Education;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasEducations
{
    /** @return HasOne<Profile, $this> */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /** @return HasMany<Education, $this> */
    public function educations(): HasMany
    {
        return $this->profile->educations();
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    public function addEducation(array $attributes): Education
    {
        return $this->educations()->create($attributes); // @phpstan-ignore return.type
    }

    public function hasEducation(string $level): bool
    {
        return $this->educations()->where('level', $level)->exists();
    }
}
