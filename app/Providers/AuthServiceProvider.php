<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Models\Attachment' => 'App\Policies\AttachmentPolicy',
        'App\Models\Application' => 'App\Policies\ApplicationPolicy',
        'App\Models\Notification' => 'App\Policies\NotificationPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
        'App\Models\UserOtp' => 'App\Policies\UserOtpPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
