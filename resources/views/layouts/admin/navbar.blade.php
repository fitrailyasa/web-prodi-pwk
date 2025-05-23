<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            @if (auth()->user()->role == 'admin')
                <a href="{{ route('profile.edit') }}" class="nav-link d-flex align-items-center">
                @elseif (auth()->user()->role == 'dosen')
                    <a href="{{ route('dosen.profile.index') }}" class="nav-link d-flex align-items-center">
            @endif
            <div class="d-none d-lg-block text-white mr-2">{{ auth()->user()->name }}</div>
            @if (Auth::user()->foto_user != null)
                <img src="{{ asset('assets/profile/' . Auth::user()->foto_user) }}" class="img-circle elevation-2"
                    alt="User Image"
                    style="width: 35px; height: 35px; object-fit: cover; object-position: center; border-radius: 50%;">
            @else
                <img src="{{ asset('assets/profile/default.png') }}" class="img-circle elevation-2" alt="User Image"
                    style="width: 35px; height: 35px; object-fit: cover; object-position: center; border-radius: 50%;">
            @endif
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
