<div>
    <x-dashboard.breadcrumb mainTitle="Room Template" :sub-titles="['Room Types']"/>
    <div class="card">
        <div class="card-body p-4">
            <h5 class="card-title">Edit Room Template</h5>
            <hr/>

            <form class="form-body mt-4" wire:submit.prevent="submit">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="border border-3 p-4 rounded">
                            <div class="mb-3">
                                <x-dashboard.form.input name="room_type" label="Room Type" value="{{$roomType->name}}" disabled/>
                            </div>
                            <div class="mb-3">
                                <x-dashboard.form.textarea name="short_description" label="Short Description" />
                            </div>
                            <div class="mb-3">
                                <x-dashboard.form.textarea name="description" label="Description" rows="3"/>
                            </div>
                            <div class="mb-3">
                                <x-dashboard.form.image-input :src="$image" :src_old="$old_image" label="Main Image"/>
                            </div>
                            <div class="mb-3">
                                <x-dashboard.form.input type="file" name="images" label="Gallery" placeholder="Upload Images" multiple />
                            </div>
                            <!-- Loading indicator for file input -->
                            <div wire:loading wire:target="images" class="mb-3">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Uploading...</span>
                                </div>
                                <span class="ms-2">Uploading images...</span>
                            </div>
                            <!-- Preview selected images with cancel button -->
                            @if ($images)
                                <div class="row mb-3">
                                    @foreach ($images as $index => $image)
                                        <div class="col-3 position-relative">
                                            <img src="{{ $image->temporaryUrl() }}" class="img-fluid img-thumbnail">
                                            <button type="button" wire:click="removeImage({{ $index }})"
                                                    class="btn btn-danger btn-sm position-absolute top-0 end-0">
                                                x
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <!-- Show uploaded photos with delete option -->
                            @if (!$uploadedImages->isEmpty())
                                <div class="mt-4">
                                    <h5>Saved Images:</h5>
                                    <div class="row">
                                        @foreach ($uploadedImages as $image)
                                            <div class="col-3 position-relative">
                                                <img src="{{ asset('storage/media/' . $image->image_path) }}" class="img-fluid img-thumbnail mb-3">
                                                <button type="button" wire:click="deleteUploadedImage('{{ $image->image_path }}')" class="btn btn-danger btn-sm position-absolute top-0 end-0">x</button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <h6 class="mt-2 text-muted">No Images Saved</h6>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="border border-3 p-4 rounded">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <x-front.form.input name="price" label="Price" type="number" placeholder="00$"/>
                                </div>
                                <div class="col-md-6">
                                    <x-front.form.input name="discount" label="Discount" type="number" placeholder="00$"/>
                                </div>
                                <div class="col-md-6">
                                    <x-front.form.input name="total_adult" label="Total Adult" type="number" placeholder="0"/>
                                </div>
                                <div class="col-md-6">
                                    <x-front.form.input name="total_child" label="Total Child" type="number" placeholder="0"/>
                                </div>
                                <div class="col-md-6">
                                    <x-front.form.input name="capacity" label="Capacity" type="number" placeholder="0"/>
                                </div>
                                <div class="col-md-6">
                                    <x-front.form.input name="size" label="Size" type="number" placeholder="0"/>
                                </div>
                                <div class="col-12">
                                    <x-front.form.input name="view" label="View" placeholder="Enter Room View"/>
                                </div>
                                <div class="col-12">
                                    <x-front.form.input name="bed_style" label="Bed Style" placeholder="Enter Room View"/>
                                </div>
                                <div class="col-12">
                                    <x-dashboard.form.tagify-input name="facilities" label="Facilities"/>
                                </div>
                                <div class="col-12">
                                    <x-dashboard.form.select label="Status" :options="['draft' => 'Draft','active' => 'Active' ]" name="status"/>
                                </div>
                                <div class="col-12">
                                    <div class="w-100">
                                        <x-dashboard.form.btn-submit label="Save" class="justify-content-center w-100"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            </form>
        </div>
    </div>

</div>
