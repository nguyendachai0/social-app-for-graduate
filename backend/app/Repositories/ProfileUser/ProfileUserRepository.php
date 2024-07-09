<?php

namespace App\Repositories\ProfileUser;
use App\Models\ProfileUser;

class ProfileUserRepository implements ProfileUserRepositoryInterface
{
    protected $profileUser;

    public function __construct(ProfileUser $profileUser)
    {
        $this->profileUser = $profileUser;
    }
    public function all()
    {
        return $this->profileUser->all();
    }
    public function find($id)
    {
        return $this->profileUser->find($id);
    }
    public function create(array $data)
    {
        return $this->profileUser->create($data);
    }
    public function update($id, array $data)
    {
        return $this->profileUser->find($id)->update($data);
    }
    public function delete($id)
    {
        return $this->profileUser->find($id)->delete();
    }
    public function findWithRelationships($profileUserId)
    {
        return $this->profileUser::with([
            'notifications',
            // 'userPosts.postComments.profileUser',
            // 'userPosts.postLikes.profileUser',
            'stories'
        ])->find($profileUserId);
    }
    public function getFriends(ProfileUser $profileUser)
    {
        $sentFriendRequests = $profileUser->sentFriendRequests()
                                                ->where('status',  'accepted')
                                                ->pluck('receiver_id');

        $receivedFriendRequests = $profileUser->receivedFriendRequests()
                                                    ->where('status', 'accepted')
                                                    ->pluck('sender_id');
        
        $friendIds = $sentFriendRequests->merge($receivedFriendRequests);
            return  $this->profileUser->whereIn('id', $friendIds)->get();                                            
    }
    public function getFriendsWithStories(ProfileUser $profileUser)
    {
        $friends = $this->getFriends($profileUser);
        return $friends->load('stories');
    }
    public function getFriendsWithPost(ProfileUser $profileUser)
    {
        $friends = $this->getFriends($profileUser);
        return $friends->load('userPosts');
    }
    public function getMessages($profileUserId)
    {
        return $this->profileUser->with([
            // 'messages',
        // 'participants.conversation.messages'
        'participants.conversation.messages.sender'
        ])->find($profileUserId);
    }
}