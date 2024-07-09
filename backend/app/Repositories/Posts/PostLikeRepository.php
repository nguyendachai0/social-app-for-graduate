<?php

namespace App\Repositories\Posts;
use App\Models\PostLike;

class PostLikeRepository implements PostLikeRepositoryInterface
{
    protected $postLike;

    public function __construct(PostLike $postLike)
    {
        $this->postLike = $postLike;
    }
    public function all()
    {
        return $this->postLike->all();
    }
    public function find($id)
    {
        return $this->postLike->find($id);
    }
    public function create(array $data)
    {
        return $this->postLike->create($data);
    }
    public function update($id, array $data)
    {
        return $this->postLike->find($id)->update($data);
    }
    public function delete($id)
    {
        return $this->postLike->find($id)->delete();
    }
}