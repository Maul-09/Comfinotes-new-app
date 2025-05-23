<div class="sidebar-bendahara">
    <div class="title-side-bendahara">
        <a href="{{ route('dashboard-bendahara') }}"><img src="{{ asset('assets/image/logo-2.png') }}" alt="logo admin" class="logo-bendahara"></a>
    </div>
    <ul class="menu">
        <li class="{{ request()->routeIs('dashboard-bendahara') ? 'active-btn' : '' }}">
            <iconify-icon icon="mage:dashboard-fill"></iconify-icon><a href="{{ route('dashboard-bendahara') }}">Dashboard</a>
        </li>
    </ul>
</div>

