<?php

namespace Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\FriendRequest;
use App\Models\ProfileUser;
use Tests\TestCase;

class FriendRequestTest extends TestCase
{
    use RefreshDatabase;

    private $friendRequest;

    protected function setUp(): void
    {
        parent::setUp();
        $receiver  = ProfileUser::factory()->create();
        $sender = ProfileUser::factory()->create();
        $this->friendRequest = FriendRequest::factory()->create([
            'sender_id' => $sender->id,
            'receiver_id' => $receiver->id
        ]);
    }

    public function testItCanCreateFriendRequest()
    {
        $this->assertDatabaseHas('friend_requests', ['id' => $this->friendRequest->id]);
    }

    public function testItCanUpdateFriendRequestStatus()
    {
        $newStatus = 'accepted';
        $this->friendRequest->update(['status' => $newStatus]);
        $this->assertEquals($newStatus, $this->friendRequest->fresh()->status);
    }

    public function testItCanDeleteFriendRequest()
    {
        $this->friendRequest->delete();
        $this->assertModelMissing($this->friendRequest);
    }
}
