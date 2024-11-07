<form class="form-body mt-4" wire:submit.prevent="submit" id="form">
    <div class="row">
        <div class="col-lg-8">
            <div class="border border-3 p-4 rounded">
                <div class="mb-3">
                    <x-dashboard.form.input name="title" label="Title"/>
                </div>
                <div class="mb-3">
                    <x-dashboard.form.textarea name="short_description" label="Short Description" />
                </div>

                <div class="mb-3" wire:ignore>
                    <label for="content" class="form-label">Content: </label>
                    <textarea
                        class="form-control"
                        name="content"
                        id="content">
                    </textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-4 d-flex">
            <div class="border border-3 p-4 rounded">
                <div class="row g-3">
                    <div class="col-12">
                        <x-dashboard.form.image-input :src="$image" :src_old="$old_image??'null' " label="Main Image"/>
                    </div>
                    <div class="col-12">
                        <x-dashboard.form.select label="Category" :options="$categories" name="blog_category_id"/>
                    </div>
                    <div class="col-12">
                        <x-dashboard.form.select
                            label="Status"
                            :options="[\App\Models\BlogPost::STATUS_PUBLISHED => 'PUBLISHED',\App\Models\BlogPost::STATUS_DRAFT => 'DRAFT' ]"
                            name="status"
                        />
                    </div>
                    <div class="col-12 ">
                        <div class="w-100 mt-4">
                            <x-dashboard.form.btn-submit id="submit" label="Save" class="justify-content-center w-100" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
</form>
