<!-- SIDEBAR -->
<div class="sidebar">
  <div class="container-flex header-logo p-0">
    <img src="{{ asset('/assets/img/UniShare-logo.png') }}" alt="" style="height: 36px; ">
    <h4 style="color: #F6F7FF" class="ms-2 mt-2">UniShare</h4>
  </div>

  <div class="dashboard">
    <a href="{{ route('admin') }}">
      <button type="button" class="btn-dashboard">Dashboard</button>
    </a>

  </div>

  <div class="">
    {{-- MENU 1: USER DETAILS --}}
    <div class="menu">
      <aside></aside>
      <h6>User Info & Details</h6>
    </div> <br>

    {{-- SUB-MENU 1: VIEW USER INFO --}}
    <div class="btn-group submenu ms-4 ps-2 mt-3 mb-3">
      <span class="material-symbols-outlined"> group </span>
      <a href="{{ route('view-users') }}" onmouseover="this.style.color='#f75600'"
        onmouseout="this.style.color='#7c7974'">View User Info
      </a>
    </div>

    {{-- SUB-MENU 2: DOWNLOAD USER INFO --}}
    <div class="btn-group submenu ms-4 ps-2">
      <span class="material-symbols-outlined"> file_save </span>
      <form action="{{ route('download-user') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-link" style="text-decoration: none; color: #7c7974"
          onmouseover="this.style.color='#f75600'" onmouseout="this.style.color='#7c7974'">
          Download User Info
        </button>
      </form>
    </div>

    {{-- MENU 2: CREATE NEW POST --}}
    <div class="menu">
      <aside></aside>
      <h6>Create New Post</h6>
    </div> <br>

    {{-- SUB-MENU 1: KARIR --}}
    <div class="btn-group submenu ms-4 ps-2 mt-2 mb-3">
      <span class="material-symbols-outlined"> work </span>
      <a href="{{ route('show-karir-posts') }}" onmouseover="this.style.color='#f75600'"
        onmouseout="this.style.color='#7c7974'">View Career Posts
      </a>
    </div>

    {{-- SUB-MENU 2: ACARA --}}
    <div class="btn-group submenu ms-4 ps-2 mb-3">
      <span class="material-symbols-outlined"> theater_comedy </span>
      <a href="{{ route('create-event') }}" onmouseover="this.style.color='#f75600'"
        onmouseout="this.style.color='#7c7974'">Create New Event
      </a>
    </div>

    {{-- SUB-MENU 3: BEASISWA --}}
    <div class="btn-group submenu ms-4 ps-2 mb-2">
      <span class="material-symbols-outlined"> school </span>
      <a href="{{ route('create-beasiswa') }}" onmouseover="this.style.color='#f75600'"
        onmouseout="this.style.color='#7c7974'">Create New Beasiswa
      </a>
    </div>

    {{-- MENU 3: SETTINGS --}}
    <div class="menu">
      <aside></aside>
      <h6>Settings</h6>
    </div> <br>

    {{-- SUB-MENU 1: MY PROFILE --}}
    <div class="btn-group submenu ms-4 ps-2 mt-3">
      <span class="material-symbols-outlined"> settings </span>
      <a href="" onmouseover="this.style.color='#f75600'" onmouseout="this.style.color='#7c7974'">My Profile
      </a>
    </div>

    {{-- SUB-MENU 2: HISTORY --}}
    <div class="btn-group submenu ms-4 ps-2 mt-3 mb-5">
      <span class="material-symbols-outlined"> history </span>
      <a href="" onmouseover="this.style.color='#f75600'" onmouseout="this.style.color='#7c7974'">History
      </a>
    </div>
    <br>

    {{-- MENU 4: Notifications --}}
    <div class="menu">
      <aside></aside>
      <h6>Notifications</h6>
    </div> <br>

    <div class="btn-group submenu ms-4 ps-2 mt-3 mb-3">
      <span class="material-symbols-outlined">notifications</span>
      
    </div>

    <div class="btn-group submenu ms-4 ps-2 mb-3">
      <span class="material-symbols-outlined">notification_add</span>
      
    </div>

    <a class="logout" href="">
      <button class="btn-logout mt-5">
        <span class="material-symbols-outlined"> logout</span>Log Out</button>
    </a>

  </div>


</div>