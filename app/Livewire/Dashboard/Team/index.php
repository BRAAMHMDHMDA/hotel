<?php

namespace App\Livewire\Dashboard\Team;

use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class index extends PowerGridComponent
{
    use WithExport;
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';
    public string $tableName ='team';

    protected $listeners = ['refreshData','submitBulkDelete'];
    public function refreshData(){$this->fillData();}

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showToggleColumns()
                ->showSearchInput(),

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

    public function submitBulkDelete(): void
    {
        if($this->checkboxValues){
            Team::destroy($this->checkboxValues);
            $this->js('window.pgBulkActions.clearAll()'); // clear the count on the interface.
        }
    }
    public function datasource(): Builder
    {
        return Team::query();
    }

    public function relationSearch(): array{ return []; }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('preview' , fn ($member) => '<img class="img-thumbnail me-2" style="height: 50px;" src="'.$member->image_url.'" alt="Image">'.$member->name)
            ->add('position')
            ->add('facebook')
            ->add('created_at')
            ->add('created_at_formatted', fn ($member) => Carbon::parse($member->created_at)->format('d/m/Y'));
    }

    public function columns(): array
    {
        return [
//            Column::make('Id', 'id'),
            Column::make('Name', 'preview', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Position', 'position')
                ->sortable()
                ->searchable(),

            Column::make('Facebook Link', 'facebook')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array { return []; }


    public function actions(Team $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="bx bx-edit-alt"></i>')
                ->id()
                ->class('btn btn-sm p-0')
                ->tooltip('Edit')
                ->dispatch('editTeamMember', ['id' => $row->id]),

             Button::add('delete')
                 ->slot('<i class="bx bx-trash"></i>')
                 ->id()
                 ->tooltip('Delete')
                 ->class('btn btn-sm text-danger p-0')
                 ->dispatch('deleteTeamMember', ['id' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
