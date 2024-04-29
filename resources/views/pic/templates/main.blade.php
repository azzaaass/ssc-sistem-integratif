<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    {{-- Google font --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

        * {
            font-family: "Inter", sans-serif;
        }

        .tx-red {
            color: #b6272c;
        }

        .tx-gray {
            /* color: #464646; */
            color: #414040;
        }

        .bgx-gray {
            /* color: #464646; */
            background-color: #414040;
        }
    </style>
</head>

<body>
    <nav class="sticky top-0 z-20 bg-white dark:bg-gray-900 shadow">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 lg:px-10 xl:px-20">
            <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/logo-telu.png') }}" alt="logo telkom university" class="w-5">
                <span
                    class="hidden lg:block self-center text-xl font-bold whitespace-nowrap tx-red dark:text-white">Student
                    Service
                    Center</span>
                <span
                    class="block lg:hidden self-center text-xl font-bold whitespace-nowrap tx-red dark:text-white">SSC</span>
            </a>

            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <p id="menu-pusat-bantuan" class="block p-2 tx-gray text-sm font-normal"
                            onclick="menu_clicked('pusat-bantuan')">Pusat bantuan
                            <i class="fa-solid fa-angle-down"></i>
                        </p>
                        <div id="sub-menu-pusat-bantuan" class="hidden absolute bg-white shadow mt-8 p-4">
                            <ul>
                                <li>
                                    <a href="">
                                        <p class="block p-2 tx-gray text-sm font-normal">Kontak Admin</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="">
                                        <p class="block p-2 tx-gray text-sm font-normal">Kritik dan Saran</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="/suratPic" class="block p-2 tx-gray text-sm font-normal">Surat</a>
                    </li>
                    <li>
                        <a href="/" class="block p-2 tx-gray text-sm font-normal">History</a>
                    </li>
                </ul>
            </div>
            <div class="hidden bg-gradient-to-t from-[#B6272C] to-[#ED212B] rounded-lg w-full md:block md:w-auto">
                <p class="hidden py-1.5 px-5 text-white text-sm font-semibold">Login</p>
            </div>
            <div id="menu-user" class="p-0.5 rounded-[50%] bgx-gray" onclick="menu_clicked('user')">
                <img src="https://source.unsplash.com/random/?profile" alt=""
                    class="object-cover h-10 w-10 rounded-[50%]">
                <div id="sub-menu-user" class="absolute hidden bg-white shadow mt-8 px-8 py-4">
                    <ul>
                        <li>
                            <a href="">
                                <p class="block p-2 tx-gray text-sm font-normal">{{ Auth::user()->name }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <p class="block p-2 tx-gray text-sm font-normal">Profile</p>
                            </a>
                        </li>
                        <li>
                            <a href="/logout">
                                <p class="block p-2 tx-gray text-sm font-normal">Logout</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="py-10 2xl:px-60 xl:px-40 bg-[#F1F1F1]">
        @yield('container')
    </div>
    <script>
        function menu_clicked(menu) {
            if ($("#sub-menu-" + menu).hasClass("hidden")) {
                $("#sub-menu-" + menu).removeClass("hidden");
            } else {
                $("#sub-menu-" + menu).addClass("hidden");
            }
        }
        // submenu / out page clicked
        $(document).on("click", function(e) {
            if (!$(e.target).closest("#menu-pusat-bantuan, #sub-menu-pusat-bantuan").length) {
                $("#sub-menu-pusat-bantuan").addClass("hidden");
            }
        });
        // submenu / out page clicked
        $(document).on("click", function(e) {
            if (!$(e.target).closest("#menu-user,#sub-menu-user").length) {
                $("#sub-menu-user").addClass("hidden");
            }
        });
    </script>
    <style>

    </style>
</body>
