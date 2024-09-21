<form wire:submit.prevent="submit">
    @csrf
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="billing-details">
                <h3 class="title">My Profile</h3>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <x-front.form.input name="first_name" label="First Name" required/>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <x-front.form.input name="last_name" label="Last Name" required/>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <x-front.form.input name="email" label="Email Address" required/>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <x-front.form.input name="phone" label="Phone" required/>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <x-front.form.input name="image" type="file" label="User Image" required>
                            <div style="max-width: 50%"
                                 wire:loading wire:target="image"
                                 wire:loading.class="d-flex justify-content-center align-items-center"
                            >
                                <span class="spinner-border m-2"></span>
                            </div>
                            @if (is_null($image) && !is_null($old_image))
                                <img src="{{$old_image}}" style="max-width: 50%" wire:target="image" wire:loading.attr="hidden" >
                            @else
                                <img src="{{$image?->temporaryUrl()}}" style="max-width: 50%; margin: auto" wire:target="image" wire:loading.attr="hidden" >
                            @endif
                        </x-front.form.input>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <x-front.form.input name="city" label="Town / City"/>
                    </div>
                    <x-front.form.submit-btn>Save Changes</x-front.form.submit-btn>
                </div>
            </div>
        </div>
    </div>
</form>
