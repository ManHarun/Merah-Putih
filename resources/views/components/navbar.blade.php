
<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">MerahPutih</span>
      </a>
      @auth
      <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-3 sm:hidden">
        <form action="/logout" method="POST">
          @csrf
          <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Logout</button>
        </form>
        <p class="text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-4 py-2 text-center">{{ auth()->user()->name }}</p>
      </div>
      @else
      <a href="/login" class="sm:hidden  lg:block flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</a>
      @endauth
      <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse lg:hidden">
        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
        </button>
      </div>
      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
        <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="/" class="{{ request()->is('/') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500' : 'nav-menu'}}">Home</a>
          </li>
          <li>
            @php
              $currentPage = Request::path();
            @endphp
            @if ($currentPage == '/')
              <a href="#profil" onclick="scrollToProfil()" class="nav-menu">Profil</a>
            @else
              <a href="{{ url('/') }}#profil" class="nav-menu">Profil</a>
            @endif
          </li>
          <li>
            <a href="/jadwal" class="{{ request()->is('jadwal') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500' : 'nav-menu'}}">Jadwal</a>
          </li>
          @auth
          <li>
            <a href="/registration" class="{{ request()->is('registration') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500' : 'nav-menu'}}">Registration</a>
          </li>
          <li>
            <form action="/logout" method="POST">
              @csrf
              <button type="submit" class="text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:hover:bg-blue-700 dark:focus:ring-blue-800">Logout</button>
            </form>
          </li>
          @else
          <li class="lg:hidden">
            <a href="/login" class="{{ request()->is('login') ? 'text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500' : 'nav-menu'}}">Login</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
  <script>
    function scrollToProfil() {
      event.preventDefault(); // prevent default link behavior
      var profilSection = document.getElementById('profil');
      profilSection.scrollIntoView({
        behavior: 'smooth'
      });
    }
  </script>
  