<?php
namespace App\Services\FriendRequests;

use App\Repositories\FriendRequests\FriendRequestRepositoryInterface;

class FriendRequestService implements FriendRequestServiceInterface
{
    private $friendRequestRepository;

    public function __construct(FriendRequestRepositoryInterface $friendRequestRepository)
    {
        $this->friendRequestRepository = $friendRequestRepository;
    }
    public function getAllFriendRequests()
    {
        return $this->friendRequestRepository->all();
    }
    public function getFriendRequestById($id)
    {
        return $this->friendRequestRepository->find($id);
    }
    public function createFriendRequest(array $data)
    {
        return $this->friendRequestRepository->create($data);
    }
    public function updateFriendRequest($id, array $data)
    {
        return $this->friendRequestRepository->update($id,  $data);
    }
    public function deleteFriendRequest($id)
    {
        return $this->friendRequestRepository->delete($id);
    }

}