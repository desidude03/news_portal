<?php

namespace App\Imports;

use App\Models\News;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class NewsImport implements ToModel
{
    use Importable;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new News([
            'title' => $row[0],
            'content' => $row[1],
            'date' => $row[2],
            'source' => $row[3],
        ]);
    }
}
