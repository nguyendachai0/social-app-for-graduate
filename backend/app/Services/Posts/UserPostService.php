<?php

namespace App\Services\Posts;

use App\Repositories\Posts\UserPostRepositoryInterface;

class UserPostService implements UserPostServiceInterface
{
    private $userPostRepository;

    public function __construct(UserPostRepositoryInterface $userPostRepository)
    {
        $this->userPostRepository = $userPostRepository;
    }
    public function getAllUserPosts()
    {
        return $this->userPostRepository->all();
    }
    public function getUserPostById($id)
    {
        return $this->userPostRepository->find($id);
    }
    public function createUserPost(array $data)
    {
        return $this->userPostRepository->create($data);
    }
    public function updateUserPost($id, array $data)
    {
        return $this->userPostRepository->update($id,  $data);
    }
    public function deleteUserPost($id, $userId)
    {
        return $this->userPostRepository->delete($id, $userId);
    }
    public function getMyPosts($userId)
    {
        return $this->userPostRepository->myPosts($userId);
    }
    public function isUserPostExist($postId)
    {
        $post = $this->getUserPostById($postId);
        if ($post) {
            return true;
        }
        return false;
    }
}
