<form wire:submit.prevent="submit">
    @csrf
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="billing-details">
                <h3 class="title">Change Password</h3>
                <div class="row">
                    <div class="col-12">
                        <x-front.form.input name="current_password" label="Current Password" type="password" required/>
                    </div>
                    <div class="col-12">
                        <x-front.form.input name="password" label="New Password" type="password" required/>
                    </div>
                    <div class="col-12">
                        <x-front.form.input name="password_confirmation" label="Confirm Password" type="password" required/>
                    </div>
                    <x-front.form.submit-btn class="btn-danger">Save Changes</x-front.form.submit-btn>
                </div>
            </div>
        </div>
    </div>
</form>
