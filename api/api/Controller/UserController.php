<?php


namespace API\Controller;


use API\Entity\User;

class UserController
{
    public function index()
    {
        var_dump(User::getById(1));
    }
}