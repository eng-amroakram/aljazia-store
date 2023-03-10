<?php


use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\Http\Controllers\ConfirmedPasswordStatusController;
use Laravel\Fortify\Http\Controllers\ConfirmedTwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\EmailVerificationPromptController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;
use Laravel\Fortify\Http\Controllers\TwoFactorSecretKeyController;
use Laravel\Fortify\Http\Controllers\VerifyEmailController;


Route::group([], function () {

    $prefix = 'admin/auth';
    $as = 'admin.auth.';

    if (config('customGuard') == 'admin' && request()->is('admin/*'))
    {
        $prefix = 'admin/auth';
        $as = 'admin.auth.';
    }
    elseif (config('customGuard') == 'manager'  && request()->is('manager/*'))
    {
        $prefix = 'manager/auth';
        $as = 'manager.auth.';
    }
    elseif (config('customGuard') == 'delivery' && request()->is('delivery/*'))
    {
        $prefix = 'delivery/auth';
        $as = 'delivery.auth.';
    }
    elseif (config('customGuard') == 'admin' && request()->is('/*'))
    {
        $prefix = 'admin/auth';
        $as = 'admin.auth.';

        // $prefix = 'auth';
        // $as = 'auth.';
    }



    Route::group(
        [
            'middleware' => config('fortify.middleware', ['web']),
            'prefix' => $prefix,
            'as' => $as
        ],

        function () {

            $enableViews = config('fortify.views', true);

            //Authentication...
            if ($enableViews) {
                Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                    ->middleware(['guest:' . config('fortify.guard')])
                    ->name('login');
            }

            $limiter = config('fortify.limiters.login');
            $twoFactorLimiter = config('fortify.limiters.two-factor');
            $verificationLimiter = config('fortify.limiters.verification', '6,1');

            Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware(array_filter([
                    'guest:' . config('fortify.guard'),
                    $limiter ? 'throttle:' . $limiter : null,
                ]));

            Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');


            // Registration...
            if (Features::enabled(Features::registration())) {
                if ($enableViews) {
                    Route::get('/register', [RegisteredUserController::class, 'create'])
                        ->middleware(['auth:' . config('fortify.guard')])
                        ->name('register');
                }

                Route::post('/register', [RegisteredUserController::class, 'store'])
                    ->middleware(['auth:' . config('fortify.guard')]);
            }


            // Password Reset...
            if (Features::enabled(Features::resetPasswords())) {
                if ($enableViews) {
                    #Page for requset resetting
                    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                        ->middleware(['guest:' . config('fortify.guard')])
                        ->name('password.request');

                    #Page for showing the page to enter the new password
                    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                        ->middleware(['guest:' . config('fortify.guard')])
                        ->name('password.reset');
                }

                #This route for writting your email to reset your password
                Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                    ->middleware(['guest:' . config('fortify.guard')])
                    ->name('password.email');

                #This route for writting your new password
                Route::post('/reset-password', [NewPasswordController::class, 'store'])
                    ->middleware(['guest:' . config('fortify.guard')])
                    ->name('password.update');
            }



            // Email Verification...
            if (Features::enabled(Features::emailVerification())) {
                if ($enableViews) {
                    Route::get('/email/verify', [EmailVerificationPromptController::class, '__invoke'])
                        ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard')])
                        ->name('verification.notice');
                }

                Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                    ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard'), 'signed', 'throttle:' . $verificationLimiter])
                    ->name('verification.verify');

                Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                    ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard'), 'throttle:' . $verificationLimiter])
                    ->name('verification.send');
            }

            // Profile Information...
            if (Features::enabled(Features::updateProfileInformation())) {
                Route::put('/user/profile-information', [ProfileInformationController::class, 'update'])
                    ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard')])
                    ->name('user-profile-information.update');
            }

            // Passwords...
            if (Features::enabled(Features::updatePasswords())) {
                Route::put('/user/password', [PasswordController::class, 'update'])
                    ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard')])
                    ->name('user-password.update');
            }


            // Password Confirmation...
            if ($enableViews) {
                Route::get('/user/confirm-password', [ConfirmablePasswordController::class, 'show'])
                    ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard')]);
            }

            Route::get('/user/confirmed-password-status', [ConfirmedPasswordStatusController::class, 'show'])
                ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard')])
                ->name('password.confirmation');

            Route::post('/user/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware([config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard')])
                ->name('password.confirm');


            // Two Factor Authentication...
            if (Features::enabled(Features::twoFactorAuthentication())) {


                if ($enableViews) {

                    #This route for guest user to enter the account so here is the page for that
                    Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])
                        ->middleware(['guest:' . config('fortify.guard')])
                        ->name('two-factor.login');
                }

                #This route for enter the code of 2fa with times throttle
                Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store'])
                    ->middleware(array_filter([
                        'guest:' . config('fortify.guard'),
                        $twoFactorLimiter ? 'throttle:' . $twoFactorLimiter : null,
                    ]));

                $twoFactorMiddleware = Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword')
                    ? [config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard'), 'password.confirm']
                    : [config('fortify.auth_middleware', 'auth') . ':' . config('fortify.guard')];

                #This route using it to enable two factor Auth
                Route::post('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store'])
                    ->middleware($twoFactorMiddleware)
                    ->name('two-factor.enable');

                #This confirm the 2fa
                Route::post('/user/confirmed-two-factor-authentication', [ConfirmedTwoFactorAuthenticationController::class, 'store'])
                    ->middleware($twoFactorMiddleware)
                    ->name('two-factor.confirm');

                #This route using it to disable two factor Auth
                Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy'])
                    ->middleware($twoFactorMiddleware)
                    ->name('two-factor.disable');


                #With Js
                Route::get('/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show'])
                    ->middleware($twoFactorMiddleware)
                    ->name('two-factor.qr-code');

                Route::get('/user/two-factor-secret-key', [TwoFactorSecretKeyController::class, 'show'])
                    ->middleware($twoFactorMiddleware)
                    ->name('two-factor.secret-key');

                #To show the list of recovery codes
                Route::get('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'index'])
                    ->middleware($twoFactorMiddleware)
                    ->name('two-factor.recovery-codes');

                #To regenerate codes
                Route::post('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'store'])
                    ->middleware($twoFactorMiddleware);
            }
        }
    );
});
