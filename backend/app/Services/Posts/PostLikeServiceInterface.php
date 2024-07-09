<?php

namespace App\Services\Posts;

interface PostLikeServiceInterface 
{
    public function getAllPostLikes();
    public function getPostLikeById($id);
    public function createPostLike(array $data);
    public function updatePostLike($id, array $data);
    public function deletePostLike($id);
}