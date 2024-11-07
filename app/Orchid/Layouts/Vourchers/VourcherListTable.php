<?php

namespace App\Orchid\Layouts\Vourchers;

use App\Models\Vourchers;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class VourcherListTable extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'vourchers';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {

        return [
            TD::make('id', 'SN')->render(function(){
                static $count = 0;
                return ++$count;
            }),
            TD::make('voucher', 'Vourcher Code')->render(fn (Vourchers $vourchers) => $vourchers->vourcher),
            TD::make('amount', 'Amount')->render(fn (Vourchers $vourchers) => $vourchers->amount),
            TD::make('user_assigned', 'User')->render(fn (Vourchers $vourchers) => $vourchers->user_assigned),
            TD::make('status', 'Status')->render(fn (Vourchers $vourchers) => $vourchers->status),
            TD::make('created_at', 'Created Date')->render(fn (Vourchers $vourchers) => $vourchers->created_at),
            TD::make('updated_at', 'Sales Date')->render(fn(Vourchers $vourchers) => $vourchers->updated_at),
        ];
    }
}
