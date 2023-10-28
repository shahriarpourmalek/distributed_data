<?php

namespace Tests\Unit;

use App\Events\PostUpdated;
use Illuminate\Support\Facades\Event;
use PHPUnit\Framework\TestCase;

class AdminPostControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_store_method_creates_post_and_fires_event()
    {
        $postData = [
            'title' => 'New Post',
            'content' => 'This is the content of the new post.',
        ];

        Event::fake([PostUpdated::class]);

        $response = $this->post(route('admin.posts.store'), $postData);

        $response->assertRedirect(route('admin.posts.index'));

        $this->assertDatabaseHas('posts', $postData);

        Event::assertDispatched(PostUpdated::class, function ($event) use ($postData) {
            return $event->post->title === $postData['title']
                && $event->post->content === $postData['content'];
        });
    }
    public function test_example(): void
    {
        $this->assertTrue(true);
    }
}
