<?php
namespace App\Services\Posts;

use App\Repositories\Posts\CommentLikeRepositoryInterface;

class CommentLikeService implements CommentLikeServiceInterface
{
    private $commentLikeRepository;

    public function __construct(CommentLikeRepositoryInterface $commentLikeRepository)
    {
        $this->commentLikeRepository = $commentLikeRepository;
    }
    public function getAllCommentLikes()
    {
        return $this->commentLikeRepository->all();
    }
    public function getCommentLikeById($id)
    {
        return $this->commentLikeRepository->find($id);
    }
    public function createCommentLike(array $data)
    {
        return $this->commentLikeRepository->create($data);
    }
    public function updateCommentLike($id, array $data)
    {
        return $this->commentLikeRepository->update($id,  $data);
    }
    public function deleteCommentLike($id)
    {
        return $this->commentLikeRepository->delete($id);
    }

}