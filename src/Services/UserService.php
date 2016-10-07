<?php
/**
 * Created by PhpStorm.
 * User: Glenn
 * Date: 2016-10-07
 * Time: 9:04 AM
 */

namespace Twitter\Services;


use Twitter\Model\UserModel;
use Twitter\Repository\FollowerRepository;
use Twitter\Repository\UserRepository;

class UserService
{
    /** @var UserRepository  */
    protected $userRepository;

    /** @var FollowerRepository  */
    protected $followerRepository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository
     * @param FollowerRepository $followerRepository
     */
    public function __construct(UserRepository $userRepository, FollowerRepository $followerRepository)
    {
        $this->userRepository = $userRepository;
        $this->followerRepository = $followerRepository;
    }

    /**
     * @param $person_id
     *
     * @return array
     */
    public function getFollowees($person_id) {
        return $this->followerRepository->getFollowees($person_id); //TODO Collectionize it
    }

    /**
     * @param array $user
     *
     * @return \Twitter\Model\Model
     */
    public function createUser(array $user) {
        $user = (new UserModel())
            ->setData($user);
        $user = $this->userRepository->save($user);

        return $user;
    }
}