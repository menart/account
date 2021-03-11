<?php


namespace API\Core;


class Config
{
    private array $configuration = [];

    /**
     * Config constructor.
     * @param array $configuration
     */
    public function __construct()
    {
        $this->configuration = parse_ini_file(__DIR__ . '/../../config/config.ini');
    }


    /**
     * @param string $name
     * @return array|string
     */
    public function getConfig(string $name = "")
    {
        if (!empty($name) && isset($this->configuration[$name]))
            return $this->configuration[$name];
        else if (empty($name))
            return $this->configuration;
        else
            return '';
    }
}