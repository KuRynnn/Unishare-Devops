@extends('admin.layout.admin-generics')
@section('content')
    <!-- INPUT FORMS -->
    <div class="col-9 mx-auto mt-5 content">
      <h2 class="text-center mb-3">Update User</h2>
      <form action="/update/user/{{$data->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama_lengkap" class="form-label text-secondary">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $data->nama_lengkap }}">
        </div>
        <div class="mb-3">
            <label for="username" class="form-label text-secondary">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $data->username }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label text-secondary">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label text-secondary">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}">
        </div>
        <div class="mb-3">
            <label for="universitas" class="form-label text-secondary">Universitas</label>
            <input type="text" class="form-control" id="universitas" name="universitas" value="{{ $data->universitas }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    
  </div>
@endsection