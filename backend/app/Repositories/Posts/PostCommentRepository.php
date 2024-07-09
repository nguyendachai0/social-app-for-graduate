<?php

namespace App\Repositories\Posts;
use App\Models\PostComment;

class PostCommentRepository implements PostCommentRepositoryInterface
{
    protected $postComment;

    public function __construct(PostComment $postComment)
    {
        $this->postComment = $postComment;
    }
    public function all()
    {
        return $this->postComment->all();
    }
    public function find($id)
    {
        return $this->postComment->find($id);
    }
    public function create(array $data)
    {
        return $this->postComment->create($data);
    }
    public function update($id, array $data)
    {
        return $this->postComment->find($id)->update($data);
    }
    public function delete($id)
    {
        return $this->postComment->find($id)->delete();
    }
}