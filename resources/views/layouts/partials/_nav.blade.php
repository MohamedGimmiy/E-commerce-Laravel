<nav class="menu">
    <img src="{{asset('img/logo.svg')}}" alt="" class="logo">
    <ul>
        <li><a href="{{route('home')}}">
            <svg  width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 1024"><path fill="currentColor" d="M946.5 505L534.6 93.4a31.93 31.93 0 0 0-45.2 0L77.5 505c-12 12-18.8 28.3-18.8 45.3c0 35.3 28.7 64 64 64h43.4V908c0 17.7 14.3 32 32 32H448V716h112v224h265.9c17.7 0 32-14.3 32-32V614.3h43.4c17 0 33.3-6.7 45.3-18.8c24.9-25 24.9-65.5-.1-90.5z"/></svg>
            </a>
        </li>
        <li><a href="{{route('wishlist')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M21 4H3a1 1 0 0 0-1 1v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5a1 1 0 0 0-1-1zm-9 9c-3.309 0-6-2.691-6-6h2c0 2.206 1.794 4 4 4s4-1.794 4-4h2c0 3.309-2.691 6-6 6z"/></svg>
            </a>
        </li>
        <li><a href="{{route('cart')}}">
            <span class="info-count">3</span>
            <svg  width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path fill="currentColor" d="M21.822 7.431A1 1 0 0 0 21 7H7.333L6.179 4.23A1.994 1.994 0 0 0 4.333 3H2v2h2.333l4.744 11.385A1 1 0 0 0 10 17h8c.417 0 .79-.259.937-.648l3-8a1 1 0 0 0-.115-.921z"/><circle cx="10.5" cy="19.5" r="1.5" fill="currentColor"/><circle cx="17.5" cy="19.5" r="1.5" fill="currentColor"/></svg>
            </a>
        </li>
        <li><a href="{{route('account')}}">
            <svg  width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path d="M0 0h24v24H0z"/><path fill="currentColor" d="M15 14a5 5 0 0 1 4.995 4.783L20 19v1a2 2 0 0 1-1.85 1.995L18 22H4a2 2 0 0 1-1.995-1.85L2 20v-1a5 5 0 0 1 4.783-4.995L7 14h8Zm6-1a1 1 0 1 1 0 2h-1a1 1 0 1 1 0-2h1ZM11 2a5 5 0 1 1 0 10a5 5 0 0 1 0-10Zm10 8a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2h2Zm0-3a1 1 0 0 1 .117 1.993L21 9h-3a1 1 0 0 1-.117-1.993L18 7h3Z"/></g></svg>
            </a>
        </li>
    </ul>
</nav>
