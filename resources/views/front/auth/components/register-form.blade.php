<form method="POST" wire:submit.prevent="register">
    @csrf
    <div class="row">
        <div class="col-lg-12 ">
            <x-front.form.input name="first_name" placeholder="First Name"/>
            <x-front.form.input name="last_name" placeholder="Last Name"/>
        </div>

        <div class="col-lg-12">
            <x-front.form.input type="email" name="email" placeholder="Email"/>
        </div>

        <div class="col-12">
            <x-front.form.input type="password" name="password" placeholder="Password" />
        </div>

        <div class="col-12">
            <x-front.form.input type="password" name="password_confirmation" placeholder="Password Confirmation" />
        </div>

        <div class="col-lg-12 col-md-12 text-center">
            <button type="submit" class="default-btn btn-bg-three border-radius-5">
                Sign Up
            </button>
        </div>

        <div class="col-12">
            <p class="account-desc">
                Already have an account?
                <a href="{{route('login')}}">Sign In</a>
            </p>
        </div>
    </div>
</form>
