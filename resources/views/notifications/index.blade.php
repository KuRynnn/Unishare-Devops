@extends('layouts.generics')
@section('navbar')
@include('layouts.parts.navbar')
@endsection

@section('content')
<div class="container" style="margin-top: 100px;"> <!-- Add margin-top here -->
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Your Notifications</h2>
                @if(!$notifications->isEmpty())
                    <form action="{{ route('notifications.markAllRead') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">Mark All as Read</button>
                    </form>
                @endif
            </div>

            @if($notifications->isEmpty())
                <div class="alert alert-info">
                    You have no notifications.
                </div>
            @else
                    <div class="list-group">
                        @foreach($notifications as $notification)
                                    @php
                                        $userNotification = $notification->userNotifications->first();
                                        $isRead = $userNotification ? !is_null($userNotification->read_at) : false;
                                    @endphp
                                    <div class="list-group-item {{ !$isRead ? 'list-group-item-primary' : '' }}">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">{{ $notification->title }}</h5>
                                            <small>{{ $notification->created_at->diffForHumans() }}</small>
                                        </div>
                                        <p class="mb-1">{{ $notification->message }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span class="badge bg-{{ $notification->type }}">{{ $notification->type }}</span>
                                                <small
                                                    class="ms-2 text-muted">{{ $notification->is_global ? 'All Users' : 'Personal' }}</small>
                                            </div>
                                            @if(!$isRead)
                                                <form action="{{ route('notifications.markRead', $notification->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success">Mark as Read</button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                        @endforeach
                    </div>

                    <div class="mt-3">
                        {{ $notifications->links() }}
                    </div>
            @endif
        </div>
    </div>
</div>
@endsection