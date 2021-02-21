<?php


namespace API\Core;


class Request
{

    private $controller;
    private $method;

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        var_dump($uri);
    }
}