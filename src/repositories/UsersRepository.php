<?php

include 'DB.php';
include 'UsersRepositoryInterface.php';

class UsersRepository extends DB implements UsersRepositoryInterface
{
    function __construct()
    {
        $config = include 'src/config.php';
        parent::__construct($config);
    }

    function add(User $user)
    {
        $sql = "INSERT INTO users (login, email, password, name) VALUES (:login, :email, :password, :name)";
        $this->query($sql, array(
            'login'    => $user->getLogin(),
            'email'    => $user->getEmail(),
            'password' => $user->getPassword(),
            'name'     => $user->getName(),
        ));
    }

    function getUserByLogin(string $login)
    {
        $sql = "SELECT * FROM users WHERE login = '$login'";
        return $this->query($sql)[0];
    }

    function getDoubleEmails()
    {
        $sql = "SELECT email, COUNT(email) FROM users GROUP BY email HAVING COUNT(email) > 1";
        return $this->query($sql);
    }

    function getUsersWithoutOrders()
    {
        $sql = "SELECT users.id, login FROM users LEFT JOIN orders ON orders.user_id = users.id WHERE orders.id IS NULL";
        return $this->query($sql);
    }

    function usersWithOrders()
    {
        $sql = "SELECT users.id, login, COUNT(orders.user_id) FROM users LEFT JOIN orders ON orders.user_id = users.id GROUP BY users.id HAVING COUNT(orders.user_id) > 2";
        return $this->query($sql);
    }

}
