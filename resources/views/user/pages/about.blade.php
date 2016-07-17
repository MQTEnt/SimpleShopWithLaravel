@extends('user.master')
@section('title')
About us
@stop
@section('body.main')
<section>
	<div class="container">
		<div class="row" style="padding-left: 40px">
			{!!$about->value!!}
		</div>
	</div>
</section>
@stop