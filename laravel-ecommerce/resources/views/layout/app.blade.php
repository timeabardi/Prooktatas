<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel ecommerce</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('style')
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('layout.header')
                    @yield('content')
                    @include('layout.footer')
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        @stack('scripts')
        <script>
            window.refreshCartCount = function(){
                window.axios.get('{{route('cart.count')}}').then((response) => {
                    if(typeof response.data.count !== 'undefined' && response.data.count){
                        document.querySelector('.cart-count-wrapper').innerHTML = response.data.count;
                    }else{
                        document.querySelector('.cart-count-wrapper').innerHTML = 0;
                    }
                });
            }
        </script>
    </body>
</html>