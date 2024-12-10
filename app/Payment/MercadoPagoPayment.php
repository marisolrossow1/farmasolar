<?php

namespace App\Payment;

use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Resources\Preference;
use Monolog\Processor\UidProcessor;

class MercadoPagoPayment
{
    private string $accessToken; // Guardar el Access Token
    private string $publicKey; // Guardar el public key
    private array $items = []; // Los items de compra
    private array $backUrls = []; // Decir a mp qué urls devuelven al usuario
    private bool $autoReturn = false; // Si la devolución automática de esa página para nosotros va a estar activa o no

    /**
     * Create a new class instance.
     * Revisa el archivo de configuración, busca el access token y lo guarda en la variable, lo mismo con public key.
     * Confirma si ambas están configuradas correctamente, que no estén vacías.
     */
    public function __construct()
    {
        $this->accessToken = config('mercadopago.access_token');
        $this->publicKey = config('mercadopago.public_key');

        if(strlen($this->accessToken) == 0) throw new \Exception('No está definido el token de acceso de Mercado Pago. Creá la clave MERCADOPAGO_ACCESS_TOKEN en el [.env].');
        if(strlen($this->publicKey) == 0) throw new \Exception('No está definida la clave pública de Mercado Pago. Creá la clave MERCADOPAGO_PUBLIC_KEY en el [.env].');

        MercadoPagoConfig::setAccessToken($this->accessToken);
    }

    /**
     * Retorna el valor de public key
     */
    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    /**
     * Guardar en nuestra variable los items que el usuario compró.
     */
    public function setItems(array $items)
    {
        $this->items = $items;
    }

    /**
     * Recibe el valor que va a tener o success, o pending, o failure, que pueden tener o no valor.
     */
    public function setBackUrls(?string $success = null, ?string $pending = null, ?string $failure = null)
    {
        if(is_string($success)) $this->backUrls['success'] = $success;
        if(is_string($pending)) $this->backUrls['pending'] = $pending;
        if(is_string($failure)) $this->backUrls['failure'] = $failure;
    }

    /**
     * Cambia la variable de auto retorno a true, para permitir que después de ciertos segundos el usuario sea devuelto a la página de la tienda.
     * Porque el proceso que usaremos con mp es que el usuario le dé al botón, se abre la página de mp y desde ahí el usuario puede pagar con su tarjeta de crédito, etc. Incluso loguearse.
     */
    public function withAutoReturn()
    {
        $this->autoReturn = true;
    }

    /**
     * Preferencia es la forma en que mp crea un cobro.
     * Lo primero revisa si hay items para procesar.
     * Va agregar en la variable config los items que se van a cobrar.
     * Revisa si existe algo en backUrls, si existe lo agrega en la variable config las que hay.
     * Y revisa también el autoReturn. Para devolver a la página.
     * Una vez todo configurado, crea la variable $preferenceFactory donde se inicia un nuevo objeto PreferenceClient.
     * MP trabaja de dos formas. Nosotros hacemos una petición del front, diciendo la cantidad en pesos que genera el pago, genera un token, lo pasamos al back, revisa los items, registra el pago con este token y lo envía a MP. MP verifica si lo que se está enviando del back coincide con el front, verifica con el token.
     */
    public function createPreference(): Preference
    {
        if(count($this->items) == 0) throw new \Exception('Hay que definir los items del cobro. Usá el método setItems() para asignarlos.');

        $config = [
            'items' => $this->items,
        ];
        if(count($this->backUrls)) $config['back_urls'] = $this->backUrls;
        if($this->autoReturn) $config['auto_return'] = 'approved';

        $preferenceFactory = new PreferenceClient();
        return $preferenceFactory->create($config);
    }

}
