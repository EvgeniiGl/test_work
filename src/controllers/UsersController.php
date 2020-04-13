<?php

include 'src/models/User.php';

class UsersController extends Controller
{
    protected $repository;

    public function __construct(UsersRepositoryInterface $repository)
    {
        $this->repository = $repository;
        parent::__construct();
    }

    public function emails()
    {
        $data['emails'] = $this->repository->getDoubleEmails();
        $this->view->generate('emails.php', 'layout.php', $data);
    }

    public function not_orders()
    {
        $data['users'] = $this->repository->getUsersWithoutOrders();
        $this->view->generate('users.php', 'layout.php', $data);
    }

    public function orders()
    {
        $data['users'] = $this->repository->usersWithOrders();
        $this->view->generate('users.php', 'layout.php', $data);
    }

}
