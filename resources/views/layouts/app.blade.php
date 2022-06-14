@include('frontend.header')
    <div id="app" class="container">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @include('frontend.footer')
</body>

</html>
