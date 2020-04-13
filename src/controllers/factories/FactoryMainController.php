<?php

include 'FactoryInterface.php';
include 'src/controllers/MainController.php';

class FactoryMainController implements FactoryInterface
{
    public function createController(): Controller
    {
        return new MainController();
    }
}
