<?php

namespace App\Http\Controllers;

use App\Models\Sunscreen; // Nuestros productos
use App\Models\Order;
use App\Payments\MercadoPagoPayment; // Clase que acabamos de crear
use Illuminate\Http\Request; // Para peticiones
use Illuminate\Support\Facades\Auth;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;


class MercadoPagoController extends Controller
{
    public function show()
    {
        // Buscamos un par de películas simulando un carrito de compras. Esto es lo que vamos a hacer para cobrar con Mercado Pago.
        // $sunscreens = Sunscreen::whereIn('sunscreen_id', [13,14])->get();
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('status', 0)->first();
        // dd($order);

        // if ($order->status == 1) {
        //     // La orden ya ha sido procesada
        //     return redirect()->route('cart.view')->with('feedback.message', 'Tu compra ya fue procesada.');
        // }

        // if (!$order || empty($order->products)) {
        //     return redirect()->route('cart.view')->with('feedback.message', 'El carrito está vacío.');
        // }

        $totalQuantity = 0;
        // Integración con MP
        // Preparamos el array con los datos en el formato que pide MercadoPago.
        if($order){
            $items = [];

            foreach ($order->products as $product) {
                $items[] = [
                    'id' => (int) $product['id'],
                    'title' => $product['title'],
                    'unit_price' => (int) $product['price'],
                    'quantity' => (int) $product['quantity'],
                ];
            }

            
            $totalQuantity = array_sum(array_column($order->products, 'quantity'));
    
            try {
                // Definimos el token de acceso de nuestra cuenta.
                MercadoPagoConfig::setAccessToken(config('mercadopago.access_token'));
    
                // Iniciamos nuestro "Factory" de preferencias (cobro)
                $preferenceFactory = new PreferenceClient();
                // Creamos la preferencia usando el método create() del factory.
                // Este método recibe un array de configuración.
                // Este array de configuración debe tener al menos una clave "items" que contenga un array con los datos de los items a facturar.
                // Cada item debe tener al menos 3 claves: 'title', 'unit_price', 'quantity'.
    
                $preference = $preferenceFactory->create([
                    'items' => $items,
                    // Configuramos las back_urls
                    'back_urls' => [
                        'success' => route('payment.success'),
                        'pending' => route('payment.pending'),
                        'failure' => route('payment.failure'),
                    ],
                    'auto_return' => 'approved',
                    'external_reference' => $order->id,
                ]);
            } catch (\Throwable $e) {
                dd($e); // el error
            }
    
            return view('cart.view', [
                'order' => $order, // Lo que se facturó
                'preference' => $preference,
                'totalQuantity' => $totalQuantity,
                // pasar la clave pública para poder agregarla en la conexión de JS
                'mpPublicKey' => config('mercadopago.public_key'),
            ]);
        } else{
            return view('cart.view', ['order' => $order, 'totalQuantity' => $totalQuantity]);
        }
        
    }
    
    public function successProcess(Request $request)
    {
        // En esta ruta podríamos mostrar un mensaje de éxito al usuario de que su compra
        // fue realizada con éxito.
        // Vamos a recibir en el query string varios datos sobre la operación en Mercado Pago,
        // como id de operación.
        $externalReference = $request->query('external_reference'); // Obtienes el ID de la orden
        // dd($request);

        // Busca la orden en la base de datos
        $order = Order::findOrFail((int) $externalReference);
    
        // Actualiza el estado de la orden
        $order->status = 1; // Orden finalizada
        $order->save();
        return redirect()->route('cart.view')->with('feedback.message', 'Pago exitoso. Tu orden ha sido procesada.');
    }

    public function pendingProcess(Request $request)
    {
        $externalReference = $request->query('external_reference'); // Obtienes el ID de la orden
        // dd($request);

        // Busca la orden en la base de datos
        $order = Order::findOrFail((int) $externalReference);
    
        // Actualiza el estado de la orden
        $order->status = 2; // Orden pendiente
        $order->save();

        return redirect()->route('cart.view')->with('feedback.message', 'Pago pendiente. Por favor, verifica más tarde.')->with('feedback.type', 'warning');;
    }

    public function failureProcess(Request $request)
    {
        $externalReference = $request->query('external_reference'); // Obtienes el ID de la orden
        // dd($request);

        // Busca la orden en la base de datos
        $order = Order::findOrFail((int) $externalReference);
    
        // Actualiza el estado de la orden
        $order->status = 3; // Orden fallida
        $order->save();

        return redirect()->route('cart.view')->with('feedback.message', 'Pago fallido. Inténtalo nuevamente.')->with('feedback.type', 'danger');;
    }
}