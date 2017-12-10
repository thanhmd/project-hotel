@extends("layouts.index")
@section('title', 'chi tiết khách sạn')
@section("content")

	 {{--  <div id="wowslider-container1">
		<div class="ws_images">
			<ul>
				@foreach($imageslist as $l)
					<li><img src="upload/hinhkschitiet/{{ $l->name }}" alt="banner (1)" title="banner (1)" id="wows1_{{ $l->id }}"/>
					</li>
				@endforeach
			</ul>
		</div>
		<div class="ws_bullets">
			<div>
			@foreach($imageslist as $l)
			<a href="" title="banner (1)"><span><img src="upload/hinhkschitiet/{{ $l->name }}" alt="banner (1)"/>{{ $l->id }}</span></a>
			@endforeach
			</div>
		</div>
		<div class="ws_shadow"></div>

	</div> --}}


</div>
	<div class="container slideimg">
		<legend>Hình ảnh khách sạn</legend>
		 <div style="margin:24px auto 24px auto" class="image-block">
			<img style="width: 258px" src="upload/hinhkhachsan/{{ $hotel->image }}" class="img-responsive" alt="Image">
		</div>

		<div id="myCarousel" class="carousel slide" data-ride="carousel" style="" >
			<!-- Indicators -->
			<ol class="carousel-indicators">
				@if(count($hotel->images()->get()) > 0)
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					@for($i = 1; $i < count($hotel->images()->get()); $i++)
						<li data-target="#myCarousel" data-slide-to="{{$i}}"></li>
					@endfor
				@endif
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				@if(count($hotel->images()->get()) > 0)
					<div class="item active">
						<img src="{{ 'upload/hinhkschitiet/' . $hotel->images()->get()[0]->name }}" style="">
					</div>
					@for($i = 1; $i < count($hotel->images()->get()); $i++)
					<div class="item">
						<img src="{{ 'upload/hinhkschitiet/' . $hotel->images()->get()[$i]->name }}" style="">
					</div>
					@endfor
				@endif
			</div>
			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>

	</div>
	<div class="container descriptionhotel">
		<legend>Giới thiệu về khách sạn:</legend>
		<p>{{ $hotel->description }}</p>

		<!-- <label for="">Giới thiệu về khách sạn</label> -->
		<!-- <h4>Giới thiệu về khách sạn</h4> -->

	</div>
	<div class="container dsloaiphong">
		<legend>Danh sách các phòng sẳn có:</legend>
		<br>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Loại Phòng</th>
					<th>Số lượng người</th>
					<th>Giá Phòng 1 đêm</th>
					{{-- <th>Số lượng phòng</th> --}}
					<th>Đặt Phòng</th>
				</tr>
			</thead>
			<tbody>
				{{-- Duyệt danh sách các loại phòng --}}
				@foreach($typeroom as $tp)
				<tr>
					<td style="font-weight: 700;color: #00adef;font-size: 16px;padding: 10px;height: auto!important;text-align: center;">
						{{$tp->name}}
						<div class="nametyperoom"> <br>
						<img src="upload/hinhloaiphong/{{ $tp->image }}" alt="" style="width: 150px; height: 150px">
						</div>
					</td>
					<td><img src="front_assets/image/people.png" alt="" class=""> x {{ $tp->maxpeople}} Người</td>
					<td>{{number_format($tp->price)}} VNĐ</td>
					<td><a href="hotel/{{$hotel->id}}/room/{{$tp->id}}/booking-room" class="btn btn-success" style="color: #942121;; font-weight: bold;">Đặt Phòng</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop
@section("css")
<link rel="stylesheet" type="text/css" href="front_assets/slide-detail-hotel/engine1/style.css" />
<link rel="stylesheet" href="front_assets/assets/css/mystyle.css">
@stop
@section("script")
<script type="text/javascript" src="front_assets/slide-detail-hotel/engine1/jquery.js"></script>
<script type="text/javascript" src="front_assets/slide-detail-hotel/engine1/wowslider.js"></script>
	<script type="text/javascript" src="front_assets/slide-detail-hotelengine1/script.js"></script>
@stop
