<div>

    <!-- Inner Banner -->
    @include('front.layout.sections._banner', ['current_page'=> 'Contact'])
    <!-- Inner Banner End -->

    <!-- Contact Area -->
    <div class="contact-area pt-100 pb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="contact-content">
                        <div class="section-title">
                            <h2>Let's Start to Give Us a Message and Contact With Us</h2>
                        </div>
                        <div class="contact-img">
                            <img src="assets/img/contact/contact-img1.jpg" alt="Images">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="contact-form">
                        <form wire:submit.prevent="submit">
                            <div class="row">
                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <x-front.form.input name="name" placeholder="Name" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <x-front.form.input name="email" type="email" placeholder="Email" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <x-front.form.input name="phone" placeholder="Phone" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-sm-6">
                                    <div class="form-group">
                                        <x-front.form.input name="subject" placeholder="Your Subject" />
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea wire:model="message" class="form-control @error('message') is-invalid @enderror" id="message" cols="30" rows="8" required placeholder="Your Message"></textarea>
                                        @error('message')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group checkbox-option">
                                        <input type="checkbox" id="chb2" wire:model="privacy_policy" class="@error('privacy_policy') is-invalid @enderror">
                                        <p>
                                            Accept <a href="#">Terms & Conditions</a> And <a href="#">Privacy Policy.</a>
                                        </p>
                                        @error('privacy_policy')
                                            <div class="invalid-feedback">
                                                Must Accept Privacy Policy
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn btn-bg-three">
                                        Send Message
                                    </button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Area End -->

{{--    <!-- contact Another -->--}}
{{--    <div class="contact-another pb-70">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="contact-another-content">--}}
{{--                        <div class="section-title">--}}
{{--                            <h2>Contacts Info</h2>--}}
{{--                            <p>--}}
{{--                                We are one of the best agency and we can easily make a contract--}}
{{--                                us anytime on the below details.--}}
{{--                            </p>--}}
{{--                        </div>--}}

{{--                        <div class="contact-item">--}}
{{--                            <ul>--}}
{{--                                <li>--}}
{{--                                    <i class='bx bx-home-alt'></i>--}}
{{--                                    <div class="content">--}}
{{--                                        <span>123 Virgil A Stanton, Virginia, USA</span>--}}
{{--                                        <span>163 Virgil A Stanton, Virginia, USA</span>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <i class='bx bx-phone-call'></i>--}}
{{--                                    <div class="content">--}}
{{--                                        <span><a href="tel:+1(123)4567890">+1 (123) 456 7890</a></span>--}}
{{--                                        <span><a href="tel:+1(123)4567896">+1 (123) 456 7896</a></span>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <i class='bx bx-envelope'></i>--}}
{{--                                    <div class="content">--}}
{{--                                        <span><a href="info@atoli.com">info@atoli.com</a></span>--}}
{{--                                        <span><a href="hello@atoli.com">hello@atoli.com</a></span>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <div class="col-lg-6">--}}
{{--                    <div class="contact-another-img">--}}
{{--                        <img src="assets/img/contact/contact-img2.jpg" alt="Images">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- contact Another End -->--}}

    <!-- Map Area -->
    <div class="map-area">
        <div class="container-fluid m-0 p-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50194.82376159623!2d-79.09792989247224!3d38.159337740034566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b4a08eb8621697%3A0xe5d6e4710a09b66e!2zU3RhdW50b24sIOCmreCmvuCmsOCnjeCmnOCmv-CmqOCmv-Cmr-CmvOCmviAyNDQwMSwg4Kau4Ka-4Kaw4KeN4KaV4Ka_4KaoIOCmr-CngeCmleCnjeCmpOCmsOCmvuCmt-CnjeCmn-CnjeCmsA!5e0!3m2!1sbn!2sbd!4v1604126938221!5m2!1sbn!2sbd"></iframe>
        </div>
    </div>
    <!-- Map Area End -->

</div>
