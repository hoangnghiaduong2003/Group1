
@extends('layouts.master')

@section('title', 'Đơn Hàng')

@section('content')

  <section class="bread-crumb">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home_page') }}">{{ __('Trang Chủ') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Order form</li>
      </ol>
    </nav>
  </section>

  <div class="site-orders">
    <section class="section-advertise">
      <div class="content-advertise">
        <div id="slide-advertise" class="owl-carousel">
          @foreach($data['advertises'] as $advertise)
            <div class="slide-advertise-inner" style="background-image: url('{{ Helper::get_image_advertise_url($advertise->image) }}');" data-dot="<button>{{ $advertise->title }}</button>"></div>
          @endforeach
        </div>
      </div>
    </section>

    <section class="section-orders">
      <div class="section-header">
        <h2 class="section-title">Order form <span>({{ $data['orders']->count() }} Order form)</span></h2>
      </div>
      <div class="section-content">
        <div class="row">
          <div class="col-md-9">
            <div class="orders-table">
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th class="text-center">numerical order</th>
                      <th class="text-center">Code<br>Order form</th>
                      <th class="text-center">Method<br>Pay</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-center">Unit price</th>
                      <th class="text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data['orders'] as $key => $order)
                      @php
                        $qty = 0;
                        $price = 0;
                        foreach($order->order_details as $order_detail) {
                          $qty = $qty + $order_detail->quantity;
                          $price = $price + $order_detail->price * $order_detail->quantity;
                        }
                      @endphp
                      <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center"><a href="{{ route('order_page', ['id' => $order->id]) }}" title="Chi tiết đơn hàng: {{ $order->order_code }}">{{ $order->order_code }}</a></td>
                        <td class="text-center">{{ $order->payment_method->name }}</td>
                        <td class="text-center">{{ $qty }}</td>
                        <td class="text-center" style="color: #f30;">{{ number_format($price,0,',','.') }}$</td>
                        @if($order->status)
                        <td class="text-center"><span class="label label-success">Success</span></td>
                        @else
                        <td class="text-center"><span class="label label-danger">Failure</span></td>
                        @endif
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="online_support">
              <h2 class="title">WE ARE ALWAYS READY<br>TO HELP YOU</h2>
              <img src="{{ asset('images/support_online.jpg') }}">
              <h3 class="sub_title">For the best support. Please call</h3>
              <div class="phone">
                <a href="tel:123456798" title="123456798">123456798</a>
              </div>
              <div class="or"><span>Or</span></div>
              <h3 class="title">Online support chat</h3>
              <h3 class="sub_title">We are always online 24/7.</h3>
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
