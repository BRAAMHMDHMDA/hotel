<?php

namespace App\Livewire\Dashboard\Contacts;

use App\Models\Contact;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Themes\Bootstrap5;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;
use function Laravel\Prompts\alert;

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
            //table theme
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
                ->can((bool)$this->checkboxValues)
                ->dispatch('show-delete-confirmation', []),
        ];
    }

    #[On('bulkDelete.{tableName}')]
    public function bulkDelete(): void
    {
        if($this->checkboxValues) {
            $this->dispatch('show-delete-confirmation');
        }
    }

    public function submitBulkDelete(): void
    {
        if($this->checkboxValues){
            Contact::destroy($this->checkboxValues);
            $this->js('window.pgBulkActions.clearAll()'); // clear the count on the interface.
        }
    }
    public function datasource(): Builder
    {
        return Contact::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('email')
            ->add('phone')
            ->add('subject', fn($contact) => '<i class="bx bxs-message-square-dots"></i> '. $contact->subject )
            ->add('message')
            ->add('created_at')
            ->add('created_at_formatted', fn ($member) => \Carbon\Carbon::parse($member->created_at)->format('d/m/Y H:i'));
    }

    public function columns(): array
    {
        return [
            Column::make('Subject', 'subject')
                ->sortable()
                ->searchable(),

            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Phone', 'phone')
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

    #[\Livewire\Attributes\On('markRead')]
    public function markRead($id): void
    {

        $contact = Contact::find($id);
        if ($contact->is_read == "1") {
            $contact->is_read = "0";
            $contact->save();
        }else{
            $contact->is_read = "1";
            $contact->save();
        }
        $this->dispatch('refreshData')->to(Index::class);
    }

    public function actions(Contact $row): array
    {
        return [
            Button::add('mark-read')
                ->slot('<i class="bx bx-show"></i>')
                ->id()
                ->tooltip('Mark as Read')
                ->class('btn btn-sm btn-info')
                ->can($row->is_read == 0)
                ->dispatch('markRead', [$row->id]),

            Button::add('mark-unread')
                ->slot('<i class="bx bx-hide"></i>')
                ->id()
                ->tooltip('Mark as unRead')
                ->class('btn btn-sm btn-info')
                ->can($row->is_read == 1)
                ->dispatch('markRead', [$row->id]),

            Button::add('show')
                ->slot('<i class="bx bx-show"></i>Show')
                ->id()
                ->tooltip('Show')
                ->class('btn btn-sm btn-warning')
                ->dispatch('showContact', [$row->id]),

            Button::add('delete')
                ->slot('<i class="bx bx-trash"></i>Delete')
                ->id()
                ->tooltip('Delete')
                ->class('btn btn-sm btn-danger')
                ->dispatch('deleteContact', [$row->id]),
        ];
    }

    public function show($rowId): void
    {
        $this->dispatch('showContact', $rowId)->to(Show::class);
    }

    public function actionRules($row): array
    {
       return [

           \PowerComponents\LivewirePowerGrid\Facades\Rule::rows()
               ->loop(function () use ($row) {
                   return $row->is_read == 0;
               })
               ->setAttribute('class', 'text-primary bg-light cursor-pointer'),

           \PowerComponents\LivewirePowerGrid\Facades\Rule::rows()
               ->loop(function () use ($row) {
                   return $row->is_read == 0;
               })
               ->setAttribute('wire:click', "show($row->id)"),

       ];
    }

}
