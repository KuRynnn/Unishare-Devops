<nav class="navbar fixed-top navbar-expand-lg bg-light navbar-light border-danger h-21 shadow-sm" data-bs-theme="light">
    <div class="container-fluid" data-bs-theme="light">
        <a class="navbar-brand fs-4 fw-semibold" href="/dashboard" style="color: #121415;">
            <img src="{{asset('assets/img/UniShare-logo.png')}}" alt="Logo" width="45" height="45" class="d-inline-block align-items-center" />
            UniShare
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-end ms-auto">
                <li class="nav-item">
                    <a class="nav-link fs-6" href="/dashboard">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6" href="/karir">Karir</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6" href="/event">Acara</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-6" href="/beasiswa">Beasiswa</a>
                </li>
                <!-- Notifications Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger notification-badge" style="display: none">
                            0
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end notification-dropdown" style="width: 300px; max-height: 400px; overflow-y: auto;">
                        <div class="d-flex justify-content-between align-items-center px-3 py-2 border-bottom">
                            <h6 class="mb-0">Notifications</h6>
                            <button class="btn btn-link btn-sm text-decoration-none mark-all-read">Mark all as read</button>
                        </div>
                        <div class="notifications-list">
                            <!-- Notifications will be loaded here -->
                        </div>
                        <div class="text-center p-2 border-top">
                            <a href="{{ route('notifications.index') }}" class="text-decoration-none">View all notifications</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <img style="border-radius: 50%; max-width: 38px; max-height: 38px;" src="{{ asset('assets/img/demonzz.jpg') }}">
                </li>
                <div class="btn-group">
                    <a class="nav-link dropdown-toggle ms-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->username}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item fs-6" href="/editprof">Profile</a></li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <li><button class="dropdown-item fs-6">Log Out</button></li>
                        </form>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>