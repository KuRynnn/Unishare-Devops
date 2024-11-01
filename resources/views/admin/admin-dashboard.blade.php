@extends('admin.layout.admin-generics')
@section('content')
    <div class="m-5 user-table">
      <table id="example" class="display table">
          <thead>
              <tr>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Tema</th>
                  <th>Last Updated</th>
                  <th>Action</th>
                  
              </tr>
          </thead>

          
          <tbody>
            @foreach ($data as $item)
              <tr>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->kategori }}</td>
                  <td>{{ $item->tema }}</td>
                  <td>{{ $item->updated_at->format('d F Y') }}</td>
                  <td>
                    <a href="/post/{{ $item->post_id }}" class="material-symbols-outlined me-2" href="">edit</a>
                    <a href="/delete/post/{{ $item->post_id }}" class="material-symbols-outlined"  id="delete-icon">delete_forever</a>
                  </td>
              </tr>
            @endforeach
          </tbody>
       
      </table>
    </div>
  </div>
@endsection  