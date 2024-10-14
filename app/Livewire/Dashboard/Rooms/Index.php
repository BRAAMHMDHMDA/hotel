<?php

namespace App\Livewire\Dashboard\Rooms;

use App\Models\Room;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Blade;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class Index extends PowerGridComponent
{
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';
    protected $listeners = ['refreshData'];
    public function refreshData(){$this->fillData();}
    public function setUp(): array
    {
        $this->showCheckBox();
        return [
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Room::with('roomType:id,name');
    }

    public function relationSearch(): array
    {
        return [
            'roomType' => [
                'name'
            ],
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('number')
            ->add('number', fn($row) => '<div class="badge bg-light text-black fw-normal fs-6">#'.$row->number.'</div>')
            ->add('room_type', fn($row) => $row->roomType->name)
            ->add('status', fn($row) => $row->status==='active'? '<div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>'.$row->status.'</div>': '<div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>'.$row->status.'</div>')
            ->add('created_at')
            ->add('created_at_formatted', fn ($row) => \Carbon\Carbon::parse($row->created_at)->format('d/m/Y'));
    }

    public function columns(): array
    {
        return [
//            Column::make('Id', 'id'),
            Column::make('Room Number', 'number')
                ->sortable()
                ->searchable(),

            Column::make('Room Type', 'room_type')
//                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),


            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }


    public function actions(Room $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="bx bx-edit-alt"></i>Edit')
                ->id()
                ->class('btn btn-sm btn-warning')
                ->tooltip('Edit This Room')
                ->dispatch('editRoom', ['id' => $row->id]),

            Button::add('delete')
                ->slot('<i class="bx bx-trash"></i>Delete')
                ->id()
                ->tooltip('Delete This Room')
                ->class('btn btn-sm btn-danger')
                ->dispatch('deleteRoom', ['id' => $row->id]),


        ];
    }

}
