@props([
    'name',
    'label'
])


<label for="{{ $name }}" class="form-label">{{ $label }}</label>

<div x-data="facilitiesInput()" class="form-group">
    <div class="facilities-input" @click="focusInput()">
        <template x-for="(facility, index) in facilities" :key="index">
            <div class="facility position-relative" >
                <span x-text="facility"></span>
                <i class="bx bx-x-circle cursor-pointer " @click="removeFacility(index)"></i>
            </div>
        </template>
        <input {{ $attributes->class(['form-control','is-invalid' => $errors->has($name)])}} type="text" x-model="newFacility" @keydown.enter.prevent="addFacility()" @keydown.backspace="removeLastFacility()" placeholder="Add a New Facility...">
        @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

@push('scripts')
    <script>
        function facilitiesInput() {
            modelVar = @this.{{$name}};
            return {
                facilities: modelVar,
                newFacility: '',
                addFacility() {
                    if (this.newFacility.trim() !== '' && !this.facilities.includes(this.newFacility)) {
                        this.facilities.push(this.newFacility.trim());
                        modelVar = this.facilities;
                    }
                    this.newFacility = '';
                },
                removeFacility(index) {
                    this.facilities.splice(index, 1);
                    modelVar = this.facilities;
                },
                removeLastFacility() {
                    if (this.newFacility === '' && this.facilities.length > 0) {
                        this.facilities.pop();
                        modelVar = this.facilities;
                    }
                },
                focusInput() {
                    this.$el.querySelector('input[type=text]').focus();
                }
            }
        }
    </script>
@endpush
