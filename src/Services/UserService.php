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

    /** @var SessionService */
    protected $sessionService;

    /**
     * UserService constructor.
     *
     * @param UserRepository $userRepository
     * @param FollowerRepository $followerRepository
     */
    public function __construct(UserRepository $userRepository, FollowerRepository $followerRepository, SessionService $sessionService)
    {
        $this->userRepository = $userRepository;
        $this->followerRepository = $followerRepository;
        $this->sessionService = $sessionService;
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
        $user->setCreated(date(MYSQL_DATETIME_FORMAT));
        $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));
        $user = $this->userRepository->save($user);

        return $user;
    }

    /**
     * @param $username
     * @param $password
     * @return UserModel|bool
     */
    public function checkUserAuth($username, $password) {
        $user = $this->userRepository->getUser($username);
        if ($user) {
            if ($user->checkPassword($password)) {
                $this->sessionService->put('user', $user);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}