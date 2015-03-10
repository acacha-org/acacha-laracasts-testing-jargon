<?php

namespace spec\Acacha\Laracasts\TestingJargon;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Acacha\Laracasts\TestingJargon\UserRepository;
use Acacha\Laracasts\TestingJargon\Mailer;

class AcachaRegistersUserSpec extends ObjectBehavior
{
    function let(UserRepository $repository, Mailer $mailer)
    {
        $this->beConstructedWith($repository,$mailer);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('Acacha\Laracasts\TestingJargon\AcachaRegistersUser');
    }

    function it_creates_a_new_user(UserRepository $repository){

        $user = ['username' => 'John','email' => 'john@example.com'];

        $repository->create($user)->shouldBeCalled();

        $this->register($user);
    }

    function it_sends_a_welcome_email(Mailer $mailer) {
        $user = ['username' => 'John','email' => 'john@example.com'];

        $mailer->sendWelcome('john@example.com')->shouldBeCalled();

        $this->register($user);
    }
}
