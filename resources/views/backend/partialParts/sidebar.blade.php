<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">{{ config('app.name','Fenn\'s Look') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">F'L</a>
        </div>
        
        @switch(Auth::user()->role->level)
            @case(1)
               <ul class="sidebar-menu"> 
                    <li class="menu-header">Dashboard</li>
                    <li class="
                        @if (\Route::current()->getName() ==  'home' )
                            {{ __('active') }}
                        @endif
                    ">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fa fas fa-th-large"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li @if (\Route::current()->getName() == 'buylogs' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('buylogs') }}">
                            <i class="fa fas fa-shopping-bag"></i> 
                            <span>Registo de Compras</span>
                        </a>
                    </li>
                    <li @if (\Route::current()->getName() == 'favorites' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('favorites') }}">
                            <i class="fa fas fa-heart"></i> 
                            <span>Favoritos</span>
                        </a>
                    </li>
                </ul> 
                @break
            @case(2)
                <ul class="sidebar-menu"> 
                    <li class="menu-header">Dashboard</li>
                    <li class="
                        @if (\Route::current()->getName() ==  'home' )
                            {{ __('active') }}
                        @endif
                    ">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fa fas fa-th-large"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li @if (\Route::current()->getName() == 'buylogs' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('buylogs') }}">
                            <i class="fa fas fa-shopping-bag"></i> 
                            <span>Registo de Compras</span>
                        </a>
                    </li>
                    <li @if (\Route::current()->getName() == 'favorites' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('favorites') }}">
                            <i class="fa fas fa-heart"></i> 
                            <span>Favoritos</span>
                        </a>
                    </li>
                </ul> 
                @break
            @case(3)
               <ul class="sidebar-menu"> 
                    <li class="menu-header">Dashboard</li>
                    <li class="
                        @if (\Route::current()->getName() ==  'home' )
                            {{ __('active') }}
                        @endif
                    ">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fa fas fa-th-large"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li @if (\Route::current()->getName() == 'buylogs' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('buylogs') }}">
                            <i class="fa fas fa-shopping-bag"></i> 
                            <span>Registo de Compras</span>
                        </a>
                    </li>
                    <li @if (\Route::current()->getName() == 'favorites' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('favorites') }}">
                            <i class="fa fas fa-heart"></i> 
                            <span>Favoritos</span>
                        </a>
                    </li>
                </ul> 
                @break
            @case(4)
               <ul class="sidebar-menu"> 
                    <li class="menu-header">Dashboard</li>
                    <li class="
                        @if (\Route::current()->getName() ==  'home' )
                            {{ __('active') }}
                        @endif
                    ">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fa fas fa-th-large"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li @if (\Route::current()->getName() == 'buylogs' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('buylogs') }}">
                            <i class="fa fas fa-shopping-bag"></i> 
                            <span>Registo de Compras</span>
                        </a>
                    </li>
                    <li @if (\Route::current()->getName() == 'favorites' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('favorites') }}">
                            <i class="fa fas fa-heart"></i> 
                            <span>Favoritos</span>
                        </a>
                    </li>
                </ul> 
                @break
            @case(5)
                <ul class="sidebar-menu"> 
                    <li class="menu-header">Dashboard</li>
                    <li class="
                        @if (\Route::current()->getName() ==  'home' )
                            {{ __('active') }}
                        @endif
                    ">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fa fas fa-th-large"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li @if (\Route::current()->getName() == 'buylogs' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('buylogs') }}">
                            <i class="fa fas fa-shopping-bag"></i> 
                            <span>Registo de Compras</span>
                        </a>
                    </li>
                    <li @if (\Route::current()->getName() == 'favorites' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('favorites') }}">
                            <i class="fa fas fa-heart"></i> 
                            <span>Favoritos</span>
                        </a>
                    </li>
                </ul> 
                @break
            @case(6)
               <ul class="sidebar-menu"> 
                    <li class="menu-header">Dashboard</li>
                    <li class="
                        @if (\Route::current()->getName() ==  'home' )
                            {{ __('active') }}
                        @endif
                    ">
                        <a class="nav-link" href="{{ route('home') }}">
                            <i class="fa fas fa-th-large"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li @if (\Route::current()->getName() == 'buylogs' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('buylogs') }}">
                            <i class="fa fas fa-shopping-bag"></i> 
                            <span>Registo de Compras</span>
                        </a>
                    </li>
                    <li @if (\Route::current()->getName() == 'favorites' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('favorites') }}">
                            <i class="fa fas fa-heart"></i> 
                            <span>Favoritos</span>
                        </a>
                    </li>
                </ul> 
                @break
        @endswitch
    </aside>
</div>