<aside class="side-nav">
<div class="logo">
    <img src="{{asset('img/logo.svg')}}" alt="">
    ADMINPANEL
</div>
<ul>
    <li><a href="">Dashboard</a></li>
    <li><a href="">Products</a></li>
    <li><a href="">Categories</a></li>
    <li><a href="">Colors</a></li>
    <li><a href="">Orders</a></li>
</ul>

<div class="logout">
    <form action="{{route('logout')}}" method="POST">
        @csrf
        <button type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10zm5-6l5-4l-5-4v3H9v2h8v3z"/></svg>
            &nbsp; Logout
        </button>
    </form>
</div>
</aside>
