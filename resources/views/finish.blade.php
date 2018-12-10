@extends('layout.common')
@section('title', 'finish')
@include('layout.head')

@section('content')
<main role="main-inner-wrapper" class="container">
	<div class="finish_area">
		<div class="finish_text">THANK YOU!</div>
		<div class="finish_text">YOUR ORDER IS CONFIRMED.</div>
		<div class="finish_text"><a href="/" class="btn btn-success">GO TO TOP PAGE</a></div>
	</div>
</main>
@endsection
@include('layout.footer')