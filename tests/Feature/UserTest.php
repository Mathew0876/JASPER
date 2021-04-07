<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_usermodels_can_be_instantiated()
    {
        $user = User::factory()->make();
        $this->assertNotEmpty($user->name);

        // save 5 records to the database
        User::factory()->count(5)->create();
        $this->assertDatabaseCount('users', 5);
    }

    public function test_usermodels_properites()
    {
        // create a custom record to test with
        $user = User::factory()->create([
            'id' => 1,
            'name' => 'Abigail Otwell',
        ]);
    
        $this->assertEquals('Abigail Otwell', $user->name);

        $userTest = User::find(1);
        $this->assertEquals('Abigail Otwell', $userTest->name);
        
    }
 
}
