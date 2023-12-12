<?php

namespace J\PhpFramework;

use SplFileObject;

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
        $viewPath = "{$rootDir}/views/{$viewName}.php";
        $lines = file($viewPath, FILE_IGNORE_NEW_LINES);
        $firstLine = str_replace(' ', '', $lines[0]);
        preg_match('/layout:(\w+)/', $firstLine, $matches);
        if (count($matches) === 0) {
            return file_get_contents($viewPath);
        } else {
            $layoutName = $matches[1];
            $viewFileRest = implode("\n", array_slice($lines, 1));
            $layout = file_get_contents("{$rootDir}/views/layouts/{$layoutName}.php");
            $injectedViewInLayout = str_replace("{{ content }}", $viewFileRest , $layout);
            return $injectedViewInLayout;
        }
    }
}