<?php


namespace API\Entity;


class User extends Entity
{
    private string $login;
    private ?string $password;
    private ?string $name;
    private ?string $second_name;
    private ?string $surname;
    private ?string $email;
    private ?string $phone;
}