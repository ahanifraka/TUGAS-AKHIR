<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Badan Pembinaan BUMD Provinsi Jakarta') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet" media="print" onload="this.media='all'">

    <script>
        try {
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
            } else {
                document.documentElement.classList.remove('dark')
            }
        } catch (_) {}
    </script>

    <!-- Scripts -->
    @routes
    <script>
        window.APP_CONFIG = Object.assign({}, window.APP_CONFIG || {}, {
            turnstileSiteKey: "{{ config('services.turnstile.site_key') }}"
        });
    </script>
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="font-sans antialiased bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100">
    @inertia
    @guest
        @env('production')
            <script src="https://code.responsivevoice.org/responsivevoice.js?key=WhBonMGc"></script>
            <script type="text/javascript" src="https://web.animemusic.us/widget_disabilitas.js" async></script>
        @endenv
    @endguest
</body>

</html>