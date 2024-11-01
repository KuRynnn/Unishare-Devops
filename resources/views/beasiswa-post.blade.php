@extends('layouts.generics')
@section('navbar')
    @include('layouts.parts.navbar')
@endsection
@section('content')

    <!-- POST CONTAINER -->
    <section class="post-container mx-auto m-5 p-5">
      <!-- Breadcumb -->
      <nav aria-label="breadcrumb" class="mb-5">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="/beasiswa">Beasiswa</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
            </ol>
      </nav>

      <!-- Content -->
      <div class="container-flex">
          <h1 class="mb-3">{{$post->title}}</h1>
          <div class="organizer">
            <img src="{{ asset('assets/img/demonzz.jpg') }}" alt="Profile Picture" class="rounded-circle" width="50" height="50">
            <div class="organizer-info">
                <p>{{$post -> penyelenggara_beasiswa}}</p>
                <p style="font-size: small">{{$post->formatted_date}}</p>
            </div>
          </div>

          <!-- Tags -->
          <div class="tags mt-4">
            <p class="me-2">Tags: </p>
            <span style="background-color: #F75600" class="badge me-1 fw-medium">{{$post -> jenis_beasiswa}}</span>
          </div>

          {{-- Paragraph --}}
          <p class="mt-3">{!! nl2br(e($post->deskripsi_beasiswa)) !!}</p>

          {{-- Attachment --}}
          <h5 class="mt-5 mb-3">Attachment</h5>
          <div class="tags mt-2">
            <a href="{{$post -> beasiswa_url}}">
              <button type="button" class="btn btn-custom1 me-2" style="width: 200px">Link Pendaftaran</button>
            </a>
          </div>
          
      </div>
    </section>
      
    
      <!-- JAVASCRIPT -->

    <!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- Magnific Popup core JS file -->
    <script src="/assets/js/jquery-plugin/jquery.magnific-popup.min.js"></script>
    
    <script type="importmap">
    {
      "imports": {
        "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/esm/popper.min.js",
        "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.esm.min.js"
      }
    }
    </script>
    <script type="module">
      import * as bootstrap from 'bootstrap'

      new bootstrap.Popover(document.getElementById('popoverButton'))
    </script>
</body>

</html>
