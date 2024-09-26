<?php

namespace App\Livewire\Dashboard\RoomTypes;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class Index extends PowerGridComponent
{
    use WithExport;
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';

    protected $listeners = ['refreshData','submitBulkDelete'];
    public function refreshData(){$this->fillData();}

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return RoomType::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('preview' , fn ($member) => '<img class="img-thumbnail me-2" style="height: 80px;" src="'.$member->image_url.'" alt="Image">'.$member->name)
            ->add('created_at')
            ->add('created_at_formatted', fn ($row) => \Carbon\Carbon::parse($row->created_at)->format('d/m/Y'));;
    }

    public function columns(): array
    {
        return [
//            Column::make('Id', 'id'),
            Column::make('Name', 'preview' ,'name')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }


    public function actions(RoomType $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="bx bx-edit-alt"></i>')
                ->id()
                ->class('btn btn-sm p-0')
                ->tooltip('Edit')
                ->dispatch('editRoomType', ['id' => $row->id]),

            Button::add('delete')
                ->slot('<i class="bx bx-trash"></i>')
                ->id()
                ->tooltip('Delete')
                ->class('btn btn-sm text-danger p-0')
                ->dispatch('deleteRoomType', ['id' => $row->id])
        ];
    }

}
