@extends('layout.common')
@section('title', 'cart')
@include('layout.head')

@section('content')
<main role="main-inner-wrapper" class="container">
	<div class="cart_items">
		<form action="/order/delete_all" class="clear_form" method="POST">
			{{csrf_field()}}
			<input type="submit" class="btn btn-danger clear_cart" value="CLEAR CART">
		</form>
		@if(count($cart) > 0)
			@foreach($cart as $index => $item)
				<div class="cart_row">
					<a class="item_name" href="/product/{{$item['item_detail']->id}}">{{$item['item_detail']->name}}</a>
					<form action="/order/remove" class="remove_or_add" method="POST">
						{{csrf_field()}}
						<input type="hidden" name="product_id" value="{{$index}}">
						<!-- <input type="hidden" name="index" value="{{$index}}"> -->
						<input type="submit" class="btn btn-dark" value="-">
					</form>
					<span class="quantity"><div class="right">{{$item['quantity']}}</div></span>
					
					<form action="/order/add" class="remove_or_add" method="POST">
						{{csrf_field()}}
						<input type="hidden" name="product_id" value="{{$index}}">
						<input type="hidden" name="quantity" value="1">
						<input type="submit" class="btn btn-dark" value="+">
					</form>
				</div>
			@endforeach
		@else
			<p>no item your cart yet.</p>
		@endif
		<a href="/" class="btn btn-success continue">CONTINUE SHOPING</a>
	</div>

	<div class="cart_detail" >
		@foreach($cart_detail as $key => $val)
			<div class="cart_detail_row">
				<span class="detail_content">{{strtoupper(str_replace('_', ' ',$key))}}</span>
				<span class="detail_item"><div class="item_inner">{{number_format($val)}}</div></span>
				<span class="detail_jpy">JPY</span>
			</div>
		@endforeach
		
	</div>

	@if ($errors->any())
		@foreach($errors->all() as $error)
			<p>{{$error}}</p>
		@endforeach
	@endif

	<div class="confirm_header">SHIPPING ADDRESS</div>
	<form action="/order/commit" class="confirm_form" method="POST">
		{{csrf_field()}}
		<p>name</p>
		<input class="form-control" type="text" name="address_name">
		<p>zip-code</p>
		<div class="zip_1">
			<input class="form-control" type="text" maxlength="3" name="zip_1" >
		</div>
		<span class="hyphen"> - </span>
		<div class="zip_2">
			<input class="form-control" type="text" maxlength="4" name="zip_2" >
		</div>
		<p>pref</p>
		<div class="zip_2">
			<select class="form-control" name="pref">
				<option value="">--</option>
				@foreach(config('pref') as $index => $name)
					<option value="{{$name}}">{{$name}}</option>
				@endforeach
			</select>
		</div>
		<p>address city & town</p>
		<input class="form-control" type="text" name="address_detail">
		<p>address build & street</p>
		<input class="form-control" type="text" name="address_building">
		<div class="product_details">
			<input class="buy_button" type="submit" name="commit" value="SEND ORDERS">
		</div>
	</form>
</main>
@endsection
@include('layout.footer')