<x-dashboard.auth-layout title="404">

    <div class="error-404 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="card py-5">
                <div class="row g-0">
                    <div class="col col-xl-5">
                        <div class="card-body p-4">
                            <h1 class="display-1"><span class="text-primary">4</span><span class="text-danger">0</span><span class="text-success">3</span></h1>
                            <h2 class="font-weight-bold display-4">Forbidden</h2>
                            <p>You have reached the edge of the universe.
                                <br>Your does not have the right permissions.
                                <br>Don't worry and return to the previous page.</p>
                            <div class="mt-5">
                                <a wire:navigate href="{{route('dashboard.home')}}" class="btn btn-primary btn-lg px-md-5 radius-30">Go Home</a>
                                <button onclick="window.history.back();" class="btn btn-outline-dark btn-lg ms-3 px-md-5 radius-30">Back</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <img src="https://www.awardspace.com/wp-content/uploads/2021/01/403-forbidden-1.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
</x-dashboard.auth-layout>
s
