@extends('layouts.generics')
@section('navbar')
    @include('layouts.parts.navbar')
@endsection
@section('banner')
    <section>
        <div class="banner container-flex" style="background-image: url({{ asset('assets/img/event-banner2.png') }});">
            <div class="row">
                <div class="col-3" id="header-thumbnail">
                    <img src="{{ asset('assets/img/welcome-logo.svg') }}" alt="" class="img-fluid mt-5">
                </div>
                <div class="col-7 mt-5">
                    <h2 class="text-wrap" id="title-thumbnail">Eksplorasi peluang karir dan pendidikan yang sesuai dengan minatmu.</h2>
                    <h6 class="text-wrap text-white fw-normal mt-2">Temukan berbagai program pendidikan yang dapat membantu mengembangkan keterampilanmu!</h6>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('content')   
    <!-- KARIR-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-11">
                <h2>KARIR</h2>
            </div>
            <div class="col-lg-1">
                <a href="{{ url('/karir') }}" class="more-link">
                    <h6>More <span style="font-size: 24px;">&#8594;</span></h6>
                </a>
            </div>
        </div>
        
        <div class="row row-cols-1 row-cols-md-2 g-3">
            @for ($i = 0; $i < 4 && $i < count($dataKarirPost); $i++)
            <div class="col-lg-3">
                <div class="card h-100 d-flex align-items-center ">
                    <a class="image-popup-no-margins" href="{{ asset('/storage/' . $dataKarirPost[$i]->banner_img) }}" title="Caption. Can be aligned to any side and contain any HTML.">
                        <img src="{{ asset('/storage/' . $dataKarirPost[$i]->banner_img) }}"  alt="thumbnail" style="width: 100%; height: 100%; object-fit: cover;" class="img-fluid rounded">
                    </a>
                    <a class="card-body flex-fill " href="{{ url('/karir/' . $dataKarirPost[$i]->karir_post_id)}}">
                        <h5 class="card-title ms-3">{{ $dataKarirPost[$i]->title }}</h5>
                        <p class="card-text ms-3">{{ substr($dataKarirPost[$i]->content, 0, 150) . " ..." }}</p>
                        <p class="card-text ms-3"><small class="text-body-secondary">Last updated {{ $dataKarirPost[$i]->updated_at->format('d F Y') }}</small></p>
                    </a>
                </div>
            </div>
            @endfor          
        </div> 
    </div>

    <!-- EVENT-->
    <div class="container mt-5">
    <div class="row">
            <div class="col-lg-11">
                <h2>ACARA</h2>
            </div>
            <div class="col-lg-1">
                <a href="{{ url('/event') }}" class="more-link">
                    <h6>More <span style="font-size: 24px;">&#8594;</span></h6>
                </a>
            </div>
        </div>
        
        <div class="row row-cols-1 row-cols-md-2 g-3">
            @for ($i = 0; $i < 4 && $i < count($dataPost); $i++)
            <div class="col-lg-3">
                <div class="card h-100 d-flex align-items-center ">
                    <a class="image-popup-no-margins" href="{{ asset('/storage/' . $dataPost[$i]->banner_img) }}" title="Caption. Can be aligned to any side and contain any HTML.">
                        <img src="{{ asset('/storage/' . $dataPost[$i]->banner_img) }}"  alt="thumbnail" style="width: 100%; height: 100%; object-fit: cover;" class="img-fluid rounded">
                    </a>
                    <a class="card-body flex-fill " href="{{ url('/event/' . $dataPost[$i]->post_id) }}">
                        <h5 class="card-title ms-3">{{$dataPost[$i]->title}}</h5>
                        <p class="card-text ms-3">{{ substr($dataPost[$i]->content, 0, 150) . " ..." }}</p>
                        <p class="card-text ms-3"><small class="text-body-secondary">Last updated {{ $dataPost[$i]->updated_at->format('d F Y') }}</small></p>
                    </a>
                </div>
            </div>
            @endfor            
        </div> 
    </div>

    <!-- Beasiswa-->
    <div class="container mt-5">
    <div class="row">
            <div class="col-lg-11">
                <h2>BEASISWA</h2>
            </div>
            <div class="col-lg-1">
                <a href="{{ url('/beasiswa') }}" class="more-link">
                    <h6>More <span style="font-size: 24px;">&#8594;</span></h6>
                </a>
            </div>
        </div>
        
        <div class="row row-cols-1 row-cols-md-2 g-3">
            @for ($i = 0; $i < 4 && $i < count($dataBeasiswa); $i++)
            <div class="col-lg-3">
                <div class="card h-100 d-flex align-items-center ">
                    <a class="image-popup-no-margins" href="{{ asset('/storage/' . $dataBeasiswa[$i]->beasiswa_img) }}" title="Caption. Can be aligned to any side and contain any HTML.">
                        <img src="{{ asset('/storage/' . $dataBeasiswa[$i]->beasiswa_img) }}"  alt="thumbnail" style="width: 100%; height: 100%; object-fit: cover;" class="img-fluid rounded">
                    </a>
                    <a class="card-body flex-fill " href="{{ url('/beasiswa/' . $dataBeasiswa[$i]->id) }}">
                        <h5 class="card-title ms-3">{{$dataBeasiswa[$i]->title}}</h5>
                        <p class="card-text ms-3">{{ substr($dataBeasiswa[$i]->deskripsi_beasiswa, 0, 150) . " ..." }}</p>
                        <p class="card-text ms-3"><small class="text-body-secondary">Last updated {{ $dataBeasiswa[$i]->updated_at->format('d F Y') }}</small></p>
                    </a>
                </div>
            </div>
            @endfor            
        </div> 
    </div>
    <br><br><br><br><br><br>
@endsection