
<div class="position-relative" x-data="app()" x-init="[initDate(), getNoOfDays()]" x-cloak>
    <input type="hidden" name="date" x-ref="date" :value="datepickerValue" />
    <input class="w-100 border-0 form-control" style="cursor: pointer"  type="text" x-on:click="showDatepicker = !showDatepicker" x-model="datepickerValue" x-on:keydown.escape="showDatepicker = false" placeholder="Select date" readonly />

        <i class='bx bxs-chevron-down position-absolute z-3' style="cursor: pointer; right: 50px!important; top: 10px!important;" x-on:click="showDatepicker = !showDatepicker" ></i>


    <div class="bg-white mt-2 rounded shadow p-3 position-absolute top-100 start-0" style="width: 17rem;" x-show.transition="showDatepicker" @click.away="showDatepicker = false">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
                <span x-text="MONTH_NAMES[month]" class="h5 fw-bold text-dark"></span>
                <span x-text="year" class="ms-2 h5 text-secondary"></span>
            </div>
            <div>
                <button type="button" class="btn btn-sm btn-outline-secondary me-2" @click="if (month == 0) { year--; month = 12; } month--; getNoOfDays()">
                    &lt;
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" @click="if (month == 11) { month = 0; year++; } else { month++; } getNoOfDays()">
                    &gt;
                </button>
            </div>
        </div>

        <div class="d-flex flex-wrap mb-3">
            <template x-for="(day, index) in DAYS" :key="index">
                <div class="text-center text-secondary" style="width: 14.28%">
                    <span x-text="day" class="fw-medium"></span>
                </div>
            </template>
        </div>

        <div class="d-flex flex-wrap">
            <template x-for="blankday in blankdays">
                <div class="text-center" style="width: 14.28%"></div>
            </template>
            <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                <div class="px-1 mb-1 " style="width: 14.28%;">
                    <div @click="getDateValue(date)" x-text="date" class="text-center py-1 test rounded cursor-pointer" style="cursor: pointer" :class="{
                  'btn-bg-one text-white': isSelectedDate(date) == true,
                  'text-dark bg-light': isToday(date) == true,
                  'text-secondary': isToday(date) == false && isSelectedDate(date) == false,
                  'btn-bg-one text-white': isSelectedDate(date) == true
                }"></div>
                </div>
            </template>
        </div>
    </div>
</div>
<style>
    .test:hover{
        background-color: #eee;
    }
</style>
<script>
    const MONTH_NAMES = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];
    const DAYS = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    function app() {
        return {
            showDatepicker: false,
            datepickerValue: "",
            selectedDate: "2024-10-10",
            dateFormat: "DD-MM-YYYY",
            month: "",
            year: "",
            no_of_days: [],
            blankdays: [],
            initDate() {
                let today;
                if (this.selectedDate) {
                    today = new Date(Date.parse(this.selectedDate));
                } else {
                    today = new Date();
                }
                this.month = today.getMonth();
                this.year = today.getFullYear();
                this.datepickerValue = this.formatDateForDisplay(today);
            },
            formatDateForDisplay(date) {
                let formattedDay = DAYS[date.getDay()];
                let formattedDate = ("0" + date.getDate()).slice(-2);
                let formattedMonth = MONTH_NAMES[date.getMonth()];
                let formattedMonthInNumber = ("0" + (parseInt(date.getMonth()) + 1)).slice(-2);
                let formattedYear = date.getFullYear();
                if (this.dateFormat === "DD-MM-YYYY") {
                    return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`;
                }
                return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
            },
            isSelectedDate(date) {
                const d = new Date(this.year, this.month, date);
                return this.datepickerValue === this.formatDateForDisplay(d) ? true : false;
            },
            isToday(date) {
                const today = new Date();
                const d = new Date(this.year, this.month, date);
                return today.toDateString() === d.toDateString() ? true : false;
            },
            getDateValue(date) {
                let selectedDate = new Date(this.year, this.month, date);
                this.datepickerValue = this.formatDateForDisplay(selectedDate);
                this.isSelectedDate(date);
                this.showDatepicker = false;
            },
            getNoOfDays() {
                let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
                let dayOfWeek = new Date(this.year, this.month).getDay();
                let blankdaysArray = [];
                for (var i = 1; i <= dayOfWeek; i++) {
                    blankdaysArray.push(i);
                }
                let daysArray = [];
                for (var i = 1; i <= daysInMonth; i++) {
                    daysArray.push(i);
                }
                this.blankdays = blankdaysArray;
                this.no_of_days = daysArray;
            },
        };
    }
</script>
