<form method="POST" wire:submit.prevent="submit">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <x-front.form.input name="email" type="email" required
                                data-error="Please enter your Username or Email"
                                placeholder="Username or Email"
            />
        </div>

        <div class="col-12">
            <x-front.form.input type="password" name="password" placeholder="Password" />
        </div>

        <div class="col-lg-6 col-sm-6 form-condition">
            <div class="agree-label">
                <input type="checkbox" id="chb1" name="remember">
                <label for="chb1">
                    Remember Me
                </label>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6">
            <a class="forget" href="#">Forgot My Password?</a>
        </div>

        <div class="col-lg-12 col-md-12 text-center">
            <x-front.form.submit-btn class="default-btn btn-bg-three border-radius-5">
                Sign In Now
            </x-front.form.submit-btn>
        </div>

        <div class="col-12">
            <p class="account-desc">
                Not a Member?
                <a href="{{route('register')}}" wire:navigate>Sign Up</a>
            </p>
        </div>
    </div>
</form>
