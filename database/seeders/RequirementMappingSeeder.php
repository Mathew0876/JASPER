<?php

namespace Database\Seeders;

use JeroenZwart\CsvSeeder\CsvSeeder;
use Illuminate\Database\Seeder;

class RequirementMappingSeeder extends CsvSeeder
{
    public function __construct()
    {
      $this->file = '/database/data/RequirementsMap.csv';
      $this->tablename = 'requirement_mapping';
      $this->delimiter = ',';
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        parent::run();
    }
}
