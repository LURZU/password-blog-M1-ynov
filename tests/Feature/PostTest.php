<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_user_can_create_post_with_valid_data()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $tags = Tag::factory()->count(3)->create();

        $postData = [
            'name' => 'A Valid Post Title',
            'content' => 'Some valid content',
            'slug' => 'a-valid-post-title',
            'category_id' => $category->id,
            'tags' => $tags->pluck('id')->toArray(),
        ];

        $response = $this->actingAs($user)->post(route('blog.store'), $postData);

        $post = Post::where('name', 'A Valid Post Title')->firstOrFail();

        $expectedRedirectUrl = route('blog.show', ['slug' => $post->slug, 'post' => $post->id]);
        $response->assertRedirect($expectedRedirectUrl);
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('posts', ['name' => 'A Valid Post Title']);
    }


    /** @test */
    public function post_creation_requires_name()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();
        $tags = Tag::factory()->count(2)->create();

        $postData = [
            'slug' => 'post-without-name',
            'content' => 'Content for the post without a name.',
            'category_id' => $category->id,
            'tags' => $tags->pluck('id')->toArray()
        ];

        $response = $this->actingAs($user)->post(route('blog.store'), $postData);

        $response->assertSessionHasErrors('name');
    }

    /** @test */
    public function post_slug_must_be_unique()
    {
        $user = User::factory()->create();
        $existingPost = Post::factory()->create(['slug' => 'unique-slug']);

        $category = Category::factory()->create();
        $tags = Tag::factory()->count(2)->create();

        $postData = [
            'name' => 'New Post with Existing Slug',
            'slug' => 'unique-slug', // existing slug
            'content' => 'This content should trigger a slug uniqueness error.',
            'category_id' => $category->id,
            'tags' => $tags->pluck('id')->toArray()
        ];

        $response = $this->actingAs($user)->post(route('blog.store'), $postData);

        $response->assertSessionHasErrors('slug');
    }

    /** @test */
    public function user_can_update_post_with_valid_data()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create();
        $category = Category::factory()->create();
        $tags = Tag::factory()->count(2)->create();

        $postData = [
            'name' => 'Updated Post Title',
            'slug' => 'updated-post-title',
            'content' => 'Updated content for the post.',
            'category_id' => $category->id,
            'tags' => $tags->pluck('id')->toArray()
        ];

        $response = $this->actingAs($user)->put(route('blog.update', $post->id), $postData);

        // Mise à jour pour correspondre à la redirection vers la page du post
        $response->assertRedirect(route('blog.show', ['slug' => $post->fresh()->slug, 'post' => $post->id]));
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('posts', ['name' => 'Updated Post Title']);
    }


    /** @test */
    public function test_post_update_slug_must_be_unique_except_current_post()
    {
        $user = User::factory()->create();
        $post1 = Post::factory()->create(['slug' => 'unique-slug']);
        $post2 = Post::factory()->create(['slug' => 'another-unique-slug']);

        $postData = [
            'name' => $post2->name,
            'content' => $post2->content,
            'slug' => $post1->slug,
            'category_id' => $post2->category_id,
            'tags' => $post2->tags->pluck('id')->toArray()
        ];

        $response = $this->actingAs($user)->put(route('blog.update', ['post' => $post2->id]), $postData);

        $response->assertSessionHasErrors('slug');
    }

}
