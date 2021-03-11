<?php


namespace API\Core;


use API\Controller\AbstractController;

class Request
{

    /**
     * @var string|mixed
     */
    private string $controller = "Default";
    private string $method = "index";

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $uri = array_diff($uri, ['']);
        if (isset($uri[1]))
            $this->controller = $uri[1];
        if (isset($uri[2]))
            $this->method = $uri[2];

        $this->validateCommand();
    }

    private function validateCommand(): bool
    {
        if (!class_exists($this->getController())) {
            //TODO переделать на исключения
            echo $this->getController() . ' Контроллер не найден<br>';
            return false;
        }
        if (!method_exists($this->getController(), $this->getMethod())) {
            //TODO переделать на исключения
            echo $this->getMethod() . ' метод не найден<br>';
            return false;
        }

        return true;
    }

    /**
     * @return mixed|string
     */
    public function getController(): string
    {
        return 'API\\Controller\\' . ucfirst($this->controller) . 'Controller';
    }

    /**
     * @return mixed|string
     */
    public function getMethod(): string
    {
        return strtolower($this->method);
    }
}