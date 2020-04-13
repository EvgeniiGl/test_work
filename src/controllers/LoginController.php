<?php

include 'src/models/User.php';

class LoginController extends Controller
{
    protected $repository;
    protected $validator;

    public function __construct(UsersRepositoryInterface $repository, ValidatorInterface $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        parent::__construct();
    }

    public function index()
    {
        $this->view->generate('login.php', 'layout.php');
    }

    public function enter()
    {
        //TODO validate data
        $request = $this->validator->validate($_POST);
        $user    = $this->repository->getUserByLogin($request['login']);
        if (password_verify($request['password'], $user['password'])) {
            $this->view->generate('main.php', 'layout.php');
        } else {
            $this->view->generate('error.php', 'layout.php');
        }
    }

    public function register()
    {
        $this->view->generate('register.php', 'layout.php');
    }

    public function create()
    {
        //TODO validate data
        $request = $this->validator->validate($_POST);
        $user    = new User($request['login'], $request['password'], $request['email'], $request['name']);
        $this->repository->add($user);
        $this->view->generate('main.php', 'layout.php');
    }
}
