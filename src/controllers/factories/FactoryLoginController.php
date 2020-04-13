<?php

include 'FactoryInterface.php';
include 'src/repositories/UsersRepository.php';
include 'src/controllers/LoginController.php';
include 'src/validators/Validator.php';

class FactoryLoginController implements FactoryInterface
{
    public function createController(): Controller
    {
        $repository = new UsersRepository();
        $validator  = new Validator();
        return new LoginController($repository, $validator);
    }
}
