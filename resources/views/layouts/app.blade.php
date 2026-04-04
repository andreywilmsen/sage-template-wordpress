<!doctype html>
<html @php(language_attributes())>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body @php(body_class())>
    @php(wp_body_open())

    <div id="app">
        @include('sections.header')

        <main id="main" class="main">
            @yield('content')
        </main>

        @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
</body>

</html>
