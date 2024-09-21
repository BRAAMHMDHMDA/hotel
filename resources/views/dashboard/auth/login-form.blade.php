<div x-data="loginFormHandler()" x-init="init()">

    <form class="row g-3" wire:submit.prevent="login">
        @csrf
        <!-- Lockout Message -->
        <template x-if="lockoutTime > 0">
            <div class="alert alert-warning col-12 text-center py-2">
                <span class="d-block mb-1">Too Many Login Attempts...</span>
                Please Try again in <span x-text="lockoutTime"></span> Seconds.
            </div>
        </template>

        <!-- Email Input -->
        <div class="col-12">
            <label for="inputEmailAddress" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model="email" id="inputEmailAddress" placeholder="jhon@example.com">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password Input -->
        <div class="col-12">
            <label for="inputChoosePassword" class="form-label">Password</label>
            <div class="input-group" id="show_hide_password">
                <input type="password" class="form-control  @error('password') is-invalid @else border-end-0 @enderror" id="inputChoosePassword"
                       placeholder="Enter Password" wire:model="password"
                />
                <a href="javascript:;" class="input-group-text bg-transparent">
                    <i class='bx bx-hide'></i>
                </a>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

        </div>

        <!-- Remember CheckBox -->
        <div class="col-md-6 mb-3">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" wire:model="remember">
                <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
            </div>
        </div>

        <!-- Forgot-Password Route -->
        <div class="col-md-6 mb-3 text-end">
            <a href="#">Forgot Password ?</a>
        </div>

        <!-- Sign in Button -->
        <div class="col-12">
        <div class="d-grid">
            <button type="submit" class="btn btn-primary"
                    wire:loading.attr="disabled"
                    x-bind:disabled="lockoutTime > 0"
            >
                Sign in
                <span class="spinner-border spinner-border-sm text-white ms-1"
                      role="status" wire:loading wire:target="login"
                >
                    <span class="visually-hidden">Loading...</span>
                </span>
            </button>

        </div>
    </div>

    </form>

    @push('scripts')
        <script>
        function loginFormHandler() {
            return {
                lockoutTime: 0,
                countdownInterval: null,

                init() {
                    @this.on('lockoutStarted', (time) => {
                        this.lockoutTime = time;
                        this.startCountdown();
                    });
                },

                startCountdown() {
                    clearInterval(this.countdownInterval);
                    this.countdownInterval = setInterval(() => {
                        if (this.lockoutTime > 0) {
                            this.lockoutTime -= 1;
                        } else {
                            clearInterval(this.countdownInterval);
                            // this.checkLockoutStatus();
                            this.lockoutTime = 0;
                        }
                    }, 1000);
                },

                {{--checkLockoutStatus() {--}}
                {{--    @this.call('checkLockout').then(isLockoutOver => {--}}
                {{--        if (isLockoutOver) {--}}
                {{--            this.lockoutTime = 0;--}}
                {{--        } else {--}}
                {{--            this.lockoutTime = @this.get('lockoutTime');--}}
                {{--            this.startCountdown();--}}
                {{--        }--}}
                {{--    });--}}
                {{--}--}}
            }
        }
    </script>
    @endpush

</div>
