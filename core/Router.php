<?php

class Router
{
    private $routes = [];

    /**
     * Yeni router ekle.
     *
     * @param string $method HTTP metodu (GET, POST vb.)
     * @param string $route Rota dizgesi
     * @param callable $callback Çağrılacak fonksiyon veya metod
     */
    public function add(string $method, string $route,callable $callback) {
        // Dinamik parametreleri regex ile eşle
        $route = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([a-zA-Z0-9_]+)', $route);
        $route = '/^' . str_replace('/', '\/', $route) . '$/'; // Regex'e dönüştür

        // Rota dizisine ekle
        $this->routes[$method][] = [
            'route' => $route,
            'callback' => $callback
        ];
    }

    /**
     * URL'yi işleyip uygun rotayı çağır.
     *
     * @param string $requestUri
     * @param string $requestMethod Metodu (GET, POST vb.)
     * @return mixed|void
     */
    public function dispatch(string $requestUri, string $requestMethod)
    {
        $requestMethod = strtoupper($requestMethod);
        if (isset($this->routes[$requestMethod])) {
            foreach ($this->routes[$requestMethod] as $route) {
                if (preg_match($route['route'], $requestUri, $matches)) {
                    array_shift($matches); // İlk eleman tüm eşleşmeyi içerdiğinden kaldır
                    return call_user_func_array($route['callback'], $matches);
                }
            }
        }

        // Uygun rota bulunamazsa 404 hata sayfası göster
        http_response_code(404);
        echo "404 - Sayfa bulunamadı";
    }

    /**
     * Parametreleri yakalamak içinverilen routeryi regex'e dönüştür.
     *
     * @param string $route
     * @return string Regex
     */
    private function convertToRegex(string $route): string
    {
        $route = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<\1>[a-zA-Z0-9_-]+)', $route);
        return '#^' . $route . '$#';
    }
}