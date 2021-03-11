<?php


namespace API\Core;


class API
{
    public function run(){
        $request = new Request();

        $controllerName = $request->getController();
        $controller = new $controllerName();

        $method = $request->getMethod();
        $controller->$method();
    }
}