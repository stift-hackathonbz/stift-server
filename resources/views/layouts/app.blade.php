<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="manifest" href="/manifest.json">

    <title>Stift - Digital assistant for artisans</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="https://sdk.pushy.me/web/1.0.5/pushy-sdk.js"></script>
    <script>
        // Register device for push notifications
        Pushy.register({ appId: '5dcf1750574cb62d339c0894' }).then(function (deviceToken) {
            // Print device token to console
            console.log('Pushy device token: ' + deviceToken);

            // Send the token to your backend server via an HTTP GET request
            //fetch('https://your.api.hostname/register/device?token=' + deviceToken);

            // Succeeded, optionally do something to alert the user
        }).catch(function (err) {
            // Handle registration errors
            console.error(err);
        });

        if (Pushy.isRegistered()) {
            // Subscribe the device to a topic
            Pushy.subscribe('default').catch(function (err) {
                // Handle subscription errors
                console.error('Subscribe failed:', err);
            });
        }
    </script>
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
    <div id="app">
        <nav class="bg-pink-600 shadow py-6">
            <div class="container mx-auto px-6 md:px-0">
                <div class="flex items-center justify-center">
                    <div class="mr-6">
                        <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    @if (Auth::check())
                    <div class="text-left">
                        <a href="{{ route('home') }}" class="no-underline hover:underline text-sm p-3 text-gray-300 {{ request()->is('home') ? 'font-bold' : '' }}">{{ __('Inventory') }}</a>
                        <a href="{{ route('checklist') }}" class="no-underline hover:underline text-sm p-3 text-gray-300 {{ request()->is('checklist') ? ' font-bold' : '' }}">{{ __('Checklist') }}</a>
                    </div>
                    @endif
                    <div class="flex-1 text-right">
                        @guest
                            <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="no-underline hover:underline text-gray-300 text-sm p-3" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
{{--                            <span class="text-gray-300 text-sm pr-4">{{ Auth::user()->name }}</span>--}}

                            <a href="{{ route('logout') }}"
                               class="no-underline hover:underline text-gray-300 text-sm p-3"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
