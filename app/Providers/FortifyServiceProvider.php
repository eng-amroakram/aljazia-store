<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Admin;
use App\Models\Delivery;
use App\Models\StoreManager;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        // dd('register');
        Fortify::ignoreRoutes();   #We are using this method to remove the default routes in Fortify

        $request = request();
        // dd($request->getUri(), $request->getMethod(), $request->getPathInfo(), $request->is('admin/*'), $request->is('store-manager/*'));
        $this->registerGuard($request);
        // $this->userSubDomain($request);
        $this->fortifyConfigRegister();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {

        // dd('boot',$request->getUri(), $request->getMethod(),config('customGuard'), $request->getPathInfo(), $request->is('admin/*'), $request->is('store-manager/*'));

        // $this->fortifyConfigRegister();
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        $this->fortifyConfigBoot();


        $admin = Admin::where('email', $request->email)->first();
        $store_mamager = StoreManager::where('email', $request->email)->first();
        $delivery = Delivery::where('email', $request->email)->first();

        if (config('customGuard') == 'admin' && $request->is('admin/*')) {
            if ($admin) {

                Fortify::authenticateUsing(function (Request $request) {
                    $admin = Admin::where('email', $request->email)->first();
                    if ($admin && Hash::check($request->password, $admin->password)) {
                        // dd($admin, Config::get('fortify.guard'));
                        // Auth::guard('admin')->login($admin);
                        return $admin;
                    }
                });
            }
        } elseif (config('customGuard') == 'manager' && $request->is('manager/*')) {
            if ($store_mamager) {
                Fortify::authenticateUsing(function (Request $request) {
                    $store_mamager = StoreManager::where('email', $request->email)->first();
                    if ($store_mamager && Hash::check($request->password, $store_mamager->password)) {
                        // Auth::guard('admin')->login($admin);
                        return $store_mamager;
                    }
                });
            }
        } elseif (config('customGuard') == 'delivery' && $request->is('delivery/*')) {
            if ($delivery) {
                Fortify::authenticateUsing(function (Request $request) {
                    $delivery = Delivery::where('email', $request->email)->first();
                    if ($delivery && Hash::check($request->password, $delivery->password)) {
                        // Auth::guard('admin')->login($admin);
                        return $delivery;
                    }
                });
            }
        }

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }

    // public function userSubDomain($request)
    // {
    //     // $request->getHost();

    //     // $subDomain = explode('.', $request->getHost())[0];

    //     if (config('sub_domain') == 'admin' && $request->is('admin/*')) {
    //         Config::set('sub_domain', 'admin');
    //     } elseif (config('sub_domain') == 'store-manager' && $request->is('store-manager/*')) {
    //         Config::set('sub_domain', 'store-manager');
    //     } elseif (config('sub_domain') == 'delivery' && $request->is('delivery')) {
    //         Config::set('sub_domain', 'delivery');
    //     }
    //     Config::set('sub_domain', 'user');
    // }

    public function registerGuard($request)
    {
        if ($request->is('admin/*')) {
            Config::set('customGuard', 'admin');
        } elseif ($request->is('manager/*')) {
            Config::set('customGuard', 'manager');
        } elseif ($request->is('delivery/*')) {
            Config::set('customGuard', 'delivery');
        } else {
            Config::set('customGuard', 'admin');
            // Config::set('customGuard', 'web');
        }
    }

    public function fortifyConfigRegister()
    {

        if (config('customGuard') == 'admin' && request()->is('admin/*')) {
            // dd(34);
            /*1*/
            Config::set('fortify.guard', 'admin');  #The Guard System
            /*2*/
            Config::set('fortify.prefix', 'admin'); #The Routing Prefixing
            /*3*/
            Config::set('fortify.home', 'admin/home'); #The Home Page After Login and Registeration
            /*4*/
            Config::set('fortify.username', 'email'); #The Filed of Email or Username
            /*5*/
            Config::set('fortify.passwords', 'admins'); #The Table for Checking Password Resetting
            /*6*/
            Config::set('fortify.login', 'admin/auth/login'); #The Route After Restting Password
            /*12*/
            Config::set('fortify.redirects.register', 'admin/index/admins');


            /*7*/   // Config::set('fortify.redirects.password-reset', 'admin.auth.password.reset'); #The Page Which Will Be Sent To The Email
            /*8*/  // Config::Set('fortify.redirects.email-verification', 'auth.verification.notice');
            /*9*/  // Config::set('fortify.redirects.password-confirmation', 'auth.password.confirm');
            /*10*/ // Config::set('fortify.redirects.login-throttling', 'auth.throttle');
            /*11*/ // Config::set('fortify.redirects.logout', 'auth.logout');


            $this->app->instance(LogoutResponse::class, new class implements LogoutResponse
            {
                public function toResponse($request)
                {
                    return redirect('/admin/auth/login')->with('adminLogout', "You have loged out");
                }
            });
        }


        if (config('customGuard') == 'manager'  && request()->is('manager/*')) {
            /*1*/
            Config::set('fortify.guard', 'manager');  #The Guard System
            /*2*/
            Config::set('fortify.prefix', 'manager'); #The Routing Prefixing
            /*3*/
            Config::set('fortify.home', 'manager/home'); #The Home Page After Login and Registeration
            /*4*/
            Config::set('fortify.username', 'email'); #The Filed of Email or Username
            /*5*/
            Config::set('fortify.passwords', 'store_managers'); #The Table for Checking Password Resetting
            /*6*/
            Config::set('fortify.login', 'manager/auth/login'); #The Route After Restting Password
            /*7*/ //Config::set('fortify.redirects.password-reset', 'admin.auth.password.reset'); #The Page Which Will Be Sent To The Email

            /*8*/  //  Config::Set('fortify.redirects.email-verification', 'auth.verification.notice');
            /*9*/  //  Config::set('fortify.redirects.password-confirmation', 'auth.password.confirm');
            /*10*/ // Config::set('fortify.redirects.login-throttling', 'auth.throttle');
            /*11*/ // Config::set('fortify.redirects.logout', 'auth.logout');
            /*12*/ // Config::set('fortify.redirects.register', 'auth.register');

            $this->app->instance(LogoutResponse::class, new class implements LogoutResponse
            {
                public function toResponse($request)
                {
                    return redirect('manager/auth/login')->with('storeManagerLogout', "You have loged out");
                }
            });

        } elseif (config('customGuard') == 'delivery'   && request()->is('delivery/*')) {
            dd('delivery');
            /*1*/
            Config::set('fortify.guard', 'delivery');  #The Guard System
            /*2*/
            Config::set('fortify.prefix', 'delivery'); #The Routing Prefixing
            /*3*/
            Config::set('fortify.home', 'delivery/home'); #The Home Page After Login and Registeration
            /*4*/
            Config::set('fortify.username', 'email'); #The Filed of Email or Username
            /*5*/
            Config::set('fortify.passwords', 'deliveries'); #The Table for Checking Password Resetting
            /*6*/
            Config::set('fortify.login', 'delivery/auth/login'); #The Route After Restting Password
            /*7*/ //Config::set('fortify.redirects.password-reset', 'admin.auth.password.reset'); #The Page Which Will Be Sent To The Email

            /*8*/  //  Config::Set('fortify.redirects.email-verification', 'auth.verification.notice');
            /*9*/  //  Config::set('fortify.redirects.password-confirmation', 'auth.password.confirm');
            /*10*/ // Config::set('fortify.redirects.login-throttling', 'auth.throttle');
            /*11*/ // Config::set('fortify.redirects.logout', 'auth.logout');
            /*12*/ // Config::set('fortify.redirects.register', 'auth.register');

            $this->app->instance(LogoutResponse::class, new class implements LogoutResponse
            {
                public function toResponse($request)
                {
                    return redirect('delivery/auth/login')->with('deliveryLogout', "You have loged out");
                }
            });
        }
        elseif(  config('customGuard') == 'web' && request()->is('/*')) {
            // dd(34);
            /*1*/
            Config::set('fortify.guard', 'admin');  #The Guard System
            /*2*/
            Config::set('fortify.prefix', 'admin'); #The Routing Prefixing
            /*3*/
            Config::set('fortify.home', 'admin/home'); #The Home Page After Login and Registeration
            /*4*/
            Config::set('fortify.username', 'email'); #The Filed of Email or Username
            /*5*/
            Config::set('fortify.passwords', 'admins'); #The Table for Checking Password Resetting
            /*6*/
            Config::set('fortify.login', 'admin/auth/login'); #The Route After Restting Password
            /*12*/
            Config::set('fortify.redirects.register', 'admin/index/admins');


            /*7*/   // Config::set('fortify.redirects.password-reset', 'admin.auth.password.reset'); #The Page Which Will Be Sent To The Email
            /*8*/  // Config::Set('fortify.redirects.email-verification', 'auth.verification.notice');
            /*9*/  // Config::set('fortify.redirects.password-confirmation', 'auth.password.confirm');
            /*10*/ // Config::set('fortify.redirects.login-throttling', 'auth.throttle');
            /*11*/ // Config::set('fortify.redirects.logout', 'auth.logout');


            $this->app->instance(LogoutResponse::class, new class implements LogoutResponse
            {
                public function toResponse($request)
                {
                    return redirect('/admin/auth/login')->with('adminLogout', "You have loged out");
                }
            });


            /*1*/
            // // dd(34);
            // Config::set('fortify.guard', 'web');
            // /*2*/
            // Config::set('fortify.prefix', 'auth');
            // /*3*/
            // Config::set('fortify.home', 'home');
            // /*4*/
            // Config::set('fortify.username', 'email');
            // /*5*/
            // Config::set('fortify.passwords', 'users');
            // /*6*/
            // Config::set('fortify.login', 'auth/login');

            // /*7*/  //  Config::set('fortify.redirects.password-reset', 'auth.password.reset');
            // /*8*/  // Config::Set('fortify.redirects.email-verification', 'auth.verification.notice');
            // /*9*/  // Config::set('fortify.redirects.password-confirmation', 'auth.password.confirm');
            // /*10*/ // Config::set('fortify.redirects.login-throttling', 'auth.throttle');
            // /*11*/ // Config::set('fortify.redirects.logout', 'auth.logout');
            // /*12*/ // Config::set('fortify.redirects.register', 'auth.register');

            // $this->app->instance(LogoutResponse::class, new class implements LogoutResponse
            // {
            //     public function toResponse($request)
            //     {
            //         return redirect('/auth/login')->with('userLogout', "You have loged out");
            //     }
            // });
        }
    }

    public function fortifyConfigBoot()
    {
        if (config('customGuard') == 'admin' && request()->is('admin/*')) {
            Fortify::loginView('dashboard.auth.login');
            // dd(34,'fortifyConfigBoot');
            // Fortify::registerView('dashboard.auth.register');
            // Fortify::requestPasswordResetLinkView('dashboard.auth.password.password_request');
            // Fortify::resetPasswordView('dashboard.auth.password.password_reset');
            // Fortify::confirmPasswordView('dashboard.auth.password.confirm_password');
            // Fortify::twoFactorChallengeView('dashboard.auth.TwoFactorAuth.two_factor_auth');
            // Fortify::verifyEmailView('dashboard.auth.email.verify.verify_email');
        }
        elseif (config('customGuard') == 'manager' && request()->is('manager/*')) {
            Fortify::loginView('dashboard.auth.login');
            // Fortify::registerView('web.delivery.auth.register');
            // Fortify::requestPasswordResetLinkView('dashboard.auth.password.password_request');
            // Fortify::resetPasswordView('dashboard.auth.password.password_reset');
            // Fortify::confirmPasswordView('dashboard.auth.password.confirm_password');
            // Fortify::twoFactorChallengeView('dashboard.auth.TwoFactorAuth.two_factor_auth');
            // Fortify::verifyEmailView('dashboard.auth.email.verify.verify_email');
        } elseif (config('customGuard') == 'delivery' && request()->is('delivery/*')) {
            // dd(34,'fortifyConfigBoot');

            Fortify::loginView('web.delivery.auth.login');
            // Fortify::registerView('web.delivery.auth.register');
            // Fortify::requestPasswordResetLinkView('dashboard.auth.password.password_request');
            // Fortify::resetPasswordView('dashboard.auth.password.password_reset');
            // Fortify::confirmPasswordView('dashboard.auth.password.confirm_password');
            // Fortify::twoFactorChallengeView('dashboard.auth.TwoFactorAuth.two_factor_auth');
            // Fortify::verifyEmailView('dashboard.auth.email.verify.verify_email');
        } elseif(config('customGuard') == 'web' && request()->is('/*')) {
            // dd(34,'fortifyConfigBoot');

            // Fortify::loginView('web.auth.login');
            Fortify::loginView('dashboard.auth.login');

            // Fortify::registerView('web.auth.register');
            // Fortify::requestPasswordResetLinkView('auth.password.password_request');
            // Fortify::resetPasswordView('auth.password.password_reset');
            // Fortify::confirmPasswordView('auth.password.confirm_password');
            // Fortify::twoFactorChallengeView('auth.TwoFactorAuth.two_factor_auth');
            // Fortify::verifyEmailView('auth.email.verify.verify_email');
        }
    }
}
