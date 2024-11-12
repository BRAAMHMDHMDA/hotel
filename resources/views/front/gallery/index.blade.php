<div>

    <!-- Inner Banner -->
    @include('front.layout.sections._banner', ['current_page'=> 'Gallery'])
    <!-- Inner Banner End -->

    <!-- Gallery Area -->
    <div class="gallery-area pt-100 pb-70">
        <div class="container">
            <div class="tab gallery-tab">
                <div class="tab_content current active pt-45">
                    <div class="tabs_item current">
                        <div class="gallery-tab-item">
                            <div class="gallery-view">
                                <div class="row">
                                    @foreach($images as $image)
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="single-gallery">
                                                <img src="{{ $image->image_url }}" alt="Images">
                                                <a href="{{ $image->image_url }}" class="gallery-icon">
                                                    <i class='bx bx-show'></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="pagination-area">
                    {{$images->links('front.layout.sections._pagination')}}
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery Area End -->
</div>
