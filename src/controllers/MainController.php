<?php

class MainController extends Controller
{
    public function index()
    {
        $this->view->generate('main.php', 'layout.php');
    }
}
