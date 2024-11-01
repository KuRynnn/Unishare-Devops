@extends('admin.layout.admin-generics')
@section('content')
      
      <div class="ms-5 content">

        {{-- Welcoming Msg --}}
        <div class="row mt-5 ms-5 me-5">
          <div class="col">
            <h2>Welcome, Wzrd.</h2>
            <h2>Make a New Beasiswa Post</h2>
            <h6 class="mt-2 text-secondary fw-normal">Here's whats happening in your account today</h6>
          </div>
        </div>

        <section class="event-form p-5 me-5 ms-5 mt-4">
          <form action="/admin/beasiswa/add" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- ROW 1 --}}
            <div class="row ">
              {{-- JUDUL --}}
              <div class="col">
                <div class="mb-3">
                  <label for="title" class="form-label">Judul Beasiswa</label>
                  <input value="{{old('title')}}" type="text" class="form-control" id="title" name="title" aria-describedby="judulPostHelp" style="border-radius: 20px">
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
                  <label for="penyelenggara_beasiswa" class="form-label">Penyelenggara</label>
                  <input value="{{old('penyelenggara_beasiswa')}}" type="text" class="form-control" id="penyelenggara_beasiswa" name="penyelenggara_beasiswa" aria-describedby="authorHelp" style="border-radius: 20px">
                  @error('penyelenggara_beasiswa')
                    <p class="alert alert-danger shadow-sm mt-2">{{$message}}</p>
                  @enderror
                </div>
              </div>

              {{-- LINK ACARA --}}
              <div class="col">
                <div class="mb-3">
                  <label for="beasiswa_url" class="form-label">Link Pendaftaran</label>
                  <input value="{{old('beasiswa_url')}}" type="text" class="form-control" name="beasiswa_url" id="beasiswa_url" aria-describedby="urlHelp" style="border-radius: 20px">
                  @error('beasiswa_url')
                    <p class="alert alert-danger shadow-sm mt-2">{{$message}}</p>
                  @enderror
                </div>
              </div>
            </div>
  
            {{-- ROW 3 --}}
            <div class="row pt-2">
              {{-- KATEGORI/TAGS --}}
              <div class="col">
                <div class="mb-3">
                  <label for="jenis_beasiswa" class="form-label">Jenis Beasiswa</label>
                  <select class="form-select" name="jenis_beasiswa" aria-label="jenis_beasiswa" style="border-radius: 20px">
                    <option value="Swasta">Swasta</option>
                    <option value="Pemerintah">Pemerintah</option>
                  </select>
                  @error('jenis_beasiswa')
                    <p class="alert alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                </div>
              </div>

              {{-- BANNER ACARA --}}
              <div class="col">
                <div class="mb-3">
                  <label for="beasiswa_img" class="form-label">Banner Acara</label>
                  <input type="file" class="form-control @error('beasiswa_img') is-invalid @enderror" name="beasiswa_img" \ id="beasiswa_img" aria-describedby="urlHelp" style="border-radius: 20px">
                  @error('beasiswa_img')
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
                  <label for="due_date_beasiswa" class="form-label">Batas Waktu Pendaftaran</label>
                  <br>
                  <input type="date" id="due_date_beasiswa" name="due_date_beasiswa">
                  @error('due_date_beasiswa')
                    <p class="alert alert-danger shadow-sm">{{$message}}</p>
                  @enderror
                </div>
              </div>
            </div>

            {{-- ROW 5 --}}
            <div class="row pt-2">
              {{-- CONTENT --}}
              <div class="mb-3">
                <label for="deskripsi_beasiswa" class="form-label">Deskripsi beasiswa</label>
                <textarea class="form-control" id="condeskripsi_beasiswatent" name="deskripsi_beasiswa" rows="3">{{old('deskripsi_beasiswa')}}</textarea>
                @error('deskripsi_beasiswa')
                  <p class="alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
              </div>
            </div>

            <button class="btn btn-primary" type="submit" style="background-color: #f75600; border-color: #f75600">Submit</button>
  
          </form>
        </section>
        
      </div>

  </div>
@endsection