<?php

declare(strict_types=1);

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\CompleteProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditorImageController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\GlobalContentController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MembershipPaymentMethodController;
use App\Http\Controllers\MembershipPlanController;
use App\Http\Controllers\MyMembershipController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileCareerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileDetailsController;
use App\Http\Controllers\ProfileEducationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\UserStateController;
use Illuminate\Support\Facades\Route;

// Editor image uploads: streamed through the app (no storage:link requirement).
Route::get('media/editor-images/{file}', [MediaController::class, 'editorImage'])
    ->name('editor.image.show')->where('file', '[\w.\-]+');

// Post thumbnails: streamed through the app (no storage:link requirement).
if (config('features.posts')) {
    Route::get('media/post-thumbnails/{file}', [MediaController::class, 'postThumbnail'])
        ->name('posts.thumbnail')->where('file', '[\w.\-]+');
}

// Profile photos: streamed through the app (no storage:link requirement).
Route::get('media/profile-photos/{file}', [MediaController::class, 'profilePhoto'])
    ->name('profile.photo.show')->where('file', '[\w.\-]+');

// Committee photos: streamed through the app (no storage:link requirement).
if (config('features.committee')) {
    Route::get('media/committee-photos/{file}', [MediaController::class, 'committeePhoto'])
        ->name('committee.photo')->where('file', '[\w.\-]+');
}

// Profile completion: accessible after email verification, before full profile is submitted.
Route::middleware(['auth', 'verified', 'user.suspended'])->group(function () {
    Route::get('profile/complete', [CompleteProfileController::class, 'create'])->name('profile.complete');
    Route::post('profile/complete', [CompleteProfileController::class, 'store'])->name('profile.complete.store');
    Route::post('editor/image', [EditorImageController::class, 'store'])->name('editor.image');
});

