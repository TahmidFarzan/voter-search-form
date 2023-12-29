<?php

namespace Database\Seeders;

use App\Models\Voter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VoterSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Voter::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $csvFilePath = asset('upload/voter-list.csv');
        $csvFile = fopen($csvFilePath, 'r');
        $header = fgetcsv($csvFile);

        while (($data = fgetcsv($csvFile)) !== false) {
            $rowData = array_combine($header, $data);

            Voter::factory()->create([
                'no' => $rowData['Voter No.'],
                'name' => $rowData['Name'],
                'upazilla' => $rowData['Upazilla'],
                'union' => $rowData['Union'],
                'father_name' => $rowData["Father's Name"],
                'mother_name' => $rowData["Mother's Name"],
                'date_of_birth' =>  $rowData["Date of Birth"],
                'profession' =>  $rowData["Profession"],
                'address' =>  $rowData["Address"],

                'created_at' => now(),
                'updated_at' => null,
            ]);
        }

        fclose($csvFile);
    }
}
