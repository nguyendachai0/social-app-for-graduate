<?php

namespace App\Repositories\Posts;
use App\Models\UserPost;

class UserPostRepository implements UserPostRepositoryInterface
{
    protected $userPost;

    public function __construct(UserPost $userPost)
    {
        $this->userPost = $userPost;
    }
    public function all()
    {
        return $this->userPost->all();
    }
    public function find($id)
    {
        return $this->userPost->find($id);
    }
    public function create(array $data)
    {
        return $this->userPost->create($data);
    }
    public function update($id, array $data)
    {
        return $this->userPost->find($id)->update($data);
    }
    public function delete($id)
    {
        return $this->userPost->find($id)->delete();
    }
}