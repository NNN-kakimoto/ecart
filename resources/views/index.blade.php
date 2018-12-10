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
		<section class="tile_view_outer">
				<div class="tile_view_content">
					<figure class="effect-oscar">
						<img src="images/home-images/image-2.jpg" alt="" class="img-responsive"/>
							<div class="index_ditals">
								<h2>Studio Thonik <span>Exhibition</span></h2>
								<p>Project for Thonik, design studio based in Amsterdam</p>
								<a href="works-details.html">View more</a>
							</div>
					</figure>
				</div>
				<a href="/product/1">test</a>

				@for($i = 0; $i< 5; $i++)
					<div class="tile_view_content">
						<figure class="effect-oscar">
							<img src="images/home-images/image-3.jpg" alt="" class="img-responsive"/>
							<div class="index_ditals">
								<h2>{{$i}} <span>Exhibition</span></h2>
								<p>Project for Thonik, design studio based in Amsterdam</p>
								<a href="works-details.html">View more</a>
							</div>
						</figure>
					</div>
				@endfor
		</section>
		<div class="clearfix"></div>
	</div>
</main>
@endsection
@include('layout.footer')