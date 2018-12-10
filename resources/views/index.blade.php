@extends('layout.common')
@section('title', 'index')
@include('layout.head')
@include('layout.header')

@section('content')
<main role="main-home-wrapper" class="container">
	<div class="row">
		<section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
			<article role="pge-title-content">
				<header>
					<h2><span>ClariS</span> A Best of Singer.</h2>
				</header>
				<p>From Hokkaido, The best fan goods</p>
				<p>For you.</p>
			</article>
		</section>

		<section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">
			<figure class="effect-oscar">
				<img src="images/home-images/image-1.jpg" alt="" class="img-responsive"/>
				<figcaption>
					<h2>Recommend<span>ITEMS</span></h2>
					<a href="works-details.html">View more</a>
				</figcaption>
			</figure>
		</section>

		<div class="clearfix"></div>
		<div class="grid_outer">
			<div class="grid">
				<div class="text">
					<h2>All Items...</h2>
				</div>
			</div>
			@foreach($products as $idx => $product)
				<a href="/product/{{$product->id}}" class="grid">
					<div class="pic {{$idx%2==0? 'clara' : 'karen'}}">
						<h2>{{$product->name}}</h2>
						<img src="{{$product->top_image_url}}">
						<p>{{$product->price}}JPY</p>
					</div>
				</a>
			@endforeach
		</div>
	</div>
</main>
@endsection
@include('layout.footer')