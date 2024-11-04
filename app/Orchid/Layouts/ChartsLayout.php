<?php

namespace App\Orchid\Layouts;

use App\Models\Vourchers;
use Orchid\Screen\Layouts\Chart;

class ChartsLayout extends Chart
{
    /**
     * Available options:
     * 'bar', 'line',
     * 'pie', 'percentage'.
     *
     * @var string
     */
    protected $type = 'bar';

    /**
     * Determines whether to display the export button.
     *
     * @var bool
     */
    //protected $export = true;

    public function query()
    {
       $datasets = [
            [
                'labels' => ['Used', 'Unused'],
                'name' => 'Vouchers',
                'backgroundColor' => ['#007bff', '#dc3545'],
                'values' => [Vourchers::where('status', 'USED')->count(), Vourchers::where('status', 'UNUSED')->count()],
            ],
        ];

        return [
            'datasets' => $datasets,
        ];
    }


}
