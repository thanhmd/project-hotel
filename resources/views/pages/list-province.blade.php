@extends("layouts.index")
@section('title', 'DS hotle theo Tỉnh')
@section("content")
<section class="mbr-section content8 cid-qAywCyYbRR" id="content8-f" data-rv-view="879">
 	<div class="container">
 		<h1 style="" class="titelhotel">KHÁCH SẠN {{ $province->name }}</h1>
 		<p>
 			{{ $province->description }}
 		</p>
 		
 		@foreach($hotelByProvince as $hp)
        <div class="row infohotel" class="">
        	<div class="col-md-4">
        		<div style="" class="imghotelprovince">
        			<img src="upload/hinhkhachsan/{{ $hp->image }}" alt="" style="width: 100%;height: 100%" >
        		</div>
        	</div>
        	<div class="col-md-5">
        		<h2 class="titleprovince" style="">{{ $hp->name }}</h2>
        		{{-- <p>Số sao : {{ $hp->start }}</p> --}}
        		{{-- @while ($hp->start)
    				<p><span class="glyphicon glyphicon-star" aria-hidden="true"></span></p>
				@endwhile --}}

				@for ($i = 0; $i < $hp->start ; $i++)
    				
    				
    				<img src="front_assets/image/christmas_star.png" alt="" class="imgstart">
    				
				@endfor
        		<p>{{ $hp->address_detail }}</p>
        		{{-- <button type="button" class="btn btn-success">Đặt Phòng</button> --}}
        		{{--  --}}
        	</div>
        	<div class="col-md-3">
        		{{-- <span >-40%</span> <br> --}}
        		<div class="pricehotel">
        			<div class="sale">-40%</div><br>
        			<p>&ensp;</p>
	        		<p class="price-old">1,800,000 đ</p>
	        		<p class="price">1,331,000 đ</p>
	        		</div>
        		<a href="detailhotel/{{ $hp->id }}" class="btn btn-primary" style="color: #fff">Xem Phòng</a>
        	</div>
        </div>
        <div>&nbsp; &nbsp;</div>
        @endforeach
    </div>
</section>
	
@endsection
@section('css')
	<link rel="stylesheet" href="front_assets/assets/css/mystyle.css">
	@stop