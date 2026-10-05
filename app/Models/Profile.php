<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\BloodGroup;
use App\Enums\Gender;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $user_id
 * @property string|null $photo_path
 * @property string|null $date_of_birth
 * @property string|null $gender
 * @property string|null $blood_group
 * @property string|null $present_address
 * @property string|null $permanent_address
 * @property array{facebook?: string, linkedin?: string}|null $social_links
 * @property string|null $website
 * @property array{name: string|null, phone: string|null, relation: string|null}|null $emergency_contact
 * @property array<string, string>|null $local_names
 */
class Profile extends Model
{
    /** @var string */
    protected $table = 'profiles';

    /** @var list<string> */
    protected $fillable = [
        'user_id',
        'photo_path',
        'date_of_birth',
        'gender',
        'blood_group',
        'present_address',
        'permanent_address',
        'social_links',
        'website',
        'emergency_contact',
        'local_names',
    ];

    public function isComplete(): bool
    {
        return $this->gender !== null && $this->blood_group !== null;
    }

    public function photoUrl(): ?string
    {
        return $this->photo_path
            ? route('profile.photo.show', basename($this->photo_path))
            : null;
    }

    /** @return array<string, string> */
    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'social_links' => 'array',
            'emergency_contact' => 'array',
            'local_names' => 'array',
            'gender' => Gender::class,
            'blood_group' => BloodGroup::class,
        ];
    }

    /**
     * @phpstan-ignore missingType.generics
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @phpstan-ignore missingType.generics
     */
    public function educations(): HasMany
    {
        return $this->hasMany(Education::class);
    }

    /**
     * @phpstan-ignore missingType.generics
     */
    public function careers(): HasMany
    {
        return $this->hasMany(Career::class);
    }
}
