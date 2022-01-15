<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <title>TALL Example</title>

    <!-- Styles -->
    <link
        rel="stylesheet"
        href="{{ mix('css/app.css') }}"
    >

    @livewireStyles

    <!-- Scripts -->
    <script
        src="{{ mix('js/app.js') }}"
        defer
    ></script>
</head>

<body class="antialiased">
    {{-- form sidebar --}}
    @if (isset($form) && !$form->isEmpty())
        <x-form>
            {{ $form }}
        </x-form>
    @endif
    {{-- end form sidebar --}}

    {{-- main content --}}
    <div class="bg-gray-100 h-screen p-8 overflow-y-auto">
        {{ $slot }}
    </div>
    {{-- end main content --}}

    @livewireScripts
</body>

</html>
