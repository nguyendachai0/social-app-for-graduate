<?php
namespace App\Services\Posts;

use App\Repositories\Posts\PostCommentRepositoryInterface;

class PostCommentService implements PostCommentServiceInterface
{
    private $postCommentRepository;

    public function __construct(PostCommentRepositoryInterface $postCommentRepository)
    {
        $this->postCommentRepository = $postCommentRepository;
    }
    public function getAllPostComments()
    {
        return $this->postCommentRepository->all();
    }
    public function getPostCommentById($id)
    {
        return $this->postCommentRepository->find($id);
    }
    public function createPostComment(array $data)
    {
        return $this->postCommentRepository->create($data);
    }
    public function updatePostComment($id, array $data)
    {
        return $this->postCommentRepository->update($id,  $data);
    }
    public function deletePostComment($id)
    {
        return $this->postCommentRepository->delete($id);
    }

}