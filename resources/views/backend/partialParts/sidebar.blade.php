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
                     <li @if (\Route::current()->getName() == 'category.create' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('category.create') }}">
                            <i class="fa fas fa-list"></i> 
                            <span>Categories</span>
                        </a>
                    </li>
                     <li @if (\Route::current()->getName() == 'subcategory.create' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('subcategory.create') }}">
                            <i class="fa fas fa-th-list"></i> 
                            <span>Sub Categories</span>
                        </a>
                    </li>
                     <li @if (\Route::current()->getName() == 'favorites' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('favorites') }}">
                            <i class="fa fas fa-image"></i> 
                            <span>Post</span>
                        </a>
                    </li>
                     <li @if (\Route::current()->getName() == 'tag.create' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('tag.create') }}">
                            <i class="fa fas fa-tags"></i> 
                            <span>Tags</span>
                        </a>
                    </li>
                     <li @if (\Route::current()->getName() == 'fornecedor.create' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('fornecedor.create') }}">
                            <i class="fa fas fa-car-side"></i> 
                            <span>Fornecedores</span>
                        </a>
                    </li>
                     <li @if (\Route::current()->getName() == 'favorites' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('favorites') }}">
                            <i class="fa fas fa-users"></i> 
                            <span>Users</span>
                        </a>
                    </li>
                     <li @if (\Route::current()->getName() == 'payment.create' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('payment.create') }}">
                            <i class="fa fas fa-money-bill"></i> 
                            <span>Payments</span>
                        </a>
                    </li>
                     <li @if (\Route::current()->getName() == 'status.create' )
                           class = " {{ __('active') }}"
                        @endif>
                        <a class="nav-link" href="{{ route('status.create') }}">
                            <i class="fa fas fa-check-circle"></i> 
                            <span>Status</span>
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