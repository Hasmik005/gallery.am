<?php

class Router {
    private $routes = [];

    public function add($route, $callback) {
        $this->routes[$route] = $callback;
    }

    public function dispatch($uri) {
        foreach ($this->routes as $route => $callback) {
            if ($route === $uri) {
                return call_user_func($callback);
            }
        }

        echo '404 - Not Found';
    }
}
