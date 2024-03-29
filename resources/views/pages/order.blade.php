
@extends('layouts.master')

@section('title', $data['order']->order_code)

@section('content')

  <section class="bread-crumb">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home_page') }}">{{ __('Trang Chủ') }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('orders_page') }}">Order form</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $data['order']->order_code }}</li>
      </ol>
    </nav>
  </section>

  <div class="site-order">
    <section class="section-advertise">
      <div class="content-advertise">
        <div id="slide-advertise" class="owl-carousel">
          @foreach($data['advertises'] as $advertise)
            <div class="slide-advertise-inner" style="background-image: url('{{ Helper::get_image_advertise_url($advertise->image) }}');" data-dot="<button>{{ $advertise->title }}</button>"></div>
          @endforeach
        </div>
      </div>
    </section>

    @php
      $qty = 0;
      $price = 0;
      foreach($data['order']->order_details as $order_detail) {
        $qty = $qty + $order_detail->quantity;
        $price = $price + $order_detail->price * $order_detail->quantity;
      }
    @endphp

    <section class="section-order">
      <div class="section-header">
        <div class="section-header-left">
          <h2 class="section-title">{{ $data['order']->order_code }} <span>( {{ $qty }} Product)</span></h2>
        </div>
        <div class="section-header-right">
          Date created: {{ date_format($data['order']->created_at, 'd/m/Y') }}
        </div>
      </div>
      <div class="section-content">
        <div class="row">
          <div class="col-md-9">
            <div class="order-info">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="order-info-left">
                    <div class="order-info-header">
                      <h3 class="text-center">Account information</h3>
                    </div>
                    <div class="order-info-content">
                      <div><span>Name</span> <span>{{ $data['order']->user->name }}</span></div>
                      <div><span>Email</span> <span>{{ $data['order']->user->email }}</span></div>
                      <div><span>Phone number</span> <span>{{ $data['order']->user->phone }}</span></div>
                      <div><span>Address</span> <span>{{ $data['order']->user->address }}</span></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="order-info-right">
                    <div class="order-info-header">
                      <h3 class="text-center">Purchase Information</h3>
                    </div>
                    <div class="order-info-content">
                      <div><span>Name</span> <span>{{ $data['order']->name }}</span></div>
                      <div><span>Email</span> <span>{{ $data['order']->email }}</span></div>
                      <div><span>Phone number</span> <span>{{ $data['order']->phone }}</span></div>
                      <div><span>Address</span> <span>{{ $data['order']->address }}</span></div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="order-info-center">
                    <div class="order-info-header">
                      <h3 class="text-center">Order information</h3>
                    </div>
                    <div class="order-info-content">
                      <div><span>Code Bill</span> <span>{{ $data['order']->order_code }}</span></div>
                      <div><span>Payment methods</span> <span>{{ $data['order']->payment_method->name }}</span></div>
                      <div><span>Quantity</span> <span>{{ $qty }} Product</span></div>
                      <div><span>Unit price</span> <span style="color: #f30;">{{ number_format($price,0,',','.') }}$</span></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="order-table">
              <div class="table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th class="text-center">STT</th>
                      <th class="text-center">Code<br>Product</th>
                      <th class="text-center">Name<br>Product</th>
                      <th class="text-center">Colors</th>
                      <th class="text-center">Quantity</th>
                      <th class="text-center">Unit price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data['order']->order_details as $key => $order_detail)
                      <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td class="text-center"><a href="{{ route('product_page', ['id' => $order_detail->product_detail->product->id]) }}" title="{{ $order_detail->product_detail->product->name }}">{{ $order_detail->product_detail->product->sku_code }}</a></td>
                        <td class="text-center">{{ $order_detail->product_detail->product->name }}</td>
                        <td class="text-center">{{ $order_detail->product_detail->color }}</td>
                        <td class="text-center">{{ $order_detail->quantity }}</td>
                        <td class="text-center" style="color: #f30;">{{ number_format($order_detail->price,0,',','.') }}$</td>
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
                <a href="tel:123456789" title="123456789">123456789</a>
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
