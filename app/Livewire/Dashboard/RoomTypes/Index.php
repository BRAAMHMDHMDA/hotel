<?php

namespace App\Livewire\Dashboard\RoomTypes;

use App\Models\RoomType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Blade;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use function PHPUnit\Framework\isNull;

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
        return RoomType::with('roomTemplate:id,room_type_id');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('preview' , fn ($member) => '<div class="d-flex align-items-center"><img class="img-thumbnail me-2" style="height: 80px;" src="'.$member->image_url.'" alt="Image"><span>'.$member->name.'</span></div>')
            ->add('view_details' , fn ($row) => !$row->roomTemplateIsComplete() ? '<a class="btn btn-sm rounded-pill btn-warning" wire:navigate href=" '. route('dashboard.room-template', $row->roomTemplate->id) .'"><i class="bx bxs-edit"></i>Complete Details</a>' : '<a class="btn btn-sm rounded-pill btn-primary" wire:navigate href=" '. route('dashboard.room-template',  $row->roomTemplate->id) .'"><i class="bx bx-show"></i>View Details</a>')
            ->add('created_at')
            ->add('created_at_formatted', fn ($row) => \Carbon\Carbon::parse($row->created_at)->format('d/m/Y'));
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
            Column::make('View Details', 'view_details'),

            Column::action('Action')
        ];
    }


    public function actions(RoomType $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="bx bx-edit-alt"></i>Edit')
                ->id()
                ->class('btn btn-sm btn-info')
                ->tooltip('Edit')
                ->dispatch('editRoomType', ['id' => $row->id]),
//
//            Button::add('completeDetails')
//                ->id()
//                ->tooltip('Complete Details')
//                ->render(function ($row) {
//                    return Blade::render(<<<HTML
//                        <a class="btn btn-sm btn-warning" wire:navigate href="{{ route('dashboard.room-template', $row->id) }}"><i class="bx bx-edit-alt"></i>Complete Details</a>
//                        HTML);
//                }),

            Button::add('delete')
                ->slot('<i class="bx bx-trash"></i>Delete')
                ->id()
                ->tooltip('Delete')
                ->class('btn btn-sm btn-danger')
                ->dispatch('deleteRoomType', ['id' => $row->id])
        ];
    }

    public function actionRules($row): array
    {
//        $row->load('roomTemplate');
        return [
//            // Hide button edit when details not Complete
//            Rule::button('edit')
//                ->when(fn($row) => $row->roomTemplate?->size === null)
//                ->hide(),
//            // Hide button completeDetails when details Completed
//            Rule::button('completeDetails')
//                ->when(fn($row) => $row->roomTemplate?->size !== null)
//                ->hide(),
        ];
    }

}
