<?php
namespace Tests\Unit\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Message;
use App\Models\ProfileUser;
use App\Models\Participant;
use App\Models\Conversation;
class MeessageTest extends TestCase
{
    use RefreshDatabase;
    
    private $message;
    
    protected function setUp(): void
    {
        parent::setUp();

        $sender  = ProfileUser::factory()->create();
        $receiver = ProfileUser::factory()->create();
        $conversation = Conversation::factory()->create();
        Participant::factory()->create([
            'profile_user_id'  => $sender->id,
            'conversation_id' =>  $conversation->id
        ]);
        Participant::factory()->create([
            'profile_user_id' => $receiver->id,
            'conversation_id' =>  $conversation->id
        ]);
        $this->message = Message::factory()->create([
            'conversation_id' => $conversation->id,
            'sender_id' => $sender->id
        ]);
    }
    
    public function testItCanCreateMessage()
    {
        $this->assertDatabaseHas('messages', ['id' => $this->message->id]);
    }
    public function testItCanUpdateMessage()
    {
        $newContent =  "New Content";
        $this->message->update(['message_content' => $newContent]);
        $this->assertEquals($newContent, $this->message->fresh()->message_content);
    }
    public function testItCanDelete()
    {
        $this->message->delete();
        $this->assertModelMissing($this->message);
    }
}

