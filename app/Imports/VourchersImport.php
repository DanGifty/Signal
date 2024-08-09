<?php

namespace App\Imports;

use App\Models\Vourchers;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VourchersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Vourchers([
            'vourcher'     => $row['voucher'],
            'amount'    => $row['amount'],
            'status'    => $row['status'],
            'user_assigned'    => $row['user'],
        ]);
    }
}
