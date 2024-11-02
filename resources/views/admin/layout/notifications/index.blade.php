@extends('admin.layout.admin-generics')
@section('content')
<div class="ms-5 content">
    {{-- Welcoming Msg --}}
    <div class="row mt-5 ms-5 me-5">
        <div class="col">
            <h2>Manage Notifications</h2>
            <h6 class="mt-2 text-secondary fw-normal">View and manage all system notifications</h6>
        </div>
        <div class="col">
            <a href="{{ route('admin.notifications.create') }}" class="btn btn-primary" style="background-color: #f75600; border-color: #f75600">Create New Notification</a>
        </div>
    </div>

    <div class="m-5 notification-table">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table id="example" class="display table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Type</th>
                    <th>Target</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notifications as $notification)
                <tr>
                    <td>{{ $notification->title }}</td>
                    <td>{{ Str::limit($notification->message, 50) }}</td>
                    <td>
                        <span class="badge bg-{{ $notification->type === 'error' ? 'danger' : $notification->type }}">
                            {{ ucfirst($notification->type) }}
                        </span>
                    </td>
                    <td>{{ $notification->is_global ? 'All Users' : 'User #' . $notification->user_id }}</td>
                    <td>{{ $notification->created_at->format('d F Y') }}</td>
                    <td>
                        <form action="{{ route('admin.notifications.destroy', $notification->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="material-symbols-outlined" style="border: none; background: none;" onclick="return confirm('Are you sure you want to delete this notification?')">
                                delete_forever
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $notifications->links() }}
        </div>
    </div>
</div>
@endsection