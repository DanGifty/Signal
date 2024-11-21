<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Models\Vourchers;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

use function PHPSTORM_META\type;

class PlatformScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {

        return [
            'v_count' => count(Vourchers::all()),
            'v_sum' => Vourchers::sum('amount'),
            'v_used'=> Vourchers::where('status', 'USED')->sum('amount'),
            'v_unused'=> Vourchers::where('status', 'UNUSED')->sum('amount'),

            'v3u'=> Vourchers::where('status', 'USED')->where('amount', 3)->count(),
            'v3un'=> Vourchers::where('status', 'UNUSED')->where('amount', 3)->count(),

            'v5u'=> Vourchers::where('status', 'USED')->where('amount', 5)->count(),
            'v5un'=> Vourchers::where('status', 'UNUSED')->where('amount', 5)->count(),
            'v6u'=> Vourchers::where('status', 'USED')->where('amount', 6)->count(),
            'v6un'=> Vourchers::where('status', 'UNUSED')->where('amount', 6)->count(),

            'v10u'=> Vourchers::where('status', 'USED')->where('amount', 10)->count(),
            'v10un'=> Vourchers::where('status', 'UNUSED')->where('amount', 10)->count(),

            'v12u'=> Vourchers::where('status', 'USED')->where('amount', 12)->count(),
            'v12un'=> Vourchers::where('status', 'UNUSED')->where('amount', 12)->count(),

            'v65u'=> Vourchers::where('status', 'USED')->where('amount', 65)->count(),
            'v65un'=> Vourchers::where('status', 'UNUSED')->where('amount', 65)->count(),

            'v150u'=> Vourchers::where('status', 'USED')->where('amount', 150)->count(),
            'v150un'=> Vourchers::where('status', 'UNUSED')->where('amount', 150)->count(),
            'chartData'=>[
                'labels' => ['Used', 'Unused'],
                'datasets' => [
                    [
                        'label' => 'Vouchers',
                        'backgroundColor' => ['#007bff', '#dc3545'],
                        'data' => [Vourchers::where('status', 'USED')->count(), Vourchers::where('status', 'UNUSED')->count()],
                    ],
                ],
            ]
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Signal Ghana';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Welcome to your Signal application.';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }





    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
             Layout::view('dashboard.dashboard'),

            Layout::chart('chartData')
                ->title('Vourchers Status')
                ->type('bar')
                ->height(250)

        ];
    }
}
