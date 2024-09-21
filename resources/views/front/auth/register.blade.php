<x-front.front-layout title="Sign Up Page">
    <!-- Inner Banner -->
    @include('front.layout.sections._banner', [ 'current_page' => 'Sign Up' ])
    <!-- Inner Banner End -->

    <!-- Sign Up Area -->
    <div class="sign-up-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="user-all-form">
                        <div class="contact-form">
                            <div class="section-title text-center">
                                <span class="sp-color">Sign Up</span>
                                <h2>Create an Account!</h2>
                            </div>
                            <livewire:front.auth.register-form/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign Up Area End -->

</x-front.front-layout>
