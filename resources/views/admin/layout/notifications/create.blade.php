@extends('admin.layout.admin-generics')
@section('content')
<div class="ms-5 content">
    {{-- Welcoming Msg --}}
    <div class="row mt-5 ms-5 me-5">
        <div class="col">
            <h2>Create New Notification</h2>
            <h6 class="mt-2 text-secondary fw-normal">Send notifications to users</h6>
        </div>
    </div>

    <section class="notification-form p-5 me-5 ms-5 mt-4">
        <form action="{{ route('admin.notifications.store') }}" method="POST">
            @csrf
            {{-- Title --}}
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required style="border-radius: 20px">
                        @error('title')
                            <p class="alert alert-danger shadow-sm mt-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Message --}}
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required style="border-radius: 20px"></textarea>
                        @error('message')
                            <p class="alert alert-danger shadow-sm mt-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Type and Target --}}
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" id="type" name="type" required style="border-radius: 20px">
                            <option value="info">Info</option>
                            <option value="warning">Warning</option>
                            <option value="success">Success</option>
                            <option value="error">Error</option>
                        </select>
                        @error('type')
                            <p class="alert alert-danger shadow-sm mt-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="target_user" class="form-label">Send To</label>
                        <select class="form-select" id="target_user" name="target_user" style="border-radius: 20px">
                            <option value="all">All Users</option>
                            <option value="specific">Specific User</option>
                        </select>
                        @error('target_user')
                            <p class="alert alert-danger shadow-sm mt-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- User ID Field (Hidden by default) --}}
            <div class="row">
                <div class="col">
                    <div class="mb-3" id="user_id_field" style="display: none;">
                        <label for="user_id" class="form-label">User ID</label>
                        <input type="number" class="form-control" id="user_id" name="user_id" style="border-radius: 20px">
                        @error('user_id')
                            <p class="alert alert-danger shadow-sm mt-2">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" style="background-color: #f75600; border-color: #f75600">Send Notification</button>
        </form>
    </section>
</div>

<script>
document.getElementById('target_user').addEventListener('change', function() {
    const userIdField = document.getElementById('user_id_field');
    userIdField.style.display = this.value === 'specific' ? 'block' : 'none';
});
</script>
@endsection