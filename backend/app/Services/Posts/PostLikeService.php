<?php
namespace App\Services\Posts;

use App\Repositories\Posts\PostLikeRepositoryInterface;

class PostLikeService implements PostLikeServiceInterface
{
    private $postLikeRepository;

    public function __construct(PostLikeRepositoryInterface $postLikeRepository)
    {
        $this->postLikeRepository = $postLikeRepository;
    }
    public function getAllPostLikes()
    {
        return $this->postLikeRepository->all();
    }
    public function getPostLikeById($id)
    {
        return $this->postLikeRepository->find($id);
    }
    public function createPostLike(array $data)
    {
        return $this->postLikeRepository->create($data);
    }
    public function updatePostLike($id, array $data)
    {
        return $this->postLikeRepository->update($id,  $data);
    }
    public function deletePostLike($id)
    {
        return $this->postLikeRepository->delete($id);
    }

}