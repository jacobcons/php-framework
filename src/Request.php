<?php

namespace J\PhpFramework;

class Request
{
    public function getPath() {
        $uri = $_SERVER['REQUEST_URI'];
        return explode("?", $uri)[0];
    }

    public function getMethod() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}