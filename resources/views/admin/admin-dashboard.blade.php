@extends('admin.layout.admin-generics')
@section('content')
    <div class="m-5 user-table">
      <h1>Data Event</h1>
      <table id="" class="display table">
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
            @foreach ($dataPost as $item)
              <tr>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->kategori }}</td>
                  <td>{{ $item->tema }}</td>
                  <td>{{ $item->updated_at->format('d F Y') }}</td>
                  <td>
                    <a href="/post/{{ $item->post_id }}" class="material-symbols-outlined me-2" href="">edit</a>
                    <a href="/delete/post/{{ $item->post_id }}" 
                       class="material-symbols-outlined"  
                       id="delete-icon" 
                       onclick="return confirm('Are you sure you want to delete this post?');">delete_forever</a>
                  </td>
              </tr>
            @endforeach
          </tbody>
       
      </table>
      
      <!-- <h1>Data Karir</h1>
      <table id="" class="display table">
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
            @foreach ($dataKarirPost as $item)
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
       
      </table> -->
      <h1>Data Beasiswa</h1>
      <table id="" class="display table">
          <thead>
              <tr>
                  <th>Judul</th>
                  <th>Jenis Beasiswa</th>
                  <th>Penyelenggara</th>
                  <th>Last Updated</th>
                  <th>Action</th>
                  
              </tr>
          </thead>

          
          <tbody>
            @foreach ($dataBeasiswa as $item)
              <tr>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->jenis_beasiswa }}</td>
                  <td>{{ $item->penyelenggara_beasiswa }}</td>
                  <td>{{ $item->updated_at->format('d F Y') }}</td>
                  <td>
                      <a href="{{ route('edit-beasiswa', $item->id) }}" class="material-symbols-outlined me-2">edit</a>
                      <a href="{{ route('delete-beasiswa', $item->id) }}" class="material-symbols-outlined" id="delete-icon" onclick="return confirm('Are you sure you want to delete this scholarship post?');">delete_forever</a>
                  </td>
              </tr>
            @endforeach
          </tbody>
       
      </table>
    </div>
  </div>
@endsection  