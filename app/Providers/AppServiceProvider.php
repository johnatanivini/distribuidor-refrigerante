<?php

namespace App\Providers;

use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Repositories\ProdutoRepository;
use App\Services\Contracts\CreateProdutoServiceInterface;
use App\Services\Contracts\CreateServiceInterface;
use App\Services\Contracts\EditarServiceInterface;
use App\Services\Contracts\ExcluirServiceInterface;
use App\Services\Contracts\ListarServiceInterface;
use App\Services\CreateProdutoService;
use App\Services\EditarProdutoService;
use App\Services\ExcluirProdutoService;
use App\Services\ListarProdutoService;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
        }

        $this->app->bind(
            ProdutoRepositoryInterface::class,
            ProdutoRepository::class
        );

        $this->app->bind(
                CreateServiceInterface::class,
            CreateProdutoService::class
        );

        $this->app->bind(
            ExcluirServiceInterface::class,
            ExcluirProdutoService::class
        );

        $this->app->bind(
            ListarServiceInterface::class,
            ListarProdutoService::class
        );

        $this->app->bind(
            EditarServiceInterface::class,
            EditarProdutoService::class
        );

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
