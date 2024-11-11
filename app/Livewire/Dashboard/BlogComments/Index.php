<?php

namespace App\Livewire\Dashboard\BlogComments;

use App\Models\Comment;
use App\Models\Testimonial;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Detail;
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
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
            Detail::make()
                ->view('dashboard.blog-comments._row-details')
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
            Comment::destroy($this->checkboxValues);
            $this->js('window.pgBulkActions.clearAll()'); // clear the count on the interface.
        }
    }

    public function datasource(): Builder
    {
        return Comment::query()->with('post');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('content')
            ->add('post_title', fn($comment) => '<a target="_blank" href="/blog/posts/'.$comment->post->slug.'">'.$comment->post->title.'</a>')
            ->add('user_id')
            ->add('user', fn($comment) => $comment->user->full_name)
            ->add('is_active', fn($comment) => $comment->status===Comment::STATUS_ACTIVE)
            ->add('status',
                fn ($post) => $post->status==Comment::STATUS_ACTIVE?
                    '<div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                        <i class="bx bxs-circle me-1"></i>Active
                        </div>':
                    '<div class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3">
                        <i class="bx bxs-circle me-1"></i>Draft
                        </div>'
            )
            ->add('created_at')
            ->add('created_at_formatted', fn ($member) => \Carbon\Carbon::parse($member->created_at)->format('d/m/Y H:i'));

    }

    public function columns(): array
    {
        return [
            Column::make('Post Title', 'post_title'),
            Column::make('User', 'user', 'user_id')
                ->sortable(),
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
        Comment::query()->find($id)->update([
            'status' => $value == 1 ? Comment::STATUS_ACTIVE : Comment::STATUS_DRAFT,
        ]);
//        $this->skipRender();
    }


    public function actions(Comment $row): array
    {
        return [
            Button::add('delete')
                ->slot('<i class="bx bx-trash"></i>Delete')
                ->id()
                ->tooltip('Delete')
                ->class('btn btn-sm btn-danger')
                ->dispatch('deleteBlogComment', ['id' => $row->id])
        ];
    }

}
