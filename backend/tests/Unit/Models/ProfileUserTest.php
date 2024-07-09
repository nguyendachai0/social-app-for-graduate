<?php

namespace Tests\Unit\Models;

use App\Models\ProfileUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class ProfileUserTest extends TestCase
{
    use RefreshDatabase;
    private $user;
    /**
     * Test creating a profile user
     * 
     * @return void
     */

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = ProfileUser::factory()->create();
    }

   public function testItCanCreateProfileUser()
   {
    $this->assertDatabaseHas('profile_users',
    ['id' => $this->user->id]);
   }
   /**
     * Test update a profile's user's email
     * 
     * @return void
     */
   public function testItCanUpdateProfileUserEmail()
   {
    $newEmail = "newupdateemail@gmail.com";
    $this->user->update(['email' => $newEmail]);
    $this->assertEquals($newEmail, $this->user->fresh()->email);
   }
   /**
     * Test deleting a profile user
     * 
     * @return void
     */
   public function testItCanDeleteProfileUser()
   {
    $this->user->delete();
    $this->assertModelMissing($this->user);
   }
   /**
     * Test find a profile user by ID
     * 
     * @return void
     */
    public function testItCanFindProfileUserById()
    {
            $foundUser = ProfileUser::find($this->user->id);
        $this->assertInstanceOf(ProfileUser::class, $foundUser);
    }
   
    /**
     * Test the profile user has many sent friend request
     * 
     * @return void
     */
    public function testProfileUserHasManySentFriendRequest()
    {
        $friendRequest = $this->user->sentFriendRequests()->create([
            'receiver_id' => ProfileUser::factory()->create()->id,
        ]);
        $this->assertTrue($this->user->sentFriendRequests->contains($friendRequest));
    }
    /**
     * Test the profile user has many received friend request
     * 
     * @return void
     */
    public function testProfileUserHasManyReceivedFriendRequest()
    {
        $friendRequest = $this->user->receivedFriendRequests()->create([
            'sender_id' => ProfileUser::factory()->create()->id,
        ]);
        $this->assertTrue($this->user->receivedFriendRequests->contains($friendRequest));
    }
    
}
