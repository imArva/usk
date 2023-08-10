<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        
    </head>
    <body class="antialiased">
        @guest
            <a href="/signin">Sign in</a> <br>
            <a href="/signup">Sign Up</a>
        @endguest

        @auth
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
            <ul>
                @foreach ($books as $book)
                    <div style="display: flex">
                        <h1><a href="book/{{ $book->id }}" style="color:black;">{{ $book->title }}</a></h1>
                        <p>by {{ $book->author }}</p>
                    </div>
                @endforeach
            </ul>

            @if (auth()->user()->isAdmin)
                <a href="/add-book">Tambah buku</a>

                <br>
                <br>
            @endif

            <a href="/logout">Logout</a>
        @endauth

        
    </body>
</html>
