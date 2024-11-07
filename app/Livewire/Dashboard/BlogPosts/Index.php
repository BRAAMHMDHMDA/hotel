<?php

namespace App\Livewire\Dashboard\BlogPosts;

use App\Models\BlogPost;
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
        return BlogPost::query()->with('author')->with('category');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('title')
            ->add('preview' , fn ($post) => '<img class="img-thumbnail me-2" style="height: 50px;" src="'.$post->image_url.'" alt="Image">'.$post->title)
            ->add('image_path')
            ->add('blog_category_id')
            ->add('blog_category' , fn ($post) => $post->category->name)
            ->add('status', fn ($post) => $post->status==BlogPost::STATUS_PUBLISHED? '<div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>Published</div>': '<div class="badge rounded-pill text-info bg-light-info p-2 text-uppercase px-3"><i class="bx bxs-circle me-1"></i>Draft</div>')
            ->add('created_by' , fn ($post) => $post->author->name)
            ->add('created_at')
            ->add('created_at_formatted', fn ($post) => Carbon::parse($post->created_at)->format('d/m/Y'))
        ;
    }

    public function columns(): array
    {
        return [
//            Column::make('Id', 'id'),
            Column::make('Title', 'preview', 'title')
                ->sortable()
                ->searchable(),

            Column::make('Category', 'blog_category', 'blog_category_id')
                ->sortable()
                ->searchable(),


            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Created by', 'created_by'),
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

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(BlogPost $row): array
    {
        return [
            Button::add('edit')
                ->id()
                ->tooltip('Edit')
                ->render(function ($row) {
                    return Blade::render(<<<HTML
                        <a class="btn btn-sm btn-warning" wire:navigate href="{{ route('dashboard.blog-posts.edit', $row->id) }}"><i class="bx bx-edit-alt"></i>Edit</a>
                        HTML);
                }),

            Button::add('delete')
                ->slot('<i class="bx bx-trash"></i>Delete')
                ->id()
                ->tooltip('Delete')
                ->class('btn btn-sm btn-danger')
                ->dispatch('deleteBlogPost', ['id' => $row->id])
        ];
    }

}
