<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="logo" class="w-6" src="{{asset('dist/images/logo.svg')}}">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>

    <ul class="border-t border-theme-29 py-5 hidden">
            <li>
                <a href="{{route('categories')}}" class="menu">
                    <div class="menu__icon"> <i data-feather="layers"></i> </div>
                    <div class="menu__title"> CATEGORIAS </div>
                </a>
            </li>
            <div class="side-nav__devider my-6"></div>
    
    
            <li>
                <a href="{{route('products')}}" class="menu">
                    <div class="menu__icon"> <i data-feather="coffee"></i> </div>
                    <div class="menu__title"> PRODUCTOS </div>
                </a>
            </li>
            <div class="side-nav__devider my-6"></div>
    
            <li>
                <a href="{{route('sales')}}" class="menu">
                    <div class="menu__icon"> <i data-feather="shopping-cart"></i> </div>
                    <div class="menu__title"> VENTAS </div>
                </a>
            </li>
            <div class="side-nav__devider my-6"></div>
    
            <li>
                <a href="{{route('customers')}}" class="menu">
                    <div class="menu__icon"> <i data-feather="users"></i> </div>
                    <div class="menu__title"> CLIENTES </div>
                </a>
            </li>
            <div class="side-nav__devider my-6"></div>
    
            <li>
                <a href="{{route('users')}}" class="menu">
                    <div class="menu__icon"> <i data-feather="key"></i> </div>
                    <div class="menu__title"> USUARIOS </div>
                </a>
            </li>
    
    
            <div class="side-nav__devider my-6"></div>
    
            <li>
                <a href="{{route('reports')}}" class="menu">
                    <div class="menu__icon"> <i data-feather="calendar"></i> </div>
                    <div class="menu__title"> REPORTES </div>
                </a>
            </li>

            <div class="side-nav__devider my-6"></div>

        <li>
            <a href="{{route('settings')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="settings"></i> </div>
                <div class="side-menu__title"> SETTINGS </div>
            </a>
        </li>
    
        </ul>

    
</div>