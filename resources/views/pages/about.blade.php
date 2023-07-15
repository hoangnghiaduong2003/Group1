@extends('layouts.master')

@section('title', 'Giới Thiệu')

@section('content')

  <section class="bread-crumb">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home_page') }}">{{ __('Trang Chủ') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Introduce</li>
      </ol>
    </nav>
  </section>

  <div class="site-about">
    <section class="section-advertise">
      <div class="content-advertise">
        <div id="slide-advertise" class="owl-carousel">
          @foreach($advertises as $advertise)
            <div class="slide-advertise-inner" style="background-image: url('{{ Helper::get_image_advertise_url($advertise->image) }}');" data-dot="<button>{{ $advertise->title }}</button>"></div>
          @endforeach
        </div>
      </div>
    </section>

    <section class="section-about">
      <div class="section-header">
        <h2 class="section-title">Introduce</h2>
      </div>
      <div class="section-content">
        <div class="row">
          <div class="col-md-9 col-sm-8">
            <div class="content-left">
              <div class="note">
                <div class="note-icon"><i class="fas fa-info-circle"></i></div>
                <div class="note-content">
                  <p>website <strong>VDO</strong> is a product of the thesis graduation project: <i> Building an online e-commerce website. </i>. Made by student Hoang Nghia Duong - Btec - Fpt. All purchases on the website are valid !</p>
                </div>
              </div>
              <div class="content">
                <p>Today's society is constantly developing, along with the trend of e-commerce growing. Everything is so simple now, as long as you have a computer or even a smartphone with an available internet connection, buying, selling and exchanging commerce becomes easier than ever. with everyone with just a few mouse clicks.</p>
                <p>With e-commerce, all barriers of geographical space or working time are removed. The products are clearly introduced to not only the shoppers in that area but the whole country of Vietnam, even people all over the world. Sellers now not only sit around waiting for customers to come, but actively stand up and find customers. And when the number of customers increases, it is also proportional to the revenue will increase, which is what every business is aiming for..</p>
                <p>Not only that, e-commerce also creates business opportunities for those who do not have enough capital because: you do not have to pay rent in expensive places, hire employees, invest a lot in running. advertising ... but just need to invest, take care of an e-commerce website with full information about your business as well as features to support search, purchase, put images, information about product. From there, customers will be able to access information more proactively, thanks to easier, more accurate and faster advice and buying and selling. With the current extremely "fierce" competition between businesses, it is difficult to monopolize a product, so the place to conquer customers is the place that makes them feel the most comfortable. most satisfied.</p>
                <p>By e-commerce, all businesses from large, medium and small can unleash their creativity and compete fairly. Bold new business ideas, marketing strategies, promotions, etc. can all be applied and directed directly to customers quickly without spending too much money because all are still encapsulated in one page. ecommerce (website).</p>
                <p>On those bases, my graduation project implements the topic <i>“Building an online e-commerce website.”</i> to solve the needs of promoting and selling products directly to customers in all regions of the country, even internationally..</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-4">
            <div class="content-right">
              <div class="online_support">
                <h2 class="title">WE ARE ALWAYS READY<br>TO HELP YOU</h2>
                <img src="{{ asset('images/support_online.jpg') }}">
                <h3 class="sub_title">For the best support. Please call</h3>
                <div class="phone">
                  <a href="tel:123456789" title="123456789">123456789</a>
                </div>
                <div class="or"><span>OR</span></div>
                <h3 class="title">Online support chat</h3>
                <h3 class="sub_title">We are always online 24/7.</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>

@endsection

@section('css')
  <style>
    .slide-advertise-inner {
      background-repeat: no-repeat;
      background-size: cover;
      padding-top: 21.25%;
    }
    #slide-advertise.owl-carousel .owl-item.active {
      -webkit-animation-name: zoomIn;
      animation-name: zoomIn;
      -webkit-animation-duration: .6s;
      animation-duration: .6s;
    }
  </style>
@endsection

@section('js')
  <script>
    $(document).ready(function(){

      $("#slide-advertise").owlCarousel({
        items: 2,
        autoplay: true,
        loop: true,
        margin: 10,
        autoplayHoverPause: true,
        nav: true,
        dots: false,
        responsive:{
          0:{
            items: 1,
          },
          992:{
            items: 2,
            animateOut: 'zoomInRight',
            animateIn: 'zoomOutLeft',
          }
        },
        navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>']
      });
    });
  </script>
@endsection
