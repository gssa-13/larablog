<!-- Header -->
<header id="header">
    <h1><a href="{{ route('home') }}">Future Imperfect</a></h1>
    <nav class="links">
        <ul>
            <li><a href="{{ route('about') }}" class="{{ setActiveRoute('about') }}">About</a></li>
            <li><a href="{{ route('archive') }}" class="{{ setActiveRoute('archive') }}">Archive</a></li>
            <li><a href="{{ route('contact') }}" class="{{ setActiveRoute('contact') }}">Contact</a></li>
        </ul>
    </nav>
    <nav class="main">
        <ul>
            <li class="search">
                <a class="fa-search" href="#search">Search</a>
                <form id="search" method="get" action="#">
                    <input type="text" name="query" placeholder="Search" />
                </form>
            </li>
            <li class="menu">
                <a class="fa-bars" href="#menu">Menu</a>
            </li>
        </ul>
    </nav>
</header>
