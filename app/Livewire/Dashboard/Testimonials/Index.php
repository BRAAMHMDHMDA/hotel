<?php

namespace App\Livewire\Dashboard\Testimonials;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Blade;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Detail;
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
//        $this->showCheckBox();

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
            Detail::make()
                ->view('dashboard.testimonials.components._row-details')
                ->showCollapseIcon(),
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
            Testimonial::destroy($this->checkboxValues);
            $this->js('window.pgBulkActions.clearAll()'); // clear the count on the interface.
        }
    }

    public function datasource(): Builder
    {
        return Testimonial::query();
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
            ->add('preview' , fn ($member) => '<img class="img-thumbnail me-2" style="height: 50px;" src="'.$member->image_url.'" alt="Image">'.$member->name)
            ->add('city')
            ->add('message')
            ->add('created_at')
            ->add('created_at_formatted', fn ($member) => \Carbon\Carbon::parse($member->created_at)->format('d/m/Y'));
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'preview', 'name')
                ->sortable()
                ->searchable(),

            Column::make('City', 'city')
                ->sortable()
                ->searchable(),

//            Column::make('Message', 'message')
//                ->sortable()
//                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function actions(Testimonial $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="bx bx-edit-alt"></i>Edit')
                ->id()
                ->class('btn btn-sm btn-warning')
                ->tooltip('Edit')
                ->dispatch('editTestimonial', ['id' => $row->id]),

            Button::add('delete')
                ->slot('<i class="bx bx-trash"></i>Delete')
                ->id()
                ->tooltip('Delete')
                ->class('btn btn-sm btn-danger')
                ->dispatch('deleteTestimonial', ['id' => $row->id])
        ];
    }
}
