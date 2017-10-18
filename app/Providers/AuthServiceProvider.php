<?php

namespace Corp\Providers;
use Corp\Article;
use Corp\Menu;
use Corp\Permission;
use Corp\Policies\ArticlePolicy;
use Corp\Policies\MenusPolicy;
use Corp\Policies\PermissionPolicy;
use Corp\Policies\PortfoliosPolicy;
use Corp\Policies\UserPolicy;
use Corp\Portfolio;
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
        Portfolio::class => PortfoliosPolicy::class,
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

         Gate::define('VIEW_PORTFOLIO', function ($user) {
             return $user->canDo('VIEW_PORTFOLIO', FALSE);
         });

        Gate::define('VIEW_MENU_PAGE', function ($user) {
            return $user->canDo('VIEW_MENU_PAGE', FALSE);
        });

        Gate::define('VIEW_USERS', function ($user) {
            return $user->canDo('VIEW_USERS', FALSE);
        });

        Gate::define('VIEW_ACCESS', function ($user) {
            return $user->canDo('VIEW_ACCESS', FALSE);
        });
    }
}