// Protected routes: require auth, email verification, and completed profile.
// Suspended users keep /dashboard access; sub-routes redirect back via user.suspended.
Route::middleware(['auth', 'verified', 'complete-profile.check'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->middleware('user.suspended')->group(function () {
        Route::middleware('permission:view activity log')->group(function () {
            Route::get('activity-log', [ActivityLogController::class, 'index'])->name('activity.index');
        });

        Route::get('profile', ProfileController::class)->name('profile');

        Route::put('profile/details', [ProfileDetailsController::class, 'update'])->name('profile.details.update');

        Route::prefix('profile')->name('profile.')->whereNumber(['education', 'career'])->group(function () {
            Route::get('educations/create', [ProfileEducationController::class, 'create'])->name('educations.create');
            Route::post('educations', [ProfileEducationController::class, 'store'])->name('educations.store');
            Route::get('educations/{education}/edit', [ProfileEducationController::class, 'edit'])->name('educations.edit');
            Route::put('educations/{education}', [ProfileEducationController::class, 'update'])->name('educations.update');
            Route::delete('educations/{education}', [ProfileEducationController::class, 'destroy'])->name('educations.destroy');

            Route::get('careers/create', [ProfileCareerController::class, 'create'])->name('careers.create');
            Route::post('careers', [ProfileCareerController::class, 'store'])->name('careers.store');
            Route::get('careers/{career}/edit', [ProfileCareerController::class, 'edit'])->name('careers.edit');
            Route::put('careers/{career}', [ProfileCareerController::class, 'update'])->name('careers.update');
            Route::delete('careers/{career}', [ProfileCareerController::class, 'destroy'])->name('careers.destroy');
        });
        Route::middleware('permission:manage roles')->group(function () {
            Route::resource('roles', RoleController::class)->except(['show']);
        });

        Route::middleware('permission:manage educations')->group(function () {
            Route::resource('educations', EducationController::class)->except(['show']);
        });

        Route::middleware('permission:manage careers')->group(function () {
            Route::resource('careers', CareerController::class)->except(['show']);
        });
        Route::middleware('permission:manage pages')->group(function () {
            Route::resource('pages', PageController::class)->only(['index', 'edit', 'update']);

            Route::get('globals', [GlobalContentController::class, 'index'])->name('globals.index');
            Route::get('globals/{key}', [GlobalContentController::class, 'edit'])->name('globals.edit');
            Route::put('globals/{key}', [GlobalContentController::class, 'update'])->name('globals.update');
        });

        if (config('features.posts')) {
            Route::middleware('user.approved')->group(function () {
                Route::resource('posts', PostController::class)->middleware('membership:posts');
            });
        }

        Route::middleware('user.approved')->group(function () {
            Route::get('users', [UserRoleController::class, 'index'])->name('users.index')->middleware('membership:members');
            Route::get('users/{user}', [UserRoleController::class, 'show'])->name('users.show')->middleware('membership:members');
        });

        Route::middleware('permission:manage members')->group(function () {
            Route::get('users/{user}/roles', [UserRoleController::class, 'edit'])->name('users.roles.edit');
            Route::put('users/{user}/roles', [UserRoleController::class, 'update'])->name('users.roles.update');
            Route::put('users/{user}/state', [UserStateController::class, 'update'])->name('users.state.update');
        });

        // positions are committee-only — toggled with the committee feature
        if (config('features.committee')) {
            Route::middleware('permission:manage committee')->group(function () {
                Route::resource('positions', PositionController::class)->except(['show']);
                Route::resource('committee', CommitteeController::class)->except(['show']);
                Route::post('committee/reorder', [CommitteeController::class, 'reorder'])->name('committee.reorder');
            });
        }

        // memberships — toggled with the memberships feature
        if (config('features.memberships')) {
            Route::middleware('user.approved')->group(function () {
                Route::get('membership', [MyMembershipController::class, 'show'])->name('membership.show');
                Route::get('membership/plans', [MyMembershipController::class, 'plans'])->name('membership.plans');
                Route::get('membership/payments/create', [MyMembershipController::class, 'createPayment'])->name('membership.payments.create');
                Route::post('membership/payments', [MyMembershipController::class, 'storePayment'])->name('membership.payments.store');
                Route::get('membership/payments/{payment}', [MyMembershipController::class, 'showPayment'])
                    ->name('membership.payments.show')
                    ->whereNumber('payment');
                Route::get('membership/payments/{payment}/proof', [MyMembershipController::class, 'proof'])
                    ->name('membership.payments.proof')
                    ->whereNumber('payment');
            });

            Route::middleware('permission:manage membership plans')->group(function () {
                Route::resource('plans', MembershipPlanController::class)->except(['show']);
                Route::post('plans/reorder', [MembershipPlanController::class, 'reorder'])->name('plans.reorder');
                Route::resource('payment-methods', MembershipPaymentMethodController::class)
                    ->except(['show'])
                    ->parameters(['payment-methods' => 'paymentMethod']);
                Route::post('payment-methods/reorder', [MembershipPaymentMethodController::class, 'reorder'])->name('payment-methods.reorder');
            });

            Route::middleware('permission:manage memberships')->group(function () {
                Route::get('memberships', [MembershipController::class, 'index'])->name('memberships.index');
                Route::get('memberships/{membership}', [MembershipController::class, 'show'])
                    ->name('memberships.show')
                    ->whereNumber('membership');
                Route::put('memberships/{membership}', [MembershipController::class, 'update'])
                    ->name('memberships.update')
                    ->whereNumber('membership');
                Route::post('memberships/{membership}/cancel', [MembershipController::class, 'cancel'])
                    ->name('memberships.cancel')
                    ->whereNumber('membership');

                Route::get('payments', [PaymentController::class, 'index'])->name('payments.index');
                Route::get('payments/create', [PaymentController::class, 'create'])->name('payments.create');
                Route::post('payments', [PaymentController::class, 'store'])->name('payments.store');
                Route::get('payments/{payment}', [PaymentController::class, 'show'])
                    ->name('payments.show')
                    ->whereNumber('payment');
                Route::get('payments/{payment}/proof', [PaymentController::class, 'proof'])
                    ->name('payments.proof')
                    ->whereNumber('payment');
                Route::post('payments/{payment}/approve', [PaymentController::class, 'approve'])
                    ->name('payments.approve')
                    ->whereNumber('payment');
                Route::post('payments/{payment}/reject', [PaymentController::class, 'reject'])
                    ->name('payments.reject')
                    ->whereNumber('payment');
            });
        }
    });
});
