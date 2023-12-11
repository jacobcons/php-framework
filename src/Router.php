<?php

namespace J\PhpFramework;

class Router
{
    private array $routes = [];

    public function __construct(private Request $request)
    {
    }

    public function get($path, $response): void {
        $this->routes['get'][$path] = $response;
    }

    public function getResponse(): string {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();
        $response = $this->routes[$method][$path] ?? fn() => "404";
        if (is_string($response)) {
            return $this->renderView($response);
        } else {
            return $response();
        }
    }

    private function renderView($viewName): string
    {
        $rootDir = Application::rootDir();
        $view = file_get_contents("{$rootDir}/views/{$viewName}.php");
        $layout = file_get_contents("{$rootDir}/views/layouts/main.php");
        return str_replace("{{ content }}", $view , $layout);
    }
}