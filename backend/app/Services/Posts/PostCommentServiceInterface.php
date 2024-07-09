<?php

namespace App\Services\Posts;

interface PostCommentServiceInterface 
{
    public function getAllPostComments();
    public function getPostCommentById($id);
    public function createPostComment(array $data);
    public function updatePostComment($id, array $data);
    public function deletePostComment($id);
}