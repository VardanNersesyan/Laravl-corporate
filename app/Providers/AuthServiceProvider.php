<?php

namespace Corp\Providers;
use Corp\Article;
use Corp\Menu;
use Corp\Permission;
use Corp\Policies\ArticlePolicy;
use Corp\Policies\MenusPolicy;
use Corp\Policies\PermissionPolicy;
use Corp\Policies\UserPolicy;
use Corp\User;
use Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
        Permission::class => PermissionPolicy::class,
        Menu::class => MenusPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('VIEW_ADMIN', function ($user) {
            return $user->canDo('VIEW_ADMIN', FALSE);
        });

        Gate::define('VIEW_ARTICLES', function ($user) {
            return $user->canDo('VIEW_ARTICLES', FALSE);
        });

        Gate::define('VIEW_MENU', function ($user) {
            return $user->canDo('VIEW_MENU', FALSE);
        });

        /* Gate::define('VIEW_ADMIN_ARTICLES', function ($user) {
             return $user->canDo('VIEW_ADMIN_ARTICLES', FALSE);
         });*/



        Gate::define('VIEW_ADMIN_USERS', function ($user) {
            return $user->canDo('VIEW_ADMIN_USERS', FALSE);
        });

        Gate::define('EDIT_USERS', function ($user) {
            return $user->canDo('EDIT_USERS', FALSE);
        });
    }
}
