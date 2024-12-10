<?php

// Como todo archivo de configuración, retornamos un array.
// Los adtos de un archivo de configuración como este se acceden desde el código con la función
// config().
// Como parámetro le pasamos un string con la "ruta" al valor que nos interesa usando notación de punto.
// Por ejemplo, para obtener el access token, escribríamos:
// config('mercadopago.access.token');
// Primero se escribe el nombre del archivo (sin extensión), y después la clave.

return [
    "access_token" => env('MERCADOPAGO_ACCESS_TOKEN'),
    "public_key" => env('MERCADOPAGO_PUBLIC_KEY'),
];