<?php
    namespace app\core;

    class Router {
        private static $routes = [];

        public static function get($path, $callback) {
            self::$routes['GET'][$path] = $callback;
        }
        public static function post($path, $callback) {
            self::$routes['POST'][$path] = $callback;
        }
        public static function put($path, $callback) {
            self::$routes['POST'][$path] = $callback;
        }
        public static function delete($path, $callback) {
            self::$routes['GET'][$path] = $callback;
        }

        public function run() {
            $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $method = $_SERVER['REQUEST_METHOD'];

            foreach (self::$routes[$method] as $route => $callback) {
                $routePattern = $this->createPattern($route);
                if (preg_match($routePattern, $path, $matches)) {
                    array_shift($matches); // Remove o primeiro elemento que é o padrão da rota
                    call_user_func_array($callback, $matches);
                    return;
                }
            }

            http_response_code(404);
            include "app/Views/Error/404.php";
        }

        private function createPattern($route) {
            // Substitui os parâmetros na rota por uma expressão regular
            $pattern = preg_replace('/{[^}]+}/', '([^/]+)', $route);
            return "#^$pattern$#";
        }
    }
?>