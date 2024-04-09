<?php


use App\Models\DataClient;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DataClientTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_client()
    {
        $category = \App\Models\DataCategory::factory()->create();

        $client = \App\Models\DataClient::factory()->create(['data_category_id' => $category->id]);

        $this->assertDatabaseHas('data_clients', ['id' => $client->id]);
    }

    /** @test */
    public function can_update_client()
    {
        $user = User::factory()->create();
        $client = DataClient::factory()->create();

        Livewire::actingAs($user)
            ->test('password.category-clients-component', ['categoryId' => $client->data_category_id])
            ->call('editClient', $client->id)
            ->set('name', 'Updated Client')
            ->set('email', $client->email)
            ->set('address', '456 Main St')
            ->set('phone', '0987654321')
            ->call('updateClient');

        $updatedClient = DataClient::find($client->id);
        $this->assertEquals('Updated Client', $updatedClient->name);
        $this->assertEquals('456 Main St', $updatedClient->address);
    }

    /** @test */
    public function can_delete_client()
    {
        $user = User::factory()->create();
        $client = DataClient::factory()->create();

        Livewire::actingAs($user)
            ->test('password.category-clients-component', ['categoryId' => $client->data_category_id])
            ->call('deleteClient', $client->id);

        $this->assertFalse(DataClient::where('id', $client->id)->exists());
    }

    /** @test */
    public function can_render_component()
    {
        $user = User::factory()->create();
        $categoryId = 1;

        Livewire::actingAs($user)
            ->test('password.category-clients-component', ['categoryId' => $categoryId])
            ->assertStatus(200)
            ->assertViewHas('clients');
    }
}
