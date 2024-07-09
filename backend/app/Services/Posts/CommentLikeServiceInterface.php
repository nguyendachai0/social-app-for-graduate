<?php

namespace App\Services\Posts;

interface CommentLikeServiceInterface 
{
    public function getAllCommentLikes();
    public function getCommentLikeById($id);
    public function createCommentLike(array $data);
    public function updateCommentLike($id, array $data);
    public function deleteCommentLike($id);
}