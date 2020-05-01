<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Posts;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('add-post', function ($user) {
            if($user->exists){
                return true;
            }else{
                return false;
            }
        });

        Gate::define('update-post', function ($user, Posts $post) {
            return $user->id == 1 or $user->id == 2;
        });
        Gate::define('delete-post', function ($user, Posts $post) {
            return $user->id == $post->user_id;
        });
    }
}
