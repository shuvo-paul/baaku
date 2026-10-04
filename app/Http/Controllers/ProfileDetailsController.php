<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\SubmitProfileForReview;
use App\Actions\UpdateProfileDetails;
use App\Http\Requests\ProfileDetailsRequest;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class ProfileDetailsController extends Controller
{
    public function update(ProfileDetailsRequest $request): RedirectResponse
    {
        /** @var Profile $profile */
        $profile = $request->user()->profile()->firstOrCreate(); // route group guarantees existence; firstOrCreate avoids a null-profile fatal on direct hits
        (new UpdateProfileDetails)->handle($profile, $request->validated(), $request->file('photo'));
        (new SubmitProfileForReview)->handle($request->user());

        return redirect()->route('dashboard.profile')->with('status', 'profile-details-updated');
    }
}
