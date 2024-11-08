<?php

namespace App\Imports;

use App\Models\Vourchers;

use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VourchersImport implements OnEachRow, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     $check = Vourchers::where('vourcher', $row['voucher'])->first();
    //     if($check){
    //         return $check->update([
    //             'vourcher'     => $row['voucher'],
    //             'amount'    => $row['amount'],
    //             'status'    => 'UNUSED',
    //             'user_assigned'    => null,
    //         ]);
    //     }
    //     return new Vourchers([
    //         'vourcher'     => $row['voucher'],
    //         'amount'    => $row['amount'],
    //     ]);
    // }

    public function onRow($row)
    {
        $check = Vourchers::where('vourcher', $row['voucher'])
        ->where('status','USED')->first();
        if($check){
            return $check->update([
                'vourcher'     => $row['voucher'],
                'amount'    => $row['amount'],
                'status'    => 'UNUSED',
                'user_assigned'    => null,
            ]);
        }
        return Vourchers::create([
            'vourcher'     => $row['voucher'],
            'amount'    => $row['amount'],
        ]);
    }
}
