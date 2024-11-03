@extends('admin.layout.admin-generics')
@section('content')
<div class="m-5 user-table">
    <div class="row mt-3 mb-3">
        <div class="col">
            <h2>Career Posts</h2>
            <p class="text-secondary">Manage all career posts here</p>
        </div>
        <div class="col text-end">
            <a href="{{ route('create-karir') }}" class="btn btn-primary"
                style="background-color: #f75600; border-color: #f75600">
                <span class="material-symbols-outlined align-middle me-2">add</span>
                Create New Career Post
            </a>
        </div>
    </div>

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
                        <a href="/karir-post/{{ $item->karir_post_id }}" class="material-symbols-outlined me-2">edit</a>
                        <a href="/delete/karir-post/{{ $item->karir_post_id }}" class="material-symbols-outlined"
                            id="delete-icon">delete_forever</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection