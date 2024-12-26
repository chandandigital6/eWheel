<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        /* pricing */

        .pricing-content{position:relative;}
        .pricing_design{
            position: relative;
            margin: 0px 15px;
        }
        .pricing_design .single-pricing{
            background:#554c86;
            padding: 60px 40px;
            border-radius:30px;
            box-shadow: 0 10px 40px -10px rgba(0,64,128,.2);
            position: relative;
            z-index: 1;
        }
        .pricing_design .single-pricing:before{
            content: "";
            background-color: #fff;
            width: 100%;
            height: 100%;
            border-radius: 18px 18px 190px 18px;
            border: 1px solid #eee;
            position: absolute;
            bottom: 0;
            right: 0;
            z-index: -1;
        }
        .price-head{}
        .price-head h2 {
            margin-bottom: 20px;
            font-size: 26px;
            font-weight: 600;
        }
        .price-head h1 {
            font-weight: 600;
            margin-top: 30px;
            margin-bottom: 5px;
        }
        .price-head span{}

        .single-pricing ul{list-style:none;margin-top: 30px;}
        .single-pricing ul li {
            line-height: 36px;
        }
        .single-pricing ul li i {
            background: #554c86;
            color: #fff;
            width: 20px;
            height: 20px;
            border-radius: 30px;
            font-size: 11px;
            text-align: center;
            line-height: 20px;
            margin-right: 6px;
        }
        .pricing-price{}

        .price_btn {
            background: #554c86;
            padding: 10px 30px;
            color: #fff;
            display: inline-block;
            margin-top: 20px;
            border-radius: 2px;
            -webkit-transition: 0.3s;
            transition: 0.3s;
        }
        .price_btn:hover{background:#0aa1d6;}
        a{
            text-decoration:none;
        }

        .section-title {
            margin-bottom: 60px;
        }
        .text-center {
            text-align: center!important;
        }

        .section-title h2 {
            font-size: 45px;
            font-weight: 600;
            margin-top: 0;
            position: relative;
            text-transform: capitalize;
        }


        #logoImg {
            width: 100px;
            height: 100px;
            animation: scroll 60s linear infinite;
        }

        .slide-track {
            width: 100%;
            display: flex;
            gap: 3em;
            overflow: hidden;
        }

        .slider {
            margin-top: 20px;
            background-color: rgb(255, 255, 255);
            padding: 8em 2em;
        }

        @keyframes scroll {
            0% {transform: translateX(0);}
            100% {transform: translatex(-1000%)}
        }



        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            color: #333;
        }

        .footer p {
            margin-bottom: 0;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            display: inline-block;
            margin-right: 20px;
        }

        .footer-links li:last-child {
            margin-right: 0;
        }

        /* Custom styles for better visual presentation */
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .card img {
            border-radius: 15px;
            height: 300px;
            object-fit: cover;
        }
        .card-body {
            padding: 20px;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .content p {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .content img {
            border-radius: 10px;
        }
        @media (max-width: 768px) {
            .carousel-item .card {
                margin-bottom: 20px;
            }
        }
        .custom-card {
            /* Additional custom styling */
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 10px;
        }

        .custom-card img {
            /* Make images fill the container */
            width: 100%;
            height: auto;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="{{asset('/logo.jpg')}}" alt="" width="100px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Contact</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row p-5 bg-dark">
        <div class="col-md-8">
            <div id="cardSlider" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#cardSlider" data-slide-to="0" class="active"></li>
                    <li data-target="#cardSlider" data-slide-to="1"></li>
                    <li data-target="#cardSlider" data-slide-to="2"></li>
                    <li data-target="#cardSlider" data-slide-to="3"></li>
                </ol>
{{--                <div class="carousel-inner">--}}
{{--                    <div class="carousel-item active">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="card">--}}
{{--                                    <img src="{{asset('/mahabir.jpg')}}" class="card-img-top" alt="Card Image">--}}
{{--                                    <div class="card-body text-center">--}}
{{--                                        <h5 class="card-title text-dark">Mahabir</h5>--}}
{{--                                        <p class="card-text text-dark">20-04-2024</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="card">--}}
{{--                                    <img src="{{asset('/Ram-Navami-1.jpg')}}" class="card-img-top" alt="Card Image">--}}
{{--                                    <div class="card-body text-center">--}}
{{--                                        <h5 class="card-title text-dark">Mahabir</h5>--}}
{{--                                        <p class="card-text text-dark">20-04-2024</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    --}}
{{--                    <div class="carousel-item">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="card">--}}
{{--                                    <img src="{{asset('/mahabir.jpg')}}" class="card-img-top" alt="Card Image">--}}
{{--                                    <div class="card-body text-center">--}}
{{--                                        <h5 class="card-title text-dark">Mahabir</h5>--}}
{{--                                        <p class="card-text text-dark">20-04-2024</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="card">--}}
{{--                                    <img src="{{asset('/Ram-Navami-1.jpg')}}" class="card-img-top" alt="Card Image">--}}
{{--                                    <div class="card-body text-center">--}}
{{--                                        <h5 class="card-title text-dark">Mahabir</h5>--}}
{{--                                        <p class="card-text text-dark">20-04-2024</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- Add more carousel items as needed -->--}}
{{--                </div>--}}
{{--                <div class="carousel-item">--}}
{{--                    @foreach($data as $key => $post)--}}
{{--                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="card">--}}
{{--                                        <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="Card Image">--}}
{{--                                        <div class="card-body text-center">--}}
{{--                                            <h5 class="card-title text-dark">{{ $post->title }}</h5>--}}
{{--                                            <p class="card-text text-dark">{{ $post->date }}</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- Add more carousel items as needed -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <div class="carousel-inner">--}}
{{--                    @foreach($data as $key => $post)--}}
{{--                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <div class="card">--}}
{{--                                        <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="Card Image">--}}
{{--                                        <div class="card-body text-center">--}}
{{--                                            <h5 class="card-title text-dark">{{ $post->title }}</h5>--}}
{{--                                            <p class="card-text text-dark">{{ $post->date }}</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <!-- Add more carousel items as needed -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
                <div class="carousel-inner">
                    @foreach($data->chunk(2) as $index => $chunk)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row">
                                @foreach($chunk as $post)
                                    <div class="col-md-6">
                                        <div class="card">
                                            <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top" alt="Card Image">
                                            <div class="card-body text-center">
                                                <h5 class="card-title text-dark">{{ $post->title }}</h5>
                                                <p class="card-text text-dark">{{ \Illuminate\Support\Carbon::parse($post->date)->format('d - F - Y') }}</p>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <a class="carousel-control-prev" href="#cardSlider" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#cardSlider" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="content text-white">
                <h2>Naye Bharat Ka Apna Branding App!</h2>
                <p>Be The Next Big Brand Along With 3.5 Million Businesses</p>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <img src="{{asset('/mahabir.jpg')}}" alt="" width="48%" height="100px">
                    <img src="{{asset('/mahabir.jpg')}}" alt="" width="48%" height="100px">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- category -->
<div class="container">
    <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="row mb-5">
                    <div class="text-center p-5">
                        <h2>Business Categories</h2>
                    </div>
                    @foreach($categories as $category)
                        <div class="col-md-2">
                            <div class="card">
                                <img src="{{ asset('storage/'.$category->image) }}" class="card-img-top" alt="Card Image">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-dark">{{ $category->title }}</h5>
                                    <!-- You may want to add a status check here if needed -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Add more carousel items as needed -->
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<div class="container">
    <div class="row mb-2">
        <div class="text-center p-5">
            <h2>Business Categories</h2>
        </div>
        @foreach($demoproducts as $product)
            <div class="col-md-4 d-flex">
                <div class="card rounded p-2 m-2 custom-card">
                    @php
                        $images = explode(',', $product->image_path);
                        $count = count($images) > 4 ? 4 : count($images);
                    @endphp
                    @for($i = 0; $i < $count; $i++)
                        <img src="{{ asset('storage/'.$images[$i]) }}" class="card-img-top" alt="Card Image">
                    @endfor
                </div>
            </div>
        @endforeach
    </div>
</div>

{{--<div class="container">--}}
{{--    <div class="row mb-2">--}}
{{--        <div class="text-center p-5">--}}
{{--            <h2>Business Categories</h2>--}}
{{--        </div>--}}
{{--        @foreach($demoproducts as $product)--}}
{{--            <div class="col-md-4 d-flex">--}}
{{--                <div class="card rounded p-2 m-2 custom-card">--}}
{{--                    @foreach(explode(',', $product->image_path) as $image)--}}
{{--                        <img src="{{ asset('storage/'.$image) }}" class="card-img-top" alt="Card Image" width="100px" height="100px">--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="container">--}}
{{--    <div class="row mb-5">--}}

{{--        <div class="col-md-2 d-flex">--}}

{{--        </div>--}}
{{--        <div class="col-md-4 d-flex">--}}
{{--            <div class="card rounded p-2 m-2 custom-card">--}}
{{--                <img src="{{asset('/mahabir.jpg')}}" class="card-img-top" alt="Card Image">--}}
{{--                <img src="{{asset('/mahabir.jpg')}}" class="card-img-top" alt="Card Image">--}}
{{--                <img src="{{asset('/mahabir.jpg')}}" class="card-img-top" alt="Card Image">--}}
{{--                <img src="{{asset('/mahabir.jpg')}}" class="card-img-top" alt="Card Image">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-4 d-flex">--}}
{{--            <div class="card rounded p-2 m-2 custom-card">--}}
{{--                <img src="{{asset('/mahabir.jpg')}}" class="card-img-top" alt="Card Image">--}}
{{--                <img src="{{asset('/mahabir.jpg')}}" class="card-img-top" alt="Card Image">--}}
{{--                <img src="{{asset('/mahabir.jpg')}}" class="card-img-top" alt="Card Image">--}}
{{--                <img src="{{asset('/mahabir.jpg')}}" class="card-img-top" alt="Card Image">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-2 d-flex">--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="container-fluid bg-light">
    @foreach($abouts as $about)
        <div class="row p-5">
            <div class="col-md-7">
                <h1>{{ $about->title }}</h1>
                @if($about->description)
                    @foreach(explode("\n", $about->description) as $paragraph)
                        <p>{!! $paragraph  !!}</p>
                    @endforeach
                @endif
                <a href="" class="btn btn-primary">Checkout</a>
            </div>
            <div class="col-md-5">
                @if($about->image)
                    <img src="{{ asset('storage/'.$about->image) }}" alt="" width="450px" class="rounded">
                @endif
            </div>
        </div>
    @endforeach
</div>


<div class="container-fluid">
    <div class="row p-5">
        <div class="text-center">
            <h2>Our Client</h2>
        </div>
        <div class="slider">
            <div class="slide-track">
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/thumbs/2x/mcdonalds-black-logo.png" alt="" id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/images/large/2x/starbucks-logo-black-and-white.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/general-electric-black-logo-png-transparent.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/nfl-logo-png-transparent.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/mercedes-benz-6-logo-png-transparent.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/hogwarts-logo-png-transparent.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/thumbs/2x/mcdonalds-black-logo.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/images/large/2x/starbucks-logo-black-and-white.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/general-electric-black-logo-png-transparent.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/nfl-logo-png-transparent.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/mercedes-benz-6-logo-png-transparent.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/hogwarts-logo-png-transparent.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/thumbs/2x/mcdonalds-black-logo.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/images/large/2x/starbucks-logo-black-and-white.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/general-electric-black-logo-png-transparent.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/nfl-logo-png-transparent.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/mercedes-benz-6-logo-png-transparent.png" alt=""  id="logoImg">
                </div>
                <div class="slide">
                    <img src="https://cdn.freebiesupply.com/logos/large/2x/hogwarts-logo-png-transparent.png" alt=""  id="logoImg">
                </div>
            </div>
        </div>
    </div>

</div>


<section id="pricing" class="pricing-content section-padding">
    <div class="container">
        <div class="section-title text-center">
            <h2>Pricing Plans</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
        </div>
        <div class="row text-center mb-5" >
            <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                <div class="pricing_design">
                    <div class="single-pricing">
                        <div class="price-head">
                            <h2>Starter</h2>
                            <h1>$0</h1>
                            <span>/Monthly</span>
                        </div>
                        <ul>
                            <li><b>15</b> website</li>
                            <li><b>50GB</b> Disk Space</li>
                            <li><b>50</b> Email</li>
                            <li><b>50GB</b> Bandwidth</li>
                            <li><b>10</b> Subdomains</li>
                            <li><b>Unlimited</b> Support</li>
                        </ul>
                        <div class="pricing-price">

                        </div>
                        <a href="#" class="price_btn">Order Now</a>
                    </div>
                </div>
            </div><!--- END COL -->
            <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.2s; animation-name: fadeInUp;">
                <div class="pricing_design">
                    <div class="single-pricing">
                        <div class="price-head">
                            <h2>Personal</h2>
                            <h1 class="price">$29</h1>
                            <span>/Monthly</span>
                        </div>
                        <ul>
                            <li><b>15</b> website</li>
                            <li><b>50GB</b> Disk Space</li>
                            <li><b>50</b> Email</li>
                            <li><b>50GB</b> Bandwidth</li>
                            <li><b>10</b> Subdomains</li>
                            <li><b>Unlimited</b> Support</li>
                        </ul>
                        <div class="pricing-price">

                        </div>
                        <a href="#" class="price_btn">Order Now</a>
                    </div>
                </div>
            </div><!--- END COL -->
            <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="pricing_design">
                    <div class="single-pricing">
                        <div class="price-head">
                            <h2>Ultimate</h2>
                            <h1 class="price">$49</h1>
                            <span>/Monthly</span>
                        </div>
                        <ul>
                            <li><b>15</b> website</li>
                            <li><b>50GB</b> Disk Space</li>
                            <li><b>50</b> Email</li>
                            <li><b>50GB</b> Bandwidth</li>
                            <li><b>10</b> Subdomains</li>
                            <li><b>Unlimited</b> Support</li>
                        </ul>
                        <div class="pricing-price">

                        </div>
                        <a href="#" class="price_btn">Order Now</a>
                    </div>
                </div>
            </div><!--- END COL -->
        </div><!--- END ROW -->
    </div><!--- END CONTAINER -->
</section>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>&copy; 2024 Your Company Name. All rights reserved.</p>
            </div>
            <div class="col-md-6">
                <ul class="footer-links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
