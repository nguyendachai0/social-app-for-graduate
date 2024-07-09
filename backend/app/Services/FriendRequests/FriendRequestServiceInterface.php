<?php

namespace App\Services\FriendRequests;

interface FriendRequestServiceInterface 
{
    public function getAllFriendRequests();
    public function getFriendRequestById($id);
    public function createFriendRequest(array $data);
    public function updateFriendRequest($id, array $data);
    public function deleteFriendRequest($id);
}