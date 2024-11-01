@extends('admin.layout.admin-generics')
@section('content')
      <div class="ms-5 mb-5 content">

        {{-- Welcoming Msg --}}
        <div class="row mt-5 ms-5 me-5">
          <h2>Update Post</h2>
          <h6 class="text-secondary fw-normal">Change and update your posts as you wish!</h6>
        </div>

        <section class="event-form p-5 me-5 ms-5 mt-4">
          <form action="/update/post/{{ $data->post_id }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- ROW 1 --}}
            <div class="row ">
              {{-- JUDUL --}}
              <div class="col">
                <div class="mb-3">
                  <label for="title" class="form-label">Judul</label>
                  <input value="{{ $data->title }}" type="text" class="form-control" id="title" name="title" aria-describedby="judulPostHelp" style="border-radius: 20px">
                  @error('title')
                    <p class="alert alert-danger shadow-sm mt-2">{{$message}}</p>
                  @enderror
                </div>
              </div>
            </div>

            {{-- ROW 2 --}}
            <div class="row">
              {{-- PENYELENGGARA --}}
              <div class="col">
                <div class="mb-3">
                  <label for="author" class="form-label">Penyelenggara</label>
                  <input value="{{ $data->author }}" type="text" class="form-control" id="author" name="author" aria-describedby="authorHelp" style="border-radius: 20px">
                  @error('author')
                    <p class="alert alert-danger shadow-sm mt-2">{{$message}}</p>
                  @enderror
                </div>
              </div>

              {{-- LINK ACARA --}}
              <div class="col">
                <div class="mb-3">
                  <label for="url_event" class="form-label">Link Acara</label>
                  <input value="{{ $data->url_event }}" type="text" class="form-control" name="url_event" id="url_event" aria-describedby="urlHelp" style="border-radius: 20px">
                  @error('url_event')
                    <p class="alert alert-danger shadow-sm mt-2">{{$message}}</p>
                  @enderror
                </div>
              </div>
            </div>
  
            {{-- ROW 3 --}}
            <div class="row pt-2">
              {{-- TEMA ACARA --}}
              <div class="col">
                <div class="mb-3">
                  <label for="tema" class="form-label">Tema</label>
                  <select class="form-select" name="tema" aria-label="tema" style="border-radius: 20px">
                    <option value="Teknologi">Teknologi</option>
                    <option value="Sains">Sains</option>
                    <option value="Bisnis">Bisnis</option>
                    <option value="Desain">Desain</option>
                    <option value="Fotografi">Fotografi</option>
                    <option value="Manajemen">Manajemen</option>
                  </select>
                  @error('tema')
                    <p class="alert alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                </div>
              </div>
  
              {{-- KATEGORI/TAGS --}}
              <div class="col">
                <div class="mb-3">
                  <label for="kategori" class="form-label">Kategori</label>
                  <select class="form-select" name="kategori" aria-label="kategori" style="border-radius: 20px">
                    <option value="Kompetisi">Kompetisi</option>
                    <option value="Workshop">Workshop</option>
                    <option value="Seminar">Seminar</option>
                  </select>
                  @error('kategori')
                    <p class="alert alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                </div>
              </div>
            </div>
  
            {{-- ROW 4 (Optional Fields) --}}
            <div class="row pt-2">
              {{-- GUIDEBOOK --}}
              <div class="col">
                <div class="mb-3">
                  <label for="guidebook" class="form-label">Guidebook</label>
                  <input type="file" class="form-control @error('guidebook') is-invalid @enderror" id="guidebook" name="guidebook" aria-describedby="guidebookHelp" style="border-radius: 20px">
                  @error('guidebook')
                    <p class="alert alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                </div>
              </div>

              {{-- BANNER ACARA --}}
              <div class="col">
                <div class="mb-3">
                  <label for="banner_img" class="form-label">Banner Acara</label>
                  <input type="file" class="form-control @error('banner_img') is-invalid @enderror" name="banner_img" \ id="banner_img" aria-describedby="urlHelp" style="border-radius: 20px">
                  @error('banner_img')
                    <p class="alert alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                </div>
              </div>
            </div>

            {{-- ROW 5 --}}
            <div class="row pt-2">
              {{-- CONTENT --}}
              <div class="mb-3">
                <label for="content" class="form-label">Example textarea</label>
                <textarea class="form-control" id="content" name="content" rows="3">{{ $data->content }}</textarea>
                @error('content')
                  <p class="alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
              </div>
            </div>

            <button class="btn btn-primary" type="submit" style="background-color: #f75600; border-color: #f75600">Update</button>
  
          </form>
        </section>
        
      </div>

  </div>
@endsection