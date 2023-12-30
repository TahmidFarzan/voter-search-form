<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Voter;

use Maatwebsite\Excel\Facades\Excel;

use App\Imports\VoterListImport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    public function import()
    {
        try {

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Voter::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $files = glob(public_path('upload/voter-list-*.csv'));

            foreach ($files as $file) {
                Excel::import(new VoterListImport, $file);
            }
            return redirect()->route('home')->with('status', 'Voter successfully save.');
        }
        catch ( Exception $ex) {
            return redirect()->route('home')->withErrors(['error' => 'Failed to save voter: ' . $ex->getMessage()]);
        }
    }
}
