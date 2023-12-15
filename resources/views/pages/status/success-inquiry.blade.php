<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('components.head')
</head>

<body x-data="{ scrolled: false }" @scroll.window="scrolled = window.scrollY > 0 ? true : false"
    :class="{ 'scrolled': scrolled }" class="bg-green-600">
    <header>
        @include('components.navbar')
    </header>
    <section class="h-screen flex items-center justify-center">
        <div class="container mt-5 p-4 bg-white rounded-2xl">
            <div class="row justify-content-center text-center">
                <div class="col-md-10" data-aos="fade" data-aos-delay="100">
                    <h2 data-aos="fade" class="text-success">Payment Successful</h2>
                    {{-- <div class="card-image mt-2">
                        <img class="img-fluid" src="images/luggage.png" alt="success-payment" style="height: 400px;">
                    </div> --}}
                    <h4 style="color: #4a4848; white-space: nowrap; display: inline-block;">Your payment has been processed
                        successfully</h4>
                    <h5 class="mb-5" style="color: #4a4848; white-space: nowrap; display: inline-block;">Kindly check your
                        email for receipt. Thank you!</h5>
                    <div>
                        <a href="/" class="back-to-home-btn py-2 font-weight-bold">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

    {{-- @include('components.footer3')

    @include('components.script') --}}
</body>

</html>