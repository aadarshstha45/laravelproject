@include('frontend.includes.navbar')
<a href="/dashboard" class="nav-link" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
    <i class="nav-icon fas fa-sign-out-alt"></i>
    <p>
        Logout
    </p>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
</form>
