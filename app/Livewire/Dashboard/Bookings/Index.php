<?php

namespace App\Livewire\Dashboard\Bookings;

use App\Actions\Dashboard\BookingInvoice;
use App\Actions\Dashboard\DownloadInvoice;
use App\Actions\Dashboard\Invoice;
use App\Models\Booking;
use App\Models\RoomType;
use Barryvdh\DomPDF\Facade\Pdf;
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
    public bool $showFilters = true;
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';


    public function setUp(): array
    {
//        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Booking::query()
            ->with('roomType:id,name')
            ->with('user:id,first_name');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('code', fn (Booking $model) => '<a wire:navigate href="'.route('dashboard.booking.edit', $model->id).'"><div class="badge bg-secondary fw-normal">'.$model->code.'</div></a>')
            ->add('room_type_id')
            ->add('room_type', fn (Booking $model) => '<div class="fw-normal">'.$model->roomType->name.'</div>')
            ->add('user_id')
            ->add('user', fn(Booking $model) => $model->user?->first_name)
            ->add('check_in_formatted', fn (Booking $model) => '<div class="badge bg-gradient-deepblue ">'.Carbon::parse($model->check_in)->format('d/m/Y').'</div>')
            ->add('check_out_formatted', fn (Booking $model) => '<div class="badge bg-gradient-ibiza ">'.Carbon::parse($model->check_out)->format('d/m/Y').'</div>')
//            ->add('persons')
            ->add('number_of_rooms')
            ->add('total_price', fn(Booking $model) => '<div class="badge fw-normal fs-6 rounded text-black  bg-light-primary">'.$model->total_price.'$</div>')
            ->add('payment_method')
            ->add('payment_status')
            ->add('status')
            ->add('created_at_formatted', fn ($row) => \Carbon\Carbon::parse($row->created_at)->format('d-m/y'));
    }

    public function columns(): array
    {
        return [
            Column::make('Code', 'code')
                ->sortable()
                ->searchable(),

            Column::make('B.Date', 'created_at_formatted', 'created_at')
                ->sortable()
                ->searchable(),

            Column::make('Room Type', 'room_type', 'room_type_id')
            ->sortable()
            ,
            Column::make('User', 'user', 'user_id')
                ->sortable(),
            Column::make('Check in', 'check_in_formatted', 'check_in')
                ->sortable(),

            Column::make('Check out', 'check_out_formatted', 'check_out')
                ->sortable(),

//            Column::make('Guest', 'persons')
//                ->sortable()
//                ->searchable(),

            Column::make('Rooms', 'number_of_rooms')
                ->sortable()
                ->searchable(),

            Column::make('Price', 'total_price')
                ->sortable()
                ->searchable(),

            Column::make('P.Method', 'payment_method')
                ->sortable()
                ->searchable(),

            Column::make('P.Status', 'payment_status')
                ->sortable()
                ->searchable(),


            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('check_in'),
            Filter::datepicker('check_out'),
            Filter::datepicker('created_at'),

            Filter::select('room_type', 'room_type_id')
                ->dataSource(RoomType::active()->select('id', 'name')->get())
                ->optionLabel('name')
                ->optionValue('id'),

            Filter::select('payment_method', 'payment_method')
                ->dataSource([
                    ['id' => 'COD', 'name' => 'Cash'],
                    ['id' => 'stripe', 'name' => 'Stripe']
                ])
                ->optionValue('id')
                ->optionLabel('name'),
            Filter::select('payment_status', 'payment_status')
                ->dataSource([
                    ['id' => 'pending', 'name' => 'Pending'],
                    ['id' => 'paid', 'name' => 'Paid']
                ])
                ->optionValue('id')
                ->optionLabel('name'),

        ];
    }

    public function downloadInvoice(Booking $booking): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        return BookingInvoice::download($booking);
    }

    public function actions(): array
    {
        return [
            Button::add('invoice')
                ->id()
                ->tooltip('Download Invoice')
                ->render(function ($row) {
                    return Blade::render(<<<HTML
                        <x-dashboard.form.btn label="Invoice"
                                         icon="bx bxs-download"
                                         class="btn-warning btn-sm"
                                         wire:click="downloadInvoice({$row->id})"
                                         target="downloadInvoice({$row->id})"/>
                        HTML);
                }),
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
