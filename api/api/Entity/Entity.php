<?php


namespace API\Entity;


use API\Core\DB;

abstract class Entity
{
    private int $id;
    private \DateTime $created_at;
    private \DateTime $updated_at;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     */
    public function setCreatedAt(\DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    /**
     * @param \DateTime $updated_at
     */
    public function setUpdatedAt(\DateTime $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    public static function getTable(): string
    {
        return strtolower(array_pop(explode('\\', static::class)));
    }

    public static function getById(int $id): ?Entity
    {
        $dbh = (new DB())->getHandler();
        $sql = 'select * from ' . self::getTable() . ' where `id` = ?';

        $statement = $dbh->prepare($sql);
        $statement->bindParam(1, $id);

        $statement->execute();
        $statement->fetchObject(static::class);

        $row = $statement->fetch();
        var_dump($row);
        return $row ? $row : null;
    }
}