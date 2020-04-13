<?php

include 'FactoryInterface.php';
include 'src/controllers/UsersController.php';
include 'src/repositories/UsersRepository.php';

class FactoryUsersController implements FactoryInterface
{
    public function createController(): Controller
    {
        $repository = new UsersRepository();
        return new UsersController($repository);
    }
}
