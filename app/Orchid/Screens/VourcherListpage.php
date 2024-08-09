<?php

namespace App\Orchid\Screens;

use App\Models\Vourchers;

use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use App\Exports\VourchersExport;
use App\Imports\VourchersImport;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Maatwebsite\Excel\Facades\Excel;
use App\Orchid\Layouts\Vourchers\VourcherListTable;
use Orchid\Screen\Actions\ModalToggle;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class VourcherListpage extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'vourchers'=> Vourchers::query()->paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Vourcher List';
    }

    public function description(): ?string
    {
        return "Showing both Used and Unused Vourcher Codes.";
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Create new Voucher')
                ->icon('plus')
                ->route('playform.vourcher.create'),

            Button::make('Export')
                ->icon('cloud-download')
                ->method('exportToExcel')
                ->download(),

            ModalToggle::make('Import')
                ->modal('openImportModal')
                ->icon('cloud-upload')
                ->method('importToDatabase'),
        ];
    }

    public function openImportModal(){
        return $this->async('importAsync');
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::modal('openImportModal', [
                Layout::rows([
                    Input::make('excel_file')
                        ->type('file')
                        ->title('Select Excel File')
                        ->required(),
                ]),
            ])
            ->title('Import Voucher')
            ->applyButton('Import')
            ->closeButton('Cancel'),

            VourcherListTable::class
        ];
    }

    public function importAsync()
    {
        // You can pass data here if necessary
        return [];
    }

    public function exportToExcel()
    {
        return Excel::download(new VourchersExport(), 'vourchers.xlsx');
    }

    public function importToDatabase(Request $request){
        Excel::import(new VourchersImport, $request->file('excel_file'));
        Alert::info('You have successfully Import Data.');
        return redirect()->route('platform.vourcher.list');

    }
}
