@extends("layouts.index")
@section('title', 'DS hotle theo Tỉnh')
@section("content")
<section class="mbr-section content8 cid-qAywCyYbRR" id="content8-f" data-rv-view="879">
 	<div class="container">
 		{{-- <h1 style="" class="titelhotel">KHÁCH SẠN KHU VỰC {{$district->name}} </h1> --}}
 		<p>
 			{{-- {{ $hotelByDistrict->$province->description }} --}}
 		</p>
        <div class="row">
 		<div class="col-md-3">
            <div>
                <div class="khuvuc">KHU VỰC</div>
                
                     
                            @foreach($hotelByDistrict as $h) 
                                @foreach($province as $p)
                                @foreach($district as $d)
                                @if($d->province_id == $p->id && $h->status == 1)
                                    <div class="quanhotel"><a href="list-hotel-district/{{$d->id}}">{{ $d->name }}</a></div> 
                                @endif
                                @endforeach
                                @endforeach
                            @endforeach
                        
                
            </div>

            <div>
                <div class="khuvuc">TIÊU CHUẨN</div>
                <div class="quanhotel"><a href="">kHÁCH SẠN 5 SAO</a></div>
                <div class="quanhotel"><a href="">kHÁCH SẠN 5 SAO</a></div>  
                <div class="quanhotel"><a href="">kHÁCH SẠN 5 SAO</a></div> 
                <div class="quanhotel"><a href="">kHÁCH SẠN 5 SAO</a></div>
            </div>

            <div>
                <div class="khuvuc">GIÁ</div>
                <div class="quanhotel"><a href="">Dưới 500,000VNĐ</a></div>
                <div class="quanhotel"><a href="">Từ 500.000 - 1000.000</a></div>  
                <div class="quanhotel"><a href="">Từ 1000.000 - 2000.000</a></div> 
            </div> 

            

        </div>
       
        <div class="col-md-9">
     		@foreach($hotelByDistrict as $hp)
            <div class="row infohotel" class="">
            	<div class="col-md-4">
            		<div style="" class="imghotelprovince">
            			<img src="upload/hinhkhachsan/{{ $hp->image }}" alt="" style="width: 100%;height: 100%" >
            		</div>
            	</div>
            	<div class="col-md-5">
            		<h2 class="titleprovince" style="">{{ $hp->name }}</h2>
            		@while ($hp->start)
        				<p><span class="glyphicon glyphicon-star" aria-hidden="true"></span></p>
    				@endwhile

    				@for ($i = 0; $i < $hp->star ; $i++)
        				
        				<img src="front_assets/image/christmas_star.png" alt="" class="imgstart">	
    				@endfor
            		<p>{{ $hp->address_detail }}- {{ $hp->district->name }} - {{ $hp->province->name }}</p>
            		<p>Các Dịch Vụ : </p>
                        @foreach($service_hotel as $sh)
                            @if($sh->hotel_id == $hp->id)
                                <p>{{$sh->name}}  
                                    @if($sh->price > 0)
                                        <span style="font-weight: bold;">- Giá :</span> {{ number_format($sh->price)}} VNĐ</p>
                                    @endif
                            @endif
                        @endforeach
                    
            	</div>
            	<div class="col-md-3">
                    
            		<div class="pricehotel">
                        @if(isset($hp->sale))
                			<div class="sale">-{{$hp->sale}}%</div><br>
                			<p>&ensp;</p>
        	        		<p class="price-old">{{number_format($hp->pricetb)}} đ</p>
        	        		<p class="price">{{number_format($hp->pricetb - $hp->sale/100 )}}đ</p>	
                        @else 
                        <p class="price">{{number_format($hp->pricetb)}}đ</p>
                        @endif
                    </div>
                    <a href="detailhotel/{{ $hp->id }}" class="btn btn-primary" style="color: #fff; margin: 0px; padding: 20px 25px;">Xem Phòng</a>

            	</div>
            </div>
            <div>&nbsp; &nbsp;</div>
            @endforeach
        </div>
        </div>
        {{-- <div class="col-md"></div> --}}
    </div>
</section>
	
@endsection
@section('css')
	<link rel="stylesheet" href="front_assets/assets/css/mystyle.css">
	@stop