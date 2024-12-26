<!-- Banner Form Area -->
<div class="banner-form-area">
    <div class="container">
        <div class="banner-form">
            <form wire:submit.prevent="submit">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group" >
                            <label>CHECK IN TIME</label>
                            <div class="input-group">
                                <input style="cursor: pointer" id="startDate" class="form-control" wire:model="checkIn" type="text" required autocomplete="off" placeholder="mm/dd/yyyy">
                                <span class="input-group-addon"></span>
                            </div>
                            <i class='bx bxs-chevron-down'></i>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <label>CHECK OUT TIME</label>
                            <div class="input-group">
                                <input style="cursor: pointer" type="text" id="endDate" wire:model="checkOut" class="form-control" required autocomplete="off" placeholder="mm/dd/yyyy">
                                <span class="input-group-addon"></span>
                            </div>
                            <i class='bx bxs-chevron-down'></i>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label>GUESTS</label>
                            <x-front.form.input type="number" name="guests" placeholder="0" required min="1"/>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4">
                        <x-front.form.submit-btn class="default-btn btn-bg-one border-radius-5">
                            Check Availability
                        </x-front.form.submit-btn>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Banner Form Area End -->
@script

<script>
    initializeDatepickers();
    document.addEventListener('livewire:load', function () {
        initializeDatepickers();

        // Listen for Livewire updates
        Livewire.on('datepicker:reinitialize', () => {
            initializeDatepickers();
        });
    });

    function initializeDatepickers() {
        // Destroy existing instances
        $("#startDate").datepicker("destroy");
        $("#endDate").datepicker("destroy");

        // Initialize datepicker for start date
        $("#startDate").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            minDate: 0,
            onSelect: function(dateText, inst) {
                let endDate = $('#endDate');
                let selectedDay = (parseInt(inst.selectedDay, 10) + 1).toString();

                endDate.datepicker("option", "minDate", new Date(inst.selectedYear, inst.selectedMonth, selectedDay));
                endDate.val('');
                @this.set('checkIn', dateText);
                @this.set('checkOut', null);
            }
        });

        // Initialize datepicker for end date
        $("#endDate").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            minDate: 0,
            onSelect: function(dateText, inst) {
                @this.set('checkOut', dateText);
            }
        });
    }

    {{--document.addEventListener('livewire:navigated', () => {--}}


    {{--    $("#endDate").datepicker({--}}
    {{--        format: 'yyyy-mm-dd',--}}
    {{--        autoclose: true,--}}
    {{--        minDate: 0,--}}
    {{--        onSelect: function(dateText) {--}}
    {{--            @this.set('checkOut', dateText);--}}
    {{--        }--}}
    {{--    });--}}

    {{--    $("#startDate").datepicker({--}}
    {{--        minDate:0,--}}
    {{--        format: 'yyyy-mm-dd' ,--}}
    {{--        autoclose: true,--}}
    {{--        onSelect: function(dateText, inst) {--}}
    {{--            let endDate = $('#endDate');--}}
    {{--            let selectedDay = (parseInt(inst.selectedDay, 10) + 1).toString();--}}

    {{--            endDate.datepicker("option", "minDate", new Date(inst.selectedYear, inst.selectedMonth , selectedDay ));--}}
    {{--            endDate.val('');--}}
    {{--            @this.set('checkIn', dateText);--}}
    {{--            @this.set('checkOut', null);--}}
    {{--        }--}}
    {{--    });--}}
    {{--})--}}
</script>
@endscript
