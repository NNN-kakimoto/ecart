@extends('layout.common')
@section('title', 'product')
@include('layout.head')

@section('content')
<main role="main-inner-wrapper" class="container">
	<div class="row">
		<section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
			<article role="pge-title-content">
				<form action="/order/add" method="POST">
					{{ csrf_field()}}
					<header>
						<h2 class="product_detail_text"><span class="product_name">{{$product->name}}</span>Made For Concert.</h2>
					</header>
					<p>Over 40,000 peoples use this in the concert.</p>
					<div class="product_details">
						<div class="row">
							<div class="col-xs-4 product_price_head">Price</div>
							<div class="col-xs-8 product_price">{{$product->price}}<span class="unit_jpy">JPY</span></span></div>
						</div>
						<p>select your quantity...</p>
						<select name="quantity" class="select_qty">
							<option value="1" selected>1</option>
							<option value="2" >2</option>
							<option value="3" >3</option>
							<option value="4" >4</option>
							<option value="5" >5</option>
						</select>
						<input type="hidden" name="product_id" value="{{$product->id}}">
						<input type="submit" class="buy_button" value="BUY NOW!">
					</div>
				</form>
			</article>
		</section>
		<section class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="about-content">
				<img src="{{$product->top_image_url}}" alt="">
			</div>
		</section>
		<div class="clearfix"></div>
	</div>
</main>
@endsection
@include('layout.footer')