<?php

namespace Tests\Unit\Models;

use App\Models\Emoji;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmojiTest extends TestCase
{
    use RefreshDatabase;

    private $emoji;

    protected function setUp(): void
    {
        parent::setUp();
        $this->emoji = Emoji::factory()->create();
    }

    public function testItCanCreateEmoji()
    {
        $this->assertDatabaseHas('emojis', ['id' => $this->emoji->id]);
    }

    public function testItCanUpdateEmoji()
    {
        $newType = 'heart';
        $this->emoji->update(['type_emoji' => $newType]);
        $this->assertEquals($newType, $this->emoji->fresh()->type_emoji);
    }

    public function testItCanDeleteEmoji()
    {
        $this->emoji->delete();
        $this->assertModelMissing($this->emoji);
    }
}
