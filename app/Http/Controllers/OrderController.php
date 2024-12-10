<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Agregar un producto al carrito
    public function addToCart(Request $request)
    {
        $user = Auth::user();

        // Busca la orden abierta del usuario
        $order = Order::where('user_id', $user->id)->where('status', 0)->first();

        // Si no existe una orden abierta, crea una nueva
        if (!$order) {
            $order = Order::create([
                'user_id' => $user->id,
                'products' => [], // Inicializa como array vacío
                'status' => 0, // Estado abierto
                'date' => now(),
                'total' => 0,
            ]);
        }

        // Trabaja con el array de productos directamente
        $products = $order->products;

        // Verifica si el producto ya existe en el carrito
        $productId = $request->input('sunscreen_id');
        $existingProductKey = null;

        foreach ($products as $key => $product) {
            if ($product['id'] == $productId) {
                $existingProductKey = $key;
                break;
            }
        }

        if ($existingProductKey !== null) {
            // Si el producto ya existe, actualiza la cantidad
            $products[$existingProductKey]['quantity'] += $request->input('quantity');
        } else {
            // Si no existe, agrega el nuevo producto al array
            $products[] = [
                'id' => $productId,
                'title' => $request->input('title'),
                'price' => $request->input('price'),
                'quantity' => $request->input('quantity'),
            ];
        }

        // Actualiza los datos de la orden
        $order->products = $products; // Laravel se encarga del JSON automáticamente
        $order->total = array_sum(array_map(function ($product) {
            return $product['price'] * $product['quantity'];
        }, $products));
        $order->save();

        return redirect()->back()->with('feedback.message', 'El producto fue agregado al carrito.');
    }

    // Finaliza la orden
    public function checkout(Request $request)
    {
        $user = Auth::user();

        // Busca la orden abierta del usuario
        $order = Order::where('user_id', $user->id)->where('status', 0)->first();

        if ($order) {
            $order->status = 1; // Cambia el estado a "aceptado"
            $order->save();
        }

        return redirect()->back()->with('feedback.message', 'La orden ha sido finalizada con éxito.');
    }

    public function viewCart()
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('status', 0)->first();

        $totalQuantity = 0;
        if ($order) {
            $totalQuantity = array_sum(array_column($order->products, 'quantity'));
        }

        return view('cart.view', ['order' => $order, 'totalQuantity' => $totalQuantity]);
    }

    public function updateCart(Request $request)
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('status', 0)->first();

        if ($order) {
            $quantities = $request->input('quantities');
            $products = $order->products;

            foreach ($quantities as $key => $quantity) {
                if (isset($products[$key])) {
                    $products[$key]['quantity'] = max(1, (int) $quantity); // Evita cantidades menores a 1
                }
            }

            // Calcula el total actualizado
            $order->products = $products;
            $order->total = array_sum(array_map(function ($product) {
                return $product['price'] * $product['quantity'];
            }, $products));
            $order->save();
        }

        return redirect()->route('cart.view')->with('feedback.message', 'El carrito ha sido actualizado.');
    }

    public function removeItem($id)
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('status', 0)->first();

        if ($order) {
            $products = $order->products;

            // Si hay solo un producto en el carrito, llama a la funcion emptyCart()
            if (count($products) === 1) {
                return $this->emptyCart();
            }

            // Elimina el producto seleccionado
            unset($products[$id]);
            $products = array_values($products);

            // Actualiza el total
            $order->products = $products;
            $order->total = array_sum(array_map(function ($product) {
                return $product['price'] * $product['quantity'];
            }, $products));
            $order->save();
        }

        return redirect()->route('cart.view')->with('feedback.message', 'El producto ha sido eliminado del carrito.');
    }

    public function emptyCart()
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->id)->where('status', 0)->first();

        if ($order) {
            // Elimina la orden completamente
            $order->delete();
        }

        return redirect()->route('cart.view')->with('feedback.message', 'El carrito se vacio.');
    }

    public function listAllOrders()
    {
        $orders = Order::with('user')->simplePaginate(5);

        return view('orders.list', compact('orders'));
    }

    public function view(int $id)
    {
        $order = Order::with('user')->findOrFail($id);

        return view('orders.view', compact('order'));
    }

}
