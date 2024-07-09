<?php

namespace Tests\Unit\Models;

use App\Models\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    use RefreshDatabase;

    private $notification;

    protected function setUp(): void
    {
        parent::setUp();
        $this->notification = Notification::factory()->create();
    }

    public function testItCanCreateNotification()
    {
        $this->assertDatabaseHas('notifications', ['id' => $this->notification->id]);
    }

    public function testItCanUpdateNotificationStatus()
    {
        $newStatus = 'read';
        $this->notification->update(['status' => $newStatus]);
        $this->assertEquals($newStatus, $this->notification->fresh()->status);
    }

    public function testItCanDeleteNotification()
    {
        $this->notification->delete();
        $this->assertModelMissing($this->notification);
    }
}
