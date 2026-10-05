<?php

declare(strict_types=1);

namespace App\Actions\Fortify;

use App\Enums\UserState;
use App\Http\Requests\RegisterUserRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    /**
     * @param  array<string, mixed>  $input
     */
    public function create(array $input): User
    {
        $request = new RegisterUserRequest;

        $validator = Validator::make($input, $request->rules(), $request->messages());

        $validator->after(function (\Illuminate\Validation\Validator $validator) use ($input): void {
            foreach ($input['educations'] ?? [] as $i => $education) {
                if (empty($education['end_year']) && empty($education['is_current'])) {
                    $validator->errors()->add("educations.{$i}.end_year", __('validation.required', ['attribute' => 'end year']));
                }
            }
        });

        $validated = $validator->validate();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'state' => UserState::Unverified->value,
        ]);

        /** @var Profile $profile */
        $profile = $user->profile()->firstOrCreate();

        foreach ($validated['educations'] as $education) {
            $profile->educations()->create($education);
        }

        return $user;
    }
}
