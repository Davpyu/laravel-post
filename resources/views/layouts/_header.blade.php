<header class="fixed w-full flex flex-wrap items-center top-0 bg-teal-500 p-4">
    <div class="flex items-center flex-shrink-0 text-white justify-start w-1/2 lg:w-1/4">
        <a href="{{ route('post.index') }}" class="text-xl tracking-wide no-underline">Laravel Post</a>
    </div>
    <div class="flex w-1/2 justify-end {{ !Auth::check() ? 'sm:hidden' : 'lg:hidden'}}">
        <button
            class="flex items-center px-3 py-2 border rounded text-teal-300 border-teal-400 hover:text-white hover:border-white"
            id="menu">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
        </button>
    </div>
    <nav class="w-full hidden flex-grow {{ !Auth::check() ? 'sm:flex sm:w-1/2 sm:justify-end' : 'lg:flex lg:w-3/4 lg:justify-end'}}"
        id="nav">
        <ul>
            <div class="block sm:inline-block w-full lg:w-auto mt-4 lg:mt-0">
                <div class="relative">
                    <form action="{{ route('post.search') }}" method="get">
                        <input
                            class="transition-colors duration-100 ease-in-out border border-transparent text-teal-100 placeholder-white rounded-lg bg-teal-400 py-2 pr-4 pl-10 block w-full appearance-none leading-normal focus:outline-none focus:bg-white focus:border-teal-400 focus:text-gray-900 focus:placeholder-gray-800"
                            id="search" type="text" placeholder="search" name="keyword">
                        <div class="pointer-events-none absolute inset-y-0 left-0 pl-4 flex items-center">
                            <svg class="fill-current pointer-events-none text-teal-600 w-4 h-4"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path
                                    d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z">
                                </path>
                            </svg>
                        </div>
                    </form>
                </div>
            </div>
            @auth
            <li class="block sm:inline-block">
                <a href="{{ route('auth.dashboard') }}"
                    class="block sm:inline-block mt-4 no-underline text-sm text-white border-white border-solid border rounded px-4 py-2 hover:text-teal-300 hover:bg-white hover:border-0 hover:border-none lg:mt-0">
                    Dashboard
                </a>
            </li>
            <li class="block sm:inline-block">
                <a href="{{ route('post.create') }}"
                    class="block sm:inline-block mt-4 no-underline text-sm text-white border-white border-solid border rounded px-4 py-2 hover:text-teal-300 hover:bg-white hover:border-0 hover:border-none lg:mt-0">
                    Add Post
                </a>
            </li>
            <li class="block sm:inline-block">
                <a href="{{ route('auth.logout') }}"
                    class="block sm:inline-block mt-4 no-underline text-sm text-white border-white border-solid border rounded px-4 py-2 hover:text-teal-300 hover:bg-white hover:border-0 hover:border-none lg:mt-0">
                    Logout
                </a>
            </li>
            @endauth
            @guest
            <li class="block sm:inline-block">
                <a href="{{ route('auth.form.login') }}"
                    class="block sm:inline-block mt-4 no-underline text-sm text-white border-white border-solid border rounded px-4 py-2 hover:text-teal-300 hover:bg-white hover:border-0 hover:border-none sm:mt-0"
                    id="login">
                    Login
                </a>
            </li>
            <li class="block sm:inline-block">
                <a href="{{ route('auth.register.form') }}"
                    class="block sm:inline-block mt-4 no-underline text-sm text-white border-white border-solid border rounded px-4 py-2 hover:text-teal-300 hover:bg-white hover:border-0 hover:border-none sm:mt-0"
                    id="register">
                    Register
                </a>
            </li>
            @endguest
        </ul>
    </nav>
</header>
<script src="/js/header.js"></script>