<!--Navbar-->
<nav x-data="{ open: false }" class="shadow-md bg-base-100">
  <!--Desktop menu-->
  <nav class="navbar">
    <div class="container mx-auto px-6 md:px-3">
      <div class="flex-none">
        <a href="/" class="btn btn-ghost">
          <img class="h-8 w-auto" width="196" height="60" src="/assets/images/core/logo.svg" alt="Portfolio logo">
        </a>
      </div> 
      <div class="flex-1 px-2 mx-2">
        <div class="items-stretch hidden lg:flex">
          <x-nav-link href="/" :active="Request::is('/')">
            {{ __('Home') }}
          </x-nav-link>
          <x-nav-link href="/projects" :active="Request::is('projects')">
            {{ __('Projects') }}
          </x-nav-link>
          <x-nav-link href="/contact" :active="Request::is('contact')">
            {{ __('Contact') }}
          </x-nav-link>

          <x-nav-link href="/contact" :active="Request::is('contact')">
            {{ __('Contact again') }}
          </x-nav-link>
        </div>
      </div> 
      <div class="flex-none">

        @if (Auth::check())
          <!--Desktop dropdown--->
          <div class="dropdown dropdown-end hidden lg:block">
            <!--Trigger-->
            <div tabindex="0" class="btn btn-link">
                <span>{{ Auth::user()->name }}</span>
                <svg class="fill-current h-4 w-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div> 

            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
              <li>
                <a href="/dashboard">Dashboard</a>
              </li>
              <li>
                <a href="{{route("user.account")}}">Account</a>
              </li> 
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                  <li>
                    <a onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                  </li> 
              </form>
            </ul>
          </div>          
        @endif

        <!--Hamburger-->
        <button  @click="open = ! open" aria-label="Toggle menu button" class="lg:hidden btn btn-square btn-ghost hover:bg-gray-100 hover:text-gray-500 drawer-button" for="my-drawer">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div> 
    </div>
  </nav>
  <!-- Responsive Navigation Menu -->
  <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden w-full">
    <ul class="menu p-4 overflow-y-auto">
      <x-responsive-nav-link href="/" :active="Request::is('/')">
        {{ __('Home') }}
      </x-responsive-nav-link>
      <x-responsive-nav-link href="/projects" :active="Request::is('projects')">
        {{ __('Projects') }}
      </x-responsive-nav-link>
      <x-responsive-nav-link href="/contact" :active="Request::is('contact')">
        {{ __('Contact') }}
      </x-responsive-nav-link>
    </ul>

    @if (Auth::check())
      <!--User info-->
      <div class="pt-4 pb-1 border-t border-gray-200">
        <div class="flex items-center px-4">
          <div class="flex-shrink-0">
            <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>
          <div class="ml-3">
            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
          </div>
        </div> 
      </div>

      <ul class="menu p-4 overflow-y-auto">
        <!--Dashboard link-->
        <x-responsive-nav-link href="/dashboard" :active="Request::is('dashboard')">
          {{ __('Dashboard') }}
        </x-responsive-nav-link>
        <!--Logout link-->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Log out') }}
          </x-responsive-nav-link>
        </form>
      </ul>
    @endif
  </div>
</nav>

