<?php

namespace App\Orchid\Screens;

use App\Helpers;
use App\Models\Vourchers;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use App\Exports\VourchersExport;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Maatwebsite\Excel\Facades\Excel;

class Vourcherpage extends Screen
{
    use Helpers;

    public $vourchers;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Vourchers $vourchers): iterable
    {
        return [
            'vourchers'=>$vourchers
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->vourchers->exists ? 'Edit Vourcher': 'Create New Vourcher';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Submit')
            ->icon('save')
            ->method('createOrUpdate')
            ->canSee(!$this->vourchers->exists),

            Button::make('Update')
                ->icon('note')
                //->method('')
                ->canSee($this->vourchers->exists),

        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('vourchers.vourcher')
                ->type('text')
                ->title('Voucher Code'),

                Input::make('vourchers.amount')
                ->type('number')
                ->title('Amount')
            ])
        ];
    }

    public function createOrUpdate(Request $request){

        $this->validateRequest($request);

        $fields = $this->convertEmptyStringToNullValues($request->get('vourchers'));
        $this->vourchers->fill($fields)->save();
        Alert::info('You have successfully created a post.');
        return redirect()->route('platform.vourcher.list');
    }
    public function validateRequest(Request $request){
        $request->validate([
            'vourchers.vourcher'=>'required|string',
            'vourchers.amount'=>'required|numeric'
        ],[
            'vourchers.vourcher.required'=>'Missing Vourcher Code',
            'vourchers.amount.required'=>'Missing Amount',
             'vourchers.amount.numeric'=>'Invalid Amount'
        ]);


    }


}
