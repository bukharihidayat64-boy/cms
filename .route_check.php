<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$paths = [
    '/',
    '/routes',
    '/local-services',
    '/articles',
    '/trip-gallery',
    '/faq',
    '/about',
    '/detail-rute-sembalun',
    '/detail-rute-senaru',
    '/login',
    '/register',
    '/admin/login',
];

foreach ($paths as $path) {
    try {
        $request = Illuminate\Http\Request::create($path, 'GET');
        $response = $kernel->handle($request);
        echo $path . ' => ' . $response->getStatusCode() . PHP_EOL;

        if (property_exists($response, 'exception') && $response->exception) {
            echo '  EXCEPTION: ' . get_class($response->exception) . ' - ' . $response->exception->getMessage() . PHP_EOL;
        }

        $kernel->terminate($request, $response);
    } catch (Throwable $e) {
        echo $path . ' => ERROR ' . get_class($e) . ' - ' . $e->getMessage() . PHP_EOL;
    }
}