<?php

namespace App\Imports;

use App\Models\Score;
use Maatwebsite\Excel\Concerns\ToModel;


class DataImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Score([
            'NIM' => $row[0],    //dimulai dari row 1 karena row 0 ada data id ->controller getClientOriginalName()
            'Name' => $row[1],
            'Score' => $row[2],
        ]);

        // return new Score([
        //     'NIM' => $row[0],   //controller store('files')
        //     'Name' => $row[1],
        //     'Score' => $row[2],
        // ]);
    }
}
