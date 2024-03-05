<?php


// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePostTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function user_can_create_post_with_valid_data()
    {
        $this->withoutExceptionHandling();
        // Add setup code here
        $response = $this->post(route('blog.store'), [
            // Add valid post data here
        ]);
        $response->assertRedirect(route('blog.index'));
        $response->assertSessionHas('success');
        $this->assertCount(1, Post::all());
    }

    public function post_creation_requires_name()
    {
        // Add setup code here
        $response = $this->post(route('blog.store'), [
            // Add post data without 'name'
        ]);
        $response->assertSessionHasErrors('name');
    }

    public function post_slug_must_be_unique()
    {
        // Setup: Create a post to have an existing slug
        $existingPost = Post::factory()->create();

        // Attempt to create a new post with the same slug
        $response = $this->post(route('blog.store'), [
            // Add post data with 'slug' same as $existingPost
        ]);
        $response->assertSessionHasErrors('slug');
    }

    public function user_can_update_post_with_valid_data()
    {
        // Setup: Create a post
        $post = Post::factory()->create();
        // Add update logic here
        $response = $this->put(route('blog.update', $post->id), [
            // Add valid updated post data here
        ]);
        $response->assertRedirect(route('blog.index'));
        $response->assertSessionHas('success');
        // Add assertions to verify data was updated
    }

    public function post_update_slug_must_be_unique_except_current_post()
    {
        // Setup: Create two posts
        $post1 = Post::factory()->create();
        $post2 = Post::factory()->create();

        // Attempt to update $post2 with the slug of $post1
        $response = $this->put(route('blog.update', $post2->id), [
            // Add data with 'slug' same as $post1
        ]);
        $response->assertSessionHasErrors('slug');
    }
}
