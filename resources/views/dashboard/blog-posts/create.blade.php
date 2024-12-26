<div>
    <x-dashboard.breadcrumb mainTitle="Create Blog-Post" :sub-titles="['Blog']"/>
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Create New Blog-Post</h5>
            <hr/>
            @include('dashboard.blog-posts._form')
        </div>
    </div>

</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:navigated', function () {
            $editor = CKEDITOR.replace('content');
            // Update Livewire content only when form is submitted
            document.getElementById('submit').addEventListener('click', function (e) {
                @this.set('content', $editor.getData())
            });
        });
    </script>
@endpush
