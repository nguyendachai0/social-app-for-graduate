<?php

namespace App\Services\Posts;

interface UserPostServiceInterface
{
    public function getAllUserPosts();
    public function getUserPostById($id);
    public function createUserPost(array $data);
    public function updateUserPost($id, array $data);
    public function deleteUserPost($id, $userId);
}
