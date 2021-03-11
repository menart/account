<?php


namespace API\Core;


class DB
{

    private \PDO $handler;

    private string $dbType = 'mysql';
    private string $host = 'mysql';
    private string $dbname = 'account';
    private string $user = 'root';
    private string $pwd = 'example';

    /**
     * DB constructor.
     */
    public function __construct()
    {
        $config = new Config();

        $this->dbType = $config->getConfig('pdo.dbType');
        $this->host = $config->getConfig('pdo.host');
        $this->dbname = $config->getConfig('pdo.dbname');
        $this->user = $config->getConfig('pdo.user');
        $this->pwd = $config->getConfig('pdo.pwd');

        $this->handler = new \PDO($this->dbType . ':host=' . $this->host . ';dbname=' . $this->dbname,
            $this->user, $this->pwd);
    }

    /**
     * @return \PDO
     */
    public function getHandler(): \PDO
    {
        return $this->handler;
    }
}