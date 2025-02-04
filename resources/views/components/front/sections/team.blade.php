<!-- Team Area Three -->
<div class="team-area-three pt-100 pb-70">
    <div class="container">
        <div class="section-title text-center">
            <span class="sp-color">TEAM</span>
            <h2>Let's Meet Up With Our Special Team Members</h2>
        </div>
        <div class="team-slider-two owl-carousel owl-theme pt-45">
            @foreach($team as $member)
                <div class="team-item">
                    <a href="#">
                        <img src="{{$member->image_url}}" alt="Images">
                    </a>
                    <div class="content">
                        <h3><a href="#">{{$member->name}}</a></h3>
                        <span>{{$member->position}}</span>
                        <ul class="social-link">
                            <li>
                                <a href="{{$member->facebook}}" target="_blank"><i class='bx bxl-facebook'></i></a>
                            </li>
                            <li>
                                <a href="{{$member->facebook}}" target="_blank"><i class='bx bxl-twitter'></i></a>
                            </li>
                            <li>
                                <a href="{{$member->facebook}}" target="_blank"><i class='bx bxl-instagram'></i></a>
                            </li>
                            <li>
                                <a href="{{$member->facebook}}" target="_blank"><i class='bx bxl-pinterest-alt'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team Area Three End -->
