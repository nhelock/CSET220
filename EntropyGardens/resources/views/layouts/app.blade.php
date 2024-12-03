<html>


    <head>
        <title>@yield('title', 'Application')</title>
    </head>

    <body>
        <p>Header</p>
        {{-- put header here --}}

        <main class='main'>
            <div class=container>
                @yield('content')
            </div>
        </main>
    </body>
</html>