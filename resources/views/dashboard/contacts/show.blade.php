<x-dashboard.modal id="show-modal" title="Show Contact" class="border-bottom" >
        <div class="row px-5 py-4 mt-4">
            <div class="row mb-3">
                <div class="col-3">
                    <strong>Name :</strong>
                </div>
                <div class="col-8">
                    {{$contact?->name}}
                </div>
            </div>
            <hr />
            <div class="row mb-3">
                <div class="col-3">
                    <strong>Email :</strong>
                </div>
                <div class="col-8">
                    {{$contact?->email}}
                </div>
            </div>
            <hr />
            <div class="row mb-3">
                <div class="col-3">
                    <strong>Phone :</strong>
                </div>
                <div class="col-8">
                    {{$contact?->phone}}
                </div>
            </div>
            <hr />
            <div class="row mb-3">
                <div class="col-3">
                    <strong>Subject :</strong>
                </div>
                <div class="col-8">
                    {{$contact?->subject}}
                </div>
            </div>
            <hr />

            <div class="row mb-3">
                <div class="col-3">
                    <strong>Message :</strong>
                </div>
                <div class="col-8">
                    {{$contact?->message}}
                </div>
            </div>
        </div>
</x-dashboard.modal>
