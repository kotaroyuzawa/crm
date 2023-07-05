<?php

namespace App\Inc;

class App {

    private array $routes = [];

    public function addRoute(string $url, string $method, $callback) : void
    {
        $method = strtoupper($method);
        $this->routes[$url][$method] = $callback;
    }

    public function run (): void
    {
        $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        if ($url != '/login' && $method != 'POST') {
            $authService = new AuthService(Database::getConnection());

            if (!$authService->isLoggedIn()) {
                $url = '/login';
                $method = 'GET';
            }
        }

        if (!empty($this->routes[$url][$method])){
            $callback = $this->routes[$url][$method];
            if (is_callable($callback)) {
                $callback();
            }
        } else {
            // error page
        }
    }
}

