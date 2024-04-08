<?php


use App\Models\DataCategory;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DataCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function component_can_render()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('dashboard.password')) // Assurez-vous que la route mène à la page contenant le composant Livewire
            ->assertStatus(200)
            ->assertSeeLivewire('password.data-category-component');
    }

    /** @test */
    public function can_create_category()
    {
        $user = User::factory()->create();
        Livewire::actingAs($user)
            ->test('password.data-category-component')
            ->set('newName', 'New Category')
            ->set('newDescription', 'Description for new category')
            ->call('create');

        $this->assertTrue(DataCategory::where('name', 'New Category')->exists());
    }

    /** @test */
    public function can_search_for_categories()
    {
        $user = User::factory()->create();
        DataCategory::factory()->create(['name' => 'Searchable Category', 'user_id' => $user->id]);

        Livewire::actingAs($user)
            ->test('password.data-category-component')
            ->set('search', 'Searchable')
            ->assertSee('Searchable Category');
    }

}
