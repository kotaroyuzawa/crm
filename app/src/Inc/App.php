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
        $url = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
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

