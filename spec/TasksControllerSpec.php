<?php

namespace spec\Acacha\Laracasts\TestingJargon;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

use Acacha\Laracasts\TestingJargon\Authorizer;
use Acacha\Laracasts\TestingJargon\TaskRepository;

class TasksControllerSpec extends ObjectBehavior
{

    function let(Authorizer $auth,TaskRepository $repository)
    {
        $this->beConstructedWith($auth,$repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Acacha\Laracasts\TestingJargon\TasksController');
    }

    function it_disallows_guests_from_creating_tasks(Authorizer $auth){
        $auth->guest()->willReturn(true);

        $this->store()->shouldReturn('redirect');
    }

    function it_creates_a_task(Authorizer $auth, TaskRepository $repository) {
        $auth->guest()->willReturn(false);

        $repository->create('...')->shouldBeCalled();

        $this->store();

    }
}
