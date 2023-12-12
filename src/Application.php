<?php

namespace J\PhpFramework;

class Application
{
    private static string $rootDir;
    public readonly Router $router;

    public readonly Request $request;
    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);

    }

    public function run(): void {
        echo $this->router->getResponse();
    }

    public static function rootDir(): string {
        if (!isset(self::$rootDir)) {
            self::$rootDir = dirname(__DIR__);
        }
        return self::$rootDir;
    }
}