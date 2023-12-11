<?php

namespace J\PhpFramework;

class Application
{
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
        return dirname(__DIR__);
    }
}