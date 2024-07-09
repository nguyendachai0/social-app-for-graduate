<?php 

namespace App\Repositories\ProfileUser;
use App\Models\ProfileUser;
interface ProfileUserRepositoryInterface
{
    public function all();
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function findWithRelationships($profileUserId);
    public function getFriends(ProfileUser $profileUser);
    public function getFriendsWithStories(ProfileUser $profileUser);
    public function getFriendsWithPost(ProfileUser $profileUser);
    public function getMessages(ProfileUser $profileUser);
}