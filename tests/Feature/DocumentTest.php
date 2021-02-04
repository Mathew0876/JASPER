<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Documents;
use Tests\TestCase;

class DocumentTest extends TestCase
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

    public function test_Document_can_be_instantiated()
    {
        $doc = Documents::factory()->make();
        $this->assertNotEmpty($doc->title);

        // save 5 records to the database
        Documents::factory()->count(5)->create();
        $this->assertDatabaseCount('documents', 5);
    }

    public function test_Document_properites()
    {
        // create a custom requirement to test with
        $doc = Documents::factory()->create([
            'title' => 'The Document Title',
        ]);
    
        $docTest = Documents::find($doc->id);
        $this->assertEquals('The Document Title', $docTest->title);
    }

}
