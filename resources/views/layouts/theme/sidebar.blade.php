<nav class="side-nav">
    <a href="{{route('dash')}}" class="intro-x flex items-center pl-5 pt-4">
        <img alt="logo" class="w-6" src="{{asset('dist/images/logo.svg')}}">
        <span class="hidden xl:block text-white text-lg ml-3"> fast<span class="font-medium">Food</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>

    <ul>
        <li>
            <a href="{{route('categories')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="layers"></i> </div>
                <div class="side-menu__title"> CATEGORIAS </div>
            </a>
        </li>
        <div class="side-nav__devider my-6"></div>


        <li>
            <a href="{{route('products')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="coffee"></i> </div>
                <div class="side-menu__title"> PRODUCTOS </div>
            </a>
        </li>
        <div class="side-nav__devider my-6"></div>

        <li>
            <a href="{{route('sales')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="shopping-cart"></i> </div>
                <div class="side-menu__title"> VENTAS </div>
            </a>
        </li>
        <div class="side-nav__devider my-6"></div>

        <li>
            <a href="{{route('customers')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> CLIENTES </div>
            </a>
        </li>
        <div class="side-nav__devider my-6"></div>

        <li>
            <a href="{{route('users')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="key"></i> </div>
                <div class="side-menu__title"> USUARIOS </div>
            </a>
        </li>


        <div class="side-nav__devider my-6"></div>

        <li>
            <a href="{{route('reports')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="calendar"></i> </div>
                <div class="side-menu__title"> REPORTES </div>
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
   
</nav>