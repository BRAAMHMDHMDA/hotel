<!-- FAQ Area -->
<div class="faq-area pt-100 pb-70 section-bg" id="faq-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="faq-content faq-content-bg2">
                    <div class="section-title">
                        <span class="sp-color">{{$faq_area->short_title}}</span>
                        <h2>{{$faq_area->main_title}}</h2>
                        <p>{{$faq_area->description}}</p>
                    </div>

                    <div class="faq-accordion">
                        <ul class="accordion">
                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i class='bx bx-plus'></i>
                                    {{$faq_area->first_question}}
                                </a>

                                <div class="accordion-content">
                                    <p>
                                        {{$faq_area->first_answer}}
                                    </p>
                                </div>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i class='bx bx-plus'></i>
                                    {{$faq_area->second_question}}
                                </a>

                                <div class="accordion-content">
                                    <p>
                                        {{$faq_area->second_answer}}
                                    </p>
                                </div>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title" href="javascript:void(0)">
                                    <i class='bx bx-plus'></i>
                                    {{$faq_area->third_question}}
                                </a>

                                <div class="accordion-content">
                                    <p>
                                        {{$faq_area->third_answer}}
                                    </p>
                                </div>
                            </li>

                            <li class="accordion-item">
                                <a class="accordion-title active" href="javascript:void(0)">
                                    <i class='bx bx-plus'></i>
                                    {{$faq_area->fourth_question}}
                                </a>

                                <div class="accordion-content show">
                                    <p>
                                        {{$faq_area->fourth_answer}}
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="faq-img-3">
                    <img src="{{$faq_area->image_url}}" alt="Images">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQ Area End -->
