<?php

namespace Tests\Feature;

use App\Models\Tenant\Post;
use Tests\TenantTestCase;

class PostsTest extends TenantTestCase
{
    /**
     * @test
     * @group f
     */
    public function a_user_can_see_posts_of_his_company()
    {
        $post = create(Post::class);

        $this->json('GET', '/posts')
            ->assertSuccessful()
            ->assertJsonFragment(['title' => $post->title, 'body' => $post->body]);
    }
}
