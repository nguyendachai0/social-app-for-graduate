<?php

namespace App\Services\Home;
use  App\Repositories\ProfileUser\ProfileUserRepositoryInterface;
class HomeService implements HomeServiceInterface
{
    /**
     * Create a new class instance.
     */
    private $profileUserRepository;
    public function __construct(ProfileUserRepositoryInterface $profileUserRepository)
    {
        $this->profileUserRepository = $profileUserRepository;
    }
    public function getDataForHomePage($profileUserId)
    {
        $profileUser = $this->profileUserRepository->find($profileUserId);
        $dataWithRelationship  = $this->profileUserRepository->findWithRelationships($profileUserId);
        $friendsStories = $this->profileUserRepository->getFriendsWithStories($profileUser);
        $friendsPosts = $this->profileUserRepository->getFriendsWithPost($profileUser);
        $messages = $this->profileUserRepository->getMessages($profileUserId);
        return [
            'profile' => $dataWithRelationship,
            'friendsStories' => $friendsStories,
            'feed' => $friendsPosts,
            'messages' => $messages
        ];
    }
}
