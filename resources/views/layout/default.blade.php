<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
	<!--begin::Head-->
	<head>
        <base href="">
        <meta charset="utf-8" />                
        <title>{{ config('app.name') }} | @yield('title', $page_title ??  request()->segment(count(request()->segments()))  )</title>
        {{-- Meta Data --}}
        <meta name="description" content="Updates and statistics">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        
        {{-- Fonts --}}        
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        {{-- Google Font: Source Sans Pro --}}
        @foreach(config('layout.resources.css') as $style)
            <link href="{{ asset($style) }}" rel="stylesheet" type="text/css"/>
        @endforeach
        {{-- Layout Themes (used by all pages) --}}
        {{-- Includable CSS --}}
        @yield('styles')
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">                                
	</head>
	<!--end::Head-->
	<!--begin::Body-->


    <body class="hold-transition sidebar-mini">
        @yield('content')

        


        @foreach(config('layout.resources.js') as $script)
            <script src="{{ asset($script) }}" type="text/javascript"></script>
        @endforeach
        @yield('mainscripts')
        {{-- Includable JS --}}
        @yield('scripts')        
    </body>
</html>


