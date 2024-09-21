<x-front.front-layout title="Login Page">
    <!-- Inner Banner -->
    @include('front.layout.sections._banner', [ 'current_page' => 'Sign In' ])
    <!-- Inner Banner End -->

    <!-- Sign In Area -->
    <div class="sign-in-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <span class="sp-color">Sign In</span>
                                <h2>Sign In to Your Account!</h2>
                            </div>
                            <livewire:front.auth.login-form />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In Area End -->

</x-front.front-layout>
