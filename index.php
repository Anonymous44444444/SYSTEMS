<?php
// remove query string (?utm=... etc.)
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// normalize
$request = rtrim($request, '/');

if ($request === '' || $request === '/index.php') {
    include 'Login.php';
} else {
    $file = ltrim($request, '/');

    if (file_exists($file)) {
        include $file;
    } else {
        http_response_code(404);
        echo "404 Not Found";
    }
}
