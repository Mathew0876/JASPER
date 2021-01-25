<?php

namespace Tests\Feature;

use App\Models\RequirementModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RequirementModelTest extends TestCase
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

    public function test_RequirementModel_can_be_instantiated()
    {
        $requirement = RequirementModel::factory()->make();
        $this->assertNotEmpty($requirement->title);

        // save 5 records to the database
        RequirementModel::factory()->count(5)->create();
        $this->assertDatabaseCount('requirement_models', 5);
    }

    public function test_RequirementModel_properites()
    {
        // create a custom requirement to test with
        $requirement = RequirementModel::factory()->create([
            'CIAAA_category' => 'spoofing',
            'title' => 'The Title',
            'priority' => 2,
            'state' => false,    
        ]);
    
        $requirementTest = RequirementModel::find($requirement->id);
        $this->assertEquals('The Title', $requirementTest->title);
        $this->assertEquals('spoofing', $requirementTest->CIAAA_category);
        $this->assertEquals(2, $requirementTest->priority);
    }
}
