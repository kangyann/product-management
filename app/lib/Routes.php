<?php

class Routes
{
    private $routes = [];
    /** Classify is a function to register routes for url configuration.
     * @param string $path is used for matching between route handler and original url.
     * @param array $handler is a class and method that connects the route with the controller.
     */
    public function classify(string $path, array $handler): void
    {
        $this->routes[$path] = $handler;
    }

    /**
     * Running the router and configuration
     */
    public function run(): void
    {
        // Get a real uri from browser
        $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        // Validation if $uri same as $routes
        if (!isset($this->routes[$uri])) {
            http_response_code(404);
            require "views/404.php";
            return;
        }

        // Configuration Controller Class 
        [$c, $m] = $this->routes[$uri];

        /** Throwing Error */
        if (!class_exists($c)) {
            throw new Exception("Exception for Class : " . $c, 404);
        }
        if (!method_exists($c, $m)) {
            throw new Exception("Exception for Method : " . $m . "on Class : " . $c, 404);
        }

        // Run Method Class
        (new $c())->$m();
    }
}
