<?php

namespace App\Livewire\Dashboard\Admins;

use App\Models\Admin;
use App\Models\Team;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
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
    use WithExport;
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';

    protected function queryString(): array
    {
        return [
            'search' => ['except' => ''],
        ];
    }

    #[On('refreshData')]
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
    public function header(): array
    {
        return [
            Button::add('bulk-delete')
                ->slot('Bulk Delete')
                ->class('btn btn-danger')
//                ->confirm('Are You Sure you want to Delete this Members ?                           Count Selected Members: '. count($this->checkboxValues))
                ->can((bool)$this->checkboxValues)
                ->dispatch('show-delete-confirmation', []),
//                ->dispatch('submitBulkDelete', []),
        ];
    }

    #[On('bulkDelete.{tableName}')]
    public function bulkDelete(): void
    {
        $this->dispatch('');

//        $this->js("bulkDelete()");
        if($this->checkboxValues) {
            $this->dispatch('show-delete-confirmation');
        }
    }

    #[On('submitBulkDelete')]
    public function submitBulkDelete(): void
    {
        if($this->checkboxValues){
            Admin::destroy($this->checkboxValues);
            $this->js('window.pgBulkActions.clearAll()'); // clear the count on the interface.
        }
    }

    public function datasource(): Builder
    {
        return Admin::with('roles');
    }

    public function relationSearch(): array
    {
        return [
            'roles' => [
                'name' // Allows searching within the roles' `name` field
            ]
        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('preview' , fn ($member) => '<img class="img-thumbnail me-2" style="height: 50px;" src="'.$member->image_url.'" alt="Image">'.$member->name)
            ->add('email')
            ->add('roles')
            ->add('roles_list', fn ($member) =>
                '<ul style="padding-top:10px">' . $member->roles->map(fn ($role) => '<li>' . e($role->name) . '</li>')->join('') . '</ul>'
            )
            ->add('created_at')
            ->add('created_at_formatted', fn ($member) => \Carbon\Carbon::parse($member->created_at)->format('d/m/Y'));

    }

    public function columns(): array
    {
        return [
//            Column::make('Id', 'id'),
            Column::make('Name', 'preview', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Roles', 'roles_list', 'roles')
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


    public function actions(Admin $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="bx bx-edit-alt"></i>Edit')
                ->id()
                ->class('btn btn-sm btn-warning')
                ->tooltip('Edit')
                ->dispatch('editAdmin', ['id' => $row->id]),

            Button::add('delete')
                ->slot('<i class="bx bx-trash"></i>Delete')
                ->id()
                ->tooltip('Delete')
                ->class('btn btn-sm btn-danger')
                ->dispatch('deleteAdmin', ['id' => $row->id])
        ];
    }

}
