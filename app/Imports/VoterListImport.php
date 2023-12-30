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
            'updated_at' = null,
            'created_at' = now(),
            'no' = $row['Voter No.'],
            'name' = $row['Name'],
            'upazilla' = $row['Upazilla'],
            'union' = $row['Union'],
            'father_name' = $row["Father's Name"],
            'mother_name' = $row["Mother's Name"],
            'date_of_birth' = $row["Date of Birth"],
            'profession' = $row["Profession"],
            'address' = $row["Address"],
        ]);
    }
}
