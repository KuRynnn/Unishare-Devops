@extends('admin.layout.admin-generics')
@section('content')
      <div class="ms-5 content">
        <h1 class="mt-4 mb-5 text-center"> CRUD TABLE </h1>
        <div class="container table-users">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Alamat</th>
                <th scope="col">Universitas</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>

              @foreach ($data as $item)
                <tr>
                  <th scope="row">{{ $item->id }}</th>
                  <td>{{ $item->nama_lengkap }}</td>
                  <td>{{ $item->username }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->alamat }}</td>
                  <td>{{ $item->universitas }}</td>
                  
                  <td> 
                    <a href="/user/{{$item->id}}" class="material-symbols-outlined me-2" href="">edit</a>
                    <a href="/delete/user/{{$item->id}}" class="material-symbols-outlined"  id="delete-icon">delete_forever</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>
@endsection