<x-front.front-layout title="Change Password">

    @include('front.layout.sections._banner', ['current_page' => 'Change Password'])

    <!-- Service Details Area -->
    <div class="service-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('front.user.components._sidebar')
                </div>

                <div class="col-lg-9">
                    <div class="service-article">
                        <section class="checkout-area pb-70">
                            <div class="container">
                                <livewire:front.user.change-password-form />
                            </div>
                        </section>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Service Details Area End -->

</x-front.front-layout>
