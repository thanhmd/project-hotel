@extends("layouts.index")
@section("content")
<section class="mbr-section content8 cid-qAywCyYbRR" id="content8-f" data-rv-view="879">
 	<div class="container">
 		<h1 style="" class="titelhotel">KHÁCH SẠN ĐÀ NẴNG</h1>
 		<p>
 			Nhiều khách sạn Đà Nẵng 5 sao, 4 sao tới 3 sao trở xuống đã ra đời trong những năm qua nhằm đáp ứng nhu cầu nghỉ dưỡng ngày càng cao và phong phú của du khách. Du lịch Đà Nẵng, không khó để tìm được một khách sạn hay resort Đà Nẵng ưng ý, phù hợp ngân sách. Đà Nẵng quy tụ từ những tên tuổi nghỉ dưỡng hàng đầu thế giới như Intercontinental, Hyatt, Accor, Furama...tới những thương hiệu danh tiếng trong nước như Fusion, Vinpearl, Naman... Nếu bạn muốn trải nghiệm biển thì bãi biển Bắc Mỹ Khê, Mỹ An, Non Nước hay bán đảo Sơn Trà là những lựa chọn hàng đầu. Nếu bạn muốn tận hưởng cảnh quan vùng núi hùng vĩ thì hãy chọn khách sạn núi Bà Nà. Còn để trải nghiệm thành phố Đà Nẵng, thì bạn có thể lựa chọn các khách sạn gần sông Hàn, trung tâm thành phố. Nếu cần được tư vấn thêm khi đặt phòng khách sạn Đà Nẵng thì hãy gọi ngay cho chúng tôi qua số điện thoại 24354 hoặc email : tranthihonghue19it@gmail.com
 		</p>
 		@foreach($hotelByProvince as $hp)
        <div class="row">
        	<div class="col-md-4">
        		<div style="width: 300px; height: 300px;background-color: pink;">
        			<img src="" alt="" >
        		</div>
        	</div>
        	<div class="col-md-8">
        		<h2 class="titleprovince" style="">{{ $hp->name }}</h2>
        		<p>Số sao : {{ $hp->start }}</p>
        		<p>{{ $hp->address_detail }}</p>
        		{{-- <button type="button" class="btn btn-success">Đặt Phòng</button> --}}
        		<button type="button" class="btn btn-primary">Đặt Phòng</button>
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