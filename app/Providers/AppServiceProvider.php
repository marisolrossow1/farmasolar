<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class AppServiceProvider extends ServiceProvider
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
        // Mostrar la cantidad total de productos en el carrito
        // de forma global.
        View::composer('*', function ($view) {
            $cartCount = 0;
            // Si hay un usuario autenticado:
            if (Auth::check()) {
                $order = Order::where('user_id', Auth::id())->where('status', 0)->first();
                // Calcula la cantidad total de productos si hay una orden abierta
                if ($order) {
                    $cartCount = array_sum(array_column($order->products, 'quantity'));
                }
            }
            // Comparte la variable $cartCount con todas las vistas
            $view->with('cartCount', $cartCount);
        });
    }
}
