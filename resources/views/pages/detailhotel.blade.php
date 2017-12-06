@extends("layouts.index")
@section('title', 'chi tiết khách sạn')
@section("content")

	{{-- <div id="wowslider-container1">
		<div class="ws_images">
			<ul>
				@foreach($imageslist as $l)
					<li><img src="upload/hinhkschitiet/{{ $l->image }}" alt="banner (1)" title="banner (1)" id="wows1_{{ $l->id }}"/>
					</li>
				@endforeach
			</ul>
		</div>
		<div class="ws_bullets">
			<div>
			@foreach($imageslist as $l)
			<a href="" title="banner (1)"><span><img src="upload/hinhkschitiet/{{ $l->image }}" alt="banner (1)"/>{{ $l->id }}</span></a>
			@endforeach
			</div>
		</div>
		<div class="ws_shadow"></div>

	</div>	 --}}


</div>
	<div class="container slideimg">sadas</div>
	<div class="container descriptionhotel">
		<p>{{ $hotel->description }}</p>
	</div>
	<div class="container dsloaiphong">
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
					<td>
						{{$tp->name}}
						<div class="nametyperoom"> <br>
						<img src="upload/hinhloaiphong/" alt=""></div>
					</td>
					<td>{{ $tp->maxpeople}} Người</td>
					<td>{{$tp->price}}</td>
					<td><a href="booking-room" type="button" class="btn btn-success">Đặt Phòng</a></td>
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
