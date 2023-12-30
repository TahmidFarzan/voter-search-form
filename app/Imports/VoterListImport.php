<?php

namespace App\Imports;

use App\Models\Voter;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VoterListImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Voter([
            'updated_at' => null,
            'created_at' => now(),
            'no' => $row['voter_no'],
            'name' => $row['name'],
            'upazilla' => $row['upazilla'],
            'union' => $row['union'],
            'father_name' => $row["fathers_name"],
            'mother_name' => $row["mothers_name"],
            'date_of_birth' => $row["date_of_birth"],
            'profession' => $row["profession"],
            'address' => $row["address"],
        ]);
    }
}
