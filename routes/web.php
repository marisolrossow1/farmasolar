<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');

Route::get('/acerca-de', [App\Http\Controllers\HomeController::class, 'about'])
    ->name('about');

Route::get('/contacto', [App\Http\Controllers\HomeController::class, 'contact'])
    ->name('contact');

Route::get('protectores', [App\Http\Controllers\SunscreenController::class, 'index'])
    ->name('sunscreens.index');

Route::get('protectores/{id}', [App\Http\Controllers\SunscreenController::class, 'view'])
    ->name('sunscreens.view')
    ->whereNumber('id');

Route::get('blog', [App\Http\Controllers\BlogController::class, 'index'])
    ->name('blogs.index');

Route::get('blog/{id}', [App\Http\Controllers\BlogController::class, 'view'])
    ->name('blogs.view')
    ->whereNumber('id');

Route::get('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginForm'])
    ->name('auth.login.form');

Route::post('/iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'loginProcess'])
    ->name('auth.login.process');

Route::get('/registro', [\App\Http\Controllers\AuthController::class, 'registerForm'])
    ->name('auth.register.form');

Route::post('/registro', [\App\Http\Controllers\AuthController::class, 'registerProcess'])
    ->name('auth.register.process');

Route::post('/cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logoutProcess'])
    ->name('auth.logout.process');
    
// CARRITO (solo logueado)
Route::post('/carrito/agregar', [App\Http\Controllers\OrderController::class, "addToCart"])
    ->name('cart.add')
    ->middleware('auth');

Route::post('/carrito/checkout', [App\Http\Controllers\OrderController::class, "checkout"])
    ->name('cart.checkout')
    ->middleware('auth');

Route::get('/carrito', [App\Http\Controllers\MercadoPagoController::class, "show"])
    ->name('cart.view')
    ->middleware('auth');

Route::post('/carrito/editar', [App\Http\Controllers\OrderController::class, "updateCart"])
    ->name('cart.update')
    ->middleware('auth');

Route::get('/carrito/eliminar-producto/{id}', [App\Http\Controllers\OrderController::class, "removeItem"])
    ->name('cart.remove')
    ->middleware('auth')
    ->whereNumber('id');

Route::get('/carrito/vaciar', [App\Http\Controllers\OrderController::class, "emptyCart"])
    ->name('cart.empty')
    ->middleware('auth');

// PERFIL
Route::get('/perfil', [App\Http\Controllers\AuthController::class, "showProfile"])
    ->name('profile')
    ->middleware('auth');

Route::get('/perfil/compras', [App\Http\Controllers\AuthController::class, "showOrders"])
    ->name('profile.orders')
    ->middleware('auth');

Route::get('/perfil/compras/{id}', [App\Http\Controllers\AuthController::class, "showOrder"])
    ->name('profile.order')
    ->middleware('auth');

Route::get('/perfil/editar', [App\Http\Controllers\AuthController::class, "editForm"])
    ->name('profile.edit.form')
    ->middleware('auth');

Route::put('/perfil/editar', [App\Http\Controllers\AuthController::class, "editProcess"])
    ->name('profile.edit.process')
    ->middleware('auth');

// SOLO ADMIN
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])
    ->name('admin.dashboard')
    ->middleware(['auth', 'checkRole:admin']);

Route::get('blog/publicar', [App\Http\Controllers\BlogController::class, "createForm"])
    ->name('blogs.create.form')
    ->middleware(['auth', 'checkRole:admin']); //agregar luego el middleware

Route::post('blog/publicar', [App\Http\Controllers\BlogController::class, "createProcess"])
    ->name('blogs.create.process')
    ->middleware(['auth', 'checkRole:admin']);

Route::get('blog/{id}/editar', [App\Http\Controllers\BlogController::class, "editForm"])
    ->name('blogs.edit.form')
    ->whereNumber('id')
    ->middleware(['auth', 'checkRole:admin']);

Route::put('blog/{id}/editar', [App\Http\Controllers\BlogController::class, "editProcess"])
    ->name('blogs.edit.process')
    ->whereNumber('id')
    ->middleware(['auth', 'checkRole:admin']);

Route::delete('blog/{id}/eliminar', [App\Http\Controllers\BlogController::class, "deleteProcess"])
    ->name('blogs.delete.process')
    ->whereNumber('id')
    ->middleware(['auth', 'checkRole:admin']);

Route::get('usuarios/listado', [App\Http\Controllers\UserController::class, 'list'])
    ->name('users.list')
    ->middleware(['auth', 'checkRole:admin']);

Route::put('usuario/{id}', [App\Http\Controllers\UserController::class, 'updateRole'])
    ->name('users.update.role')
    ->whereNumber('id')
    ->middleware(['auth', 'checkRole:admin']);

Route::get('usuario/{id}', [App\Http\Controllers\UserController::class, 'view'])
    ->name('users.view')
    ->whereNumber('id')
    ->middleware(['auth', 'checkRole:admin']);

Route::get('blog/listado', [App\Http\Controllers\BlogController::class, 'list'])
    ->name('blogs.list')
    ->middleware(['auth', 'checkRole:admin']);

Route::get('compras/listado', [App\Http\Controllers\OrderController::class, 'listAllOrders'])
    ->name('orders.list')
    ->middleware(['auth', 'checkRole:admin']);

Route::get('compras/{id}', [App\Http\Controllers\OrderController::class, 'view'])
    ->name('orders.view')
    ->middleware(['auth', 'checkRole:admin']);

// Rutas de PAGO
// Para hacer el cobro
// Route::get('test/mercadopago', [\App\Http\Controllers\MercadoPagoController::class, 'show'])
//     ->name('test.mercadopago.show');
// Segunda versión
// Route::get('test/mercadopago/v2', [\App\Http\Controllers\MercadoPagoController::class, 'showV2'])
//     ->name('test.mercadopago.show.v2');
// Route::get('test/mercadopago/success', [\App\Http\Controllers\MercadoPagoController::class, 'successProcess'])
//     ->name('test.mercadopago.successProcess');
// Route::get('test/mercadopago/pending', [\App\Http\Controllers\MercadoPagoController::class, 'pendingProcess'])
//     ->name('test.mercadopago.pendingProcess');
// Route::get('test/mercadopago/failure', [\App\Http\Controllers\MercadoPagoController::class, 'failureProcess'])
//     ->name('test.mercadopago.failureProcess');

Route::get('/payment/success', [\App\Http\Controllers\MercadoPagoController::class, 'successProcess'])
    ->name('payment.success');
Route::get('/payment/pending', [\App\Http\Controllers\MercadoPagoController::class, 'pendingProcess'])
    ->name('payment.pending');
Route::get('/payment/failure', [\App\Http\Controllers\MercadoPagoController::class, 'failureProcess'])
    ->name('payment.failure');
// Route::post('/cart/pay', [\App\Http\Controllers\OrderController::class, 
// 'initiatePayment'])->name('cart.pay');
    