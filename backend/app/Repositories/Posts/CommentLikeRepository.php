<?php

namespace App\Repositories\Posts;
use App\Models\CommentLike;

class CommentLikeRepository implements CommentLikeRepositoryInterface
{
    protected $commentLike;

    public function __construct(CommentLike $commentLike)
    {
        $this->commentLike = $commentLike;
    }
    public function all()
    {
        return $this->commentLike->all();
    }
    public function find($id)
    {
        return $this->commentLike->find($id);
    }
    public function create(array $data)
    {
        return $this->commentLike->create($data);
    }
    public function update($id, array $data)
    {
        return $this->commentLike->find($id)->update($data);
    }
    public function delete($id)
    {
        return $this->commentLike->find($id)->delete();
    }
}