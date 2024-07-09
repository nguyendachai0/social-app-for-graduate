<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Conversation;
use App\Models\Participant;
use App\Models\ProfileUser;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConversationTest extends TestCase
{
    use RefreshDatabase;

    public function testItHasManyParticipants()
    {
        $users = ProfileUser::factory()->count(3)->create();
        $conversation = Conversation::factory()->create();
        foreach($users as $user)
        {
            Participant::factory()->create([
                'profile_user_id' => $user->id,
                'conversation_id' => $conversation->id
            ]);
        }
        $conversation = Conversation::factory()->create();
        Participant::factory()->count(3)->create([
            'conversation_id' => $conversation->id,
        ]);

        $participants = $conversation->participants;

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $participants);
        $this->assertCount(3, $participants);
        $this->assertInstanceOf(Participant::class, $participants->random());
    }
}
