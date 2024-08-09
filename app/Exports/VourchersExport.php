<?php

namespace App\Exports;

use App\Models\Vourchers;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VourchersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return Vourchers::query()->select('id', 'vourcher', 'amount','status', 'user_assigned')->get();
    }
    public function headings(): array
    {
        return ["SN", "Voucher", "Amount", "Status", "User"];

    }
}
