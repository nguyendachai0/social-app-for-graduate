<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Participant;
use App\Models\Conversation;
use App\Models\ProfileUser;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipantTest extends TestCase
{
    use RefreshDatabase;
    private $participant;
    protected function setUp(): void
    {
        parent::setUp();
        $profileUser = ProfileUser::factory()->create();
        $conversation = Conversation::factory()->create();
        $this->participant = Participant::factory()->create([
            'profile_user_id' => $profileUser->id,
            'conversation_id' => $conversation->id,
        ]);
    }

    public function testItBelongToAConversation()
    {
        $this->assertInstanceOf(Conversation::class, $this->participant->conversation);
    }

    public function testItBelongToSomeOne()
    {
        $this->assertInstanceOf(ProfileUser::class, $this->participant->profileUsers);
    }
}
