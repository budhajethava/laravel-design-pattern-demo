<div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
       <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{route('dashboard')}}">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('category') || Request::is('category/*')) ? 'active' : '' }}" href="{{route('category.list')}}">Repository Pattern</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('strategy') ? 'active' : '' }}" href="{{route('strategy.pattern')}}">Strategy Pattern</a>
      </li>
       <li class="nav-item">
        <a class="nav-link {{ Request::is('adapter') ? 'active' : '' }}" href="{{route('adapter.pattern')}}">Adapter Pattern</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('factory') ? 'active' : '' }}" href="{{route('factory.pattern')}}">Factory Pattern</a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('singleton') ? 'active' : '' }}" href="{{route('singleton.pattern')}}">Singleton Pattern</a>
      </li>
       </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('observer') ? 'active' : '' }}" href="{{route('observer.pattern')}}">Observer Pattern</a>
      </li>
    </ul>
    @auth
    <div class="dropdown float-right">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
            {{auth()->user()->name ?? ''}}
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{route('profile.edit')}}">Profile</a>
            <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault();$('#logoutForm').submit();">
                    {{ __('Log Out') }}
                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>                
            </a>
        </div>
    </div>
    @else
    <a href="{{ route('login') }}">Log in</a>
    @endif
  </div>