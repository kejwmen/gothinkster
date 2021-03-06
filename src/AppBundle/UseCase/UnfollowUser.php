<?php

namespace AppBundle\UseCase;

use Core\Repository\UserRepositoryInterface;

final class UnfollowUser
{
    private $users;

    public function __construct(UserRepositoryInterface $users)
    {
        $this->users = $users;
    }

    public function execute(UnfollowUserCommand $command): void
    {
        $follower = $command->getFollower();
        $follower->unfollow($command->getFollowed());

        $this->users->save();
    }
}
