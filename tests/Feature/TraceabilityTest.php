<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\RequirementModel;
Use App\Models\Documents;

class TraceabilityTest extends TestCase
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


    public function test_Document_Requirement_Model_Backwards(){
        $requirement = RequirementModel::factory()->create([
            'ciaaa_category' => 'Availability',
            'title' => 'The Title',
            'priority' => 2,
            'state' => false,    
        ]);

        $doc = Documents::factory()->create([
            'title' => 'The Document Title',
        ]);

        $requirement->documents()->attach($doc->id, array('backwards' => true));

        $reqTest = RequirementModel::find($requirement->id);
        $this->assertTrue($reqTest->documents()->get()->contains($doc->id));
        $this->assertEquals($reqTest->documents()->first()->pivot->backwards, 1);

    }

    public function test_Document_Requirement_Model_Forwards(){
        $requirement = RequirementModel::factory()->create([
            'ciaaa_category' => 'Availability',
            'title' => 'The Title',
            'priority' => 2,
            'state' => false,    
        ]);

        $docForward = Documents::factory()->create([
            'title' => 'The future doc',
        ]);

        $requirement->documents()->attach($docForward->id, array('backwards' => false));

        $reqTest2 = RequirementModel::find($requirement->id);
        $this->assertTrue($reqTest2->documents()->get()->contains($docForward->id));
        $this->assertEquals($reqTest2->documents()->first()->pivot->backwards, 0);


    }
}
