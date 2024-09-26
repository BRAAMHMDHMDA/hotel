<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3"   >
    <div class="breadcrumb-title pe-3">{{$main_title}}</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard.home')}}">
                        <i class="bx bx-home-alt"></i>
                    </a>
                </li>
                @if(isset($sub_titles))
                    @php $sub_titles = (array)$sub_titles @endphp
                    @foreach($sub_titles as $sub_title)
                        <li class="breadcrumb-item">{{$sub_title}}</li>
                    @endforeach
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{$main_title}}</li>
            </ol>
        </nav>
    </div>
    {{$slot}}
</div>
<!--end breadcrumb-->
