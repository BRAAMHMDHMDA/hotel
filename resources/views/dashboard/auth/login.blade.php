<x-dashboard.auth-layout title="Dashboard Login">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="card mb-0">
                        <div class="card-body py-5">
                            <div class="p-4">
                                <div class="mb-3 text-center">
                                    <img src="{{ asset('dash_assets/images/logo-icon.png') }}" width="60" alt="" />
                                </div>
                                <div class="text-center mb-4">
                                    <h5 class="">{{config('app.name')}} Dashboard</h5>
                                    <p class="mb-0">Please log in to your account</p>
                                </div>
                                <div class="form-body">
                                    @livewire('dashboard.auth.login-form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>

</x-dashboard.auth-layout>
