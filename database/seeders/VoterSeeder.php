<?php

namespace Database\Seeders;

use App\Models\Voter;

use Maatwebsite\Excel\Facades\Excel;

use App\Imports\VoterListImport;

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

        $files = glob(public_path('upload/voter-list-*.csv'));

        foreach ($files as $file) {
            Excel::import(new VoterListImport, $file);
        }
    }
}
