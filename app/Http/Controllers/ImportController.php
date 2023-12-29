<?php

namespace App\Http\Controllers;

use Exception;

use App\Models\Voter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    public function import()
    {
        DB::beginTransaction();
        try {

            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            Voter::truncate();
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            $csvFilePath = asset('upload/voter-list.csv');
            $csvFile = fopen($csvFilePath, 'r');
            $header = fgetcsv($csvFile);

            while (($data = fgetcsv($csvFile)) !== false) {
                $rowData = array_combine($header, $data);

                $voter = new Voter();
                $voter->updated_at = null;
                $voter->created_at = now();

                $voter->no = $rowData['Voter No.'];
                $voter->name = $rowData['Name'];
                $voter->upazilla = $rowData['Upazilla'];
                $voter->union = $rowData['Union'];
                $voter->father_name = $rowData["Father's Name"];
                $voter->mother_name = $rowData["Mother's Name"];
                $voter->date_of_birth = $rowData["Date of Birth"];
                $voter->profession = $rowData["Profession"];
                $voter->address = $rowData["Address"];
                $voter->save();
            }

            fclose($csvFile);

            DB::commit();
            return redirect()->route('home')->with('status', 'Voter successfully save.');
        }
        catch ( Exception $ex) {
            DB::rollback();
            return redirect()->route('home')->withErrors(['error' => 'Failed to save voter: ' . $ex->getMessage()]);
        }
    }
}
