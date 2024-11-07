<div>
    <x-dashboard.breadcrumb mainTitle="Edit Blog-Post" :sub-titles="['Blog']"/>
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Edit Blog-Post</h5>
            <hr/>
            @include('dashboard.blog-posts._form')
        </div>
    </div>

</div>
@script
    <script>
        document.addEventListener('livewire:navigated', function () {

            // Check if CKEditor instance already exists and destroy it
            if (CKEDITOR.instances['content']) {
                CKEDITOR.instances['content'].destroy(true);
            }

            let editor = CKEDITOR.replace('content');
            let oldContent = @this.get('content');
            editor.setData(oldContent);

            // Update Livewire content only when form is submitted
            document.getElementById('submit').addEventListener('click', function (e) {
                @this.set('content', editor.getData())
            });
        });
    </script>
@endscript
