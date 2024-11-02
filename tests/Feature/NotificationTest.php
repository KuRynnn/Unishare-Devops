<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotificationTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();

        // Create regular user
        $this->user = User::factory()->create();

        // Create admin user (assuming you have admin flag)
        $this->admin = User::factory()->create([
            'username' => 'admin'
        ]);
    }

    /** @test */
    public function admin_can_create_global_notification()
    {
        $this->actingAs($this->admin);

        $response = $this->post(route('admin.notifications.store'), [
            'title' => 'Test Notification',
            'message' => 'This is a test notification',
            'type' => 'info',
            'target_user' => 'all'
        ]);

        $response->assertRedirect(route('admin.notifications'));
        $this->assertDatabaseHas('notifications', [
            'title' => 'Test Notification',
            'is_global' => true
        ]);
    }

    /** @test */
    public function admin_can_create_specific_user_notification()
    {
        $this->actingAs($this->admin);

        $response = $this->post(route('admin.notifications.store'), [
            'title' => 'Test User Notification',
            'message' => 'This is a test user notification',
            'type' => 'info',
            'target_user' => 'specific',
            'user_id' => $this->user->id
        ]);

        $response->assertRedirect(route('admin.notifications'));
        $this->assertDatabaseHas('notifications', [
            'title' => 'Test User Notification',
            'is_global' => false
        ]);
        $this->assertDatabaseHas('user_notifications', [
            'user_id' => $this->user->id
        ]);
    }

    /** @test */
    public function user_can_view_their_notifications()
    {
        $this->actingAs($this->user);

        // Create global notification
        Notification::factory()->create([
            'is_global' => true
        ]);

        // Create user-specific notification
        $notification = Notification::factory()->create([
            'is_global' => false
        ]);
        $notification->users()->attach($this->user->id);

        $response = $this->get(route('notifications.index'));

        $response->assertStatus(200);
        $response->assertViewHas('notifications');
    }

    /** @test */
    public function user_can_mark_notification_as_read()
    {
        $this->actingAs($this->user);

        $notification = Notification::factory()->create();
        $notification->users()->attach($this->user->id);

        $response = $this->post(route('notifications.markRead', $notification->id));

        $response->assertRedirect(route('notifications.index'));
        $this->assertDatabaseHas('user_notifications', [
            'user_id' => $this->user->id,
            'notification_id' => $notification->id,
            'read_at' => now()
        ]);
    }

    /** @test */
    public function user_can_mark_all_notifications_as_read()
    {
        $this->actingAs($this->user);

        $notification1 = Notification::factory()->create();
        $notification2 = Notification::factory()->create();

        $notification1->users()->attach($this->user->id);
        $notification2->users()->attach($this->user->id);

        $response = $this->post(route('notifications.markAllRead'));

        $response->assertRedirect(route('notifications.index'));
        $this->assertDatabaseMissing('user_notifications', [
            'user_id' => $this->user->id,
            'read_at' => null
        ]);
    }
}