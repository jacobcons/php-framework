<?php

namespace J\PhpFramework;

class Request
{
    public function getPath(): string {
        $uri = $_SERVER['REQUEST_URI'];
        return explode("?", $uri)[0];
    }

    public function getMethod(): string {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}