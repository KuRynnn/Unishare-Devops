@extends('layouts.generics')
@section('navbar')
  @include('layouts.parts.navbar')
@endsection
@section('banner')
    <section>
        <div class="banner container-flex" style="background-image: url({{ asset('assets/img/event-banner2.png') }});">
            <div class="row">
                <div class="col-3" id="header-thumbnail">
                    <img src="{{ asset('assets/img/karir-logo.svg') }}" alt="" class="img-fluid mt-5">
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
    <section class="second-navbar pt-3 pb-3">
      <ul class="nav justify-content-center">
          <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('karir') }}">Semua</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('karir', ['category' => 'Lowongan']) }}">Lowongan Kerja</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('karir', ['category' => 'Magang']) }}">Magang</a>
          </li>
      </ul>
    </section>
    <section style="height: 1000px">
      <div class="container-fluid mx-auto">
        <div class="row mx-auto">
          <!-- FILTERS -->          
          <div class="col-lg-3 m-3 mt-5 mx-auto filter-box">
            <form action="/karir" method="GET" class="row g-3 search-bar mb-3">
              <ul class="list-group" style="max-width: 400px;">
                <h5 class="ms-3 mt-4">Filter</h5>
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="checkbox" name="theme[]" value="Sains" id="checkbox1">
                    <label class="form-check-label" for="firstCheckbox">Sains</label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="checkbox" name="theme[]" value="Teknologi" id="checkbox2">
                    <label class="form-check-label" for="secondCheckbox">Teknologi</label>
                </li>
                <li class="list-group-item">
                    <input class="form-check-input me-1" type="checkbox" name="theme[]" value="Bisnis" id="checkbox3">
                    <label class="form-check-label" for="thirdCheckbox">Bisnis</label>
                </li>
                <li class="list-group-item">
                  <input class="form-check-input me-1" type="checkbox" name="theme[]" value="Desain" id="checkbox3">
                  <label class="form-check-label" for="thirdCheckbox">Desain</label>
                </li>
                <li class="list-group-item">
                  <input class="form-check-input me-1" type="checkbox" name="theme[]" value="Fotografi" id="checkbox3">
                  <label class="form-check-label" for="thirdCheckbox">Fotografi</label>
                </li>
                <li class="list-group-item">
                  <input class="form-check-input me-1" type="checkbox" name="theme[]" value="Manajemen" id="checkbox3">
                  <label class="form-check-label" for="thirdCheckbox">Manajemen</label>
                </li>
              </ul> 
              <div class="mb-3 search-bar">
                  <input type="text" name="search" class="form-control ms-4" placeholder="Cari kegiatan karir disini" value="{{request('search')}}" >
                  <button type="submit" class="btn btn-custom1 ms-4 ps-3 pe-3">Search!</button>
              </div>  
            </form>
          </div>             
          <div class="col-lg-8 mt-5 mx-auto">
            <!-- CARDS -->
            @foreach ($data as $item)
            <!-- USER POST -->
            <div class="card mb-4" style="max-width: 1000px;" >
              <div class="row g-0">
                <div class="col-lg-4">  
                  <a class="image-popup-no-margins" href="{{ asset('/storage/' . $item->banner_img) }}" title="Caption. Can be aligned to any side and contain any HTML.">
                    <img src="{{ asset('/storage/' . $item->banner_img) }}"  alt="thumbnail" style="width: 100%; height: 100%; object-fit: cover;" class="img-fluid rounded">
                  </a>
                </div>
                <div class="col-lg-8">
                  <a class="card-body ms-2" href="{{ url('/karir/' . $item->karir_post_id)}}">
                    <h5 class="card-title ms-3">{{$item->title}}</h5>
                    <p class="card-text ms-3">{{ substr($item->content, 0, 185) . " ..." }}</p>
                    <p class="card-text ms-3"><small class="text-body-secondary">Last updated {{ $item->updated_at->format('d F Y') }}</small></p>
                  </a>
                </div>
              </div>
            </div>
            @endforeach
            <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                {{-- Previous Page Link --}}
                @if ($data->onFirstPage())
                  <li class="page-item disabled">
                      <span class="page-link" tabindex="-1">Previous</span>
                  </li>
                @else
                  <li class="page-item">
                      <a class="page-link" href="{{ $data->previousPageUrl() . '&' . http_build_query(request()->except('page')) }}" tabindex="-1">Previous</a>
                  </li>
                @endif

                {{-- Ellipsis before current page --}}
                @if($data->currentPage() > 3)
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @php
                    $maxLinks = 4;
                    $start = max(1, $data->currentPage() - floor($maxLinks / 2));
                    $end = min($start + $maxLinks - 1, $data->lastPage());
                @endphp

                @for ($i = $start; $i <= $end; $i++)
                    <li class="page-item @if ($i == $data->currentPage()) active @endif">
                        <a class="page-link" href="{{ $data->url($i) . '&' . http_build_query(request()->except('page')) }}">{{ $i }}</a>
                    </li>
                @endfor

                {{-- Ellipsis after current page --}}
                @if ($end < $data->lastPage())
                    <li class="page-item disabled">
                        <span class="page-link">...</span>
                    </li>
                @endif
                
                {{-- Next Page Link --}}
                @if ($data->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->nextPageUrl() . '&' . http_build_query(request()->except('page')) }}">Next</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">Next</span>
                    </li>
                @endif
              </ul>
            </nav>
          </div> 
        </div>
      </div>
    </section>
@endsection

    



