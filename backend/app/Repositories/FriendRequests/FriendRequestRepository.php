<?php

namespace App\Repositories\FriendRequests;
use App\Models\FriendRequest;

class FriendRequestRepository implements FriendRequestRepositoryInterface
{
    protected $friendRequest;

    public function __construct(FriendRequest $friendRequest)
    {
        $this->friendRequest = $friendRequest;
    }
    public function all()
    {
        return $this->friendRequest->all();
    }
    public function find($id)
    {
        return $this->friendRequest->find($id);
    }
    public function create(array $data)
    {
        return $this->friendRequest->create($data);
    }
    public function update($id, array $data)
    {
        return $this->friendRequest->find($id)->update($data);
    }
    public function delete($id)
    {
        return $this->friendRequest->find($id)->delete();
    }
}