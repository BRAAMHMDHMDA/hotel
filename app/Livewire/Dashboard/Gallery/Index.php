<?php

namespace App\Livewire\Dashboard\Gallery;

use App\Models\Gallery;
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
                ->showToggleColumns(),

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
//                ->can((bool)$this->checkboxValues)
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
            Gallery::destroy($this->checkboxValues);
            $this->js('window.pgBulkActions.clearAll()'); // clear the count on the interface.
        }
    }

    public function datasource(): Builder
    {
        return Gallery::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('image', fn($row) => '<img class="img-thumbnail me-2" style="height: 80px;" src="'.$row->image_url.'" alt="Image">')
//            ->add('description')
            ->add('status', fn($row) => $row->status==='active'? '<div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>'.$row->status.'</div>': '<div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>'.$row->status.'</div>')
            ->add('is_active', fn($comment) => $comment->status===Gallery::STATUS_ACTIVE)
            ->add('created_at')
            ->add('created_at_formatted', fn($row) => Carbon::parse($row->created_at)->format('Y-m-d'));
    }

    public function columns(): array
    {
        return [
//            Column::make('Id', 'id'),
            Column::make('Image', 'image'),

//            Column::make('Description', 'description')
//                ->sortable()
//                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),
            Column::make('Is Active', 'is_active')
                ->toggleable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function onUpdatedToggleable(string|int $id, string $field, string $value): void
    {
        Gallery::query()->find($id)->update([
            'status' => $value == 1 ? Gallery::STATUS_ACTIVE : Gallery::STATUS_DRAFT,
        ]);
//        $this->skipRender();
    }


    public function actions(Gallery $row): array
    {
        return [
            Button::add('url')
                ->slot('<i class="bx bx-link"></i>')
                ->id()
                ->tooltip('Copy Image URL')
                ->class('btn btn-sm btn-warning')
                ->dispatch('copyUrl', ['url' => $row->image_url]),

            Button::add('delete')
                ->slot('<i class="bx bx-trash"></i>')
                ->id()
                ->tooltip('Delete Image')
                ->class('btn btn-sm btn-danger')
                ->dispatch('deleteImage', ['id' => $row->id])
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
