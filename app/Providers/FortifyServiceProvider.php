<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    // ===============================
    // View login, register, forgot, reset password
    // ===============================
    Fortify::loginView(fn() => view('auth.login'));
    Fortify::registerView(fn() => view('auth.register'));

     // lupa password
        Fortify::requestPasswordResetLinkView(function() {
            return view('auth.forgot-password');
        });

        // reset password
        Fortify::resetPasswordView(function($request) {
            return view('auth.reset-password', ['request' => $request]);
        });

    // ===============================
    // Action Fortify
    // ===============================
    Fortify::createUsersUsing(CreateNewUser::class);
    Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
    Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
    Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

    // ===============================
    // Rate limiter
    // ===============================
    RateLimiter::for('login', function (Request $request) {
        return Limit::perMinute(5)->by($request->email . $request->ip());
    });

    RateLimiter::for('two-factor', function (Request $request) {
        return Limit::perMinute(5)->by($request->session()->get('login.id'));
    });

    // ===============================
    // Redirect setelah LOGIN sesuai role
    // ===============================
    $this->app->singleton(LoginResponse::class, function () {
        return new class implements LoginResponse {
            public function toResponse($request)
            {
                $user = Auth::user();

                return redirect()->to(match ($user->role) {
                    'admin'   => '/admin/dashboard',
                    'kurir'   => '/kurir/dashboard',
                    default   => '/pelanggan/home',
                });
            }
        };
    });

    // Redirect setelah REGISTER otomatis login (hanya pelanggan)
    $this->app->singleton(RegisterResponse::class, function () {
        return new class implements RegisterResponse {
            public function toResponse($request)
            {
                // Register hanya pelanggan
                return redirect()->route('pelanggan.home');
            }
        };
    });
}
}