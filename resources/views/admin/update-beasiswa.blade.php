@extends('admin.layout.admin-generics')
@section('content')
<div class="m-5 user-table">
    <h1>Update Beasiswa</h1>
    <form action="{{ route('update-beasiswa', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Judul:</label>
            <input type="text" name="title" class="form-control" value="{{ $data->title }}">
        </div>
        <div class="form-group">
            <label for="jenis_beasiswa">Jenis Beasiswa:</label>
            <input type="text" name="jenis_beasiswa" class="form-control" value="{{ $data->jenis_beasiswa }}">
        </div>
        <div class="form-group">
            <label for="penyelenggara_beasiswa">Penyelenggara:</label>
            <input type="text" name="penyelenggara_beasiswa" class="form-control" value="{{ $data->penyelenggara_beasiswa }}">
        </div>
        <div class="form-group">
            <label for="due_date_beasiswa">Due Date:</label>
            <input type="date" name="due_date_beasiswa" class="form-control" value="{{ $data->due_date_beasiswa }}">
        </div>
        <div class="form-group">
            <label for="deskripsi_beasiswa">Deskripsi:</label>
            <textarea name="deskripsi_beasiswa" class="form-control">{{ $data->deskripsi_beasiswa }}</textarea>
        </div>
        <div class="form-group">
            <label for="beasiswa_url">URL Beasiswa:</label>
            <input name="beasiswa_url" class="form-control" value="{{ $data->beasiswa_url }}">
        </div>
        <div class="form-group">
            <label for="beasiswa_img">Gambar (Opsional):</label>
            <input type="file" name="beasiswa_img" class="form-control">
        </div>
        <button class="btn btn-primary mt-5 " type="submit" style="background-color: #f75600; border-color: #f75600">Update Beasiswa</button>
    </form>
</div>
@endsection