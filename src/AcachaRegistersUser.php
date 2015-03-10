<?php

namespace Acacha\Laracasts\TestingJargon;

class AcachaRegistersUser
{

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var Mailer
     */
    private $mailer;

    function __construct(UserRepository $repository,Mailer $mailer)
    {
        $this->repository = $repository;
        $this->mailer = $mailer;
    }

    public function register(array $user)
    {
        $this->repository->create($user);
        $this->mailer->sendWelcome($user["email"]);
    }
}
