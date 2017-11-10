@extends("layouts.index")
@section("content")
{{-- <section class="header1 cid-qAywgz60FV mbr-parallax-background" id="header1-b" data-rv-view="828">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">
                    FULL WIDTH INTRO
                </h1>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">
                    Beautiful mobile websites
                </h3>
                <p class="mbr-text align-center pb-3 mbr-fonts-style display-5">
                    Full width intro with adjustable height, background image and a color overlay. Click any text to edit or style it.
                </p>
                <div class="mbr-section-btn align-center">
                    <a class="btn btn-md btn-primary display-4" href="https://mobirise.com">
                        <span class="mbr-iconfont mbri-file"></span>LEARN MORE</a>
                    <a class="btn btn-md btn-white-outline display-4" href="https://mobirise.com">
                        <span class="mbr-iconfont mbri-idea"></span>LIVE DEMO</a>
                </div>
            </div>
        </div>
    </div>
</section>
 --}}
<section class="mbr-gallery mbr-slider-carousel cid-qAywq4XQca" id="gallery1-c" data-rv-view="831">
    <div class="container">
        <div>
        	<div class="mbr-gallery-row">
        		<div class="mbr-gallery-layout-default">
        			<div>
        				<div>
        					@foreach($province as $pr)
	        					<div class="mbr-gallery-item mbr-gallery-item--p1" data-video-url="false" data-tags="Awesome">
	        						<div href="#lb-gallery1-c" data-slide-to="0" data-toggle="modal">
	        							<img src="upload/hinhtinh/{{ $pr->image }}" alt=""><span class="icon-focus"></span><span class="mbr-gallery-title mbr-fonts-style display-7"><a href="listhotel/{{ $pr->id }}">{{ $pr->name }}</a></span>
	        						</div>
	        					</div>
        					@endforeach
        				</div>
        			</div>
        			<div class="clearfix"></div>
        		</div>
        	</div><!-- Lightbox -->
        	{{-- <div data-app-prevent-settings="" class="mbr-slider modal fade carousel slide" tabindex="-1" data-keyboard="true" data-interval="false" id="lb-gallery1-c">
        		<div class="modal-dialog">
        			<div class="modal-content">
        				<div class="modal-body">
        					<div class="carousel-inner">
        						<div class="carousel-item active">
        							<img src="front_assets/assets/images/gallery00.jpg" alt="">
        						</div>
        						<div class="carousel-item">
        							<img src="front_assets/assets/images/gallery01.jpg" alt="">
        						</div>
        						<div class="carousel-item">
        							<img src="front_assets/assets/images/gallery02.jpg" alt="">
        						</div>
        						<div class="carousel-item">
        							<img src="front_assets/assets/images/gallery03.jpg" alt="">
        						</div>
        						<div class="carousel-item">
        							<img src="front_assets/assets/images/gallery04.jpg" alt="">
        						</div>
        						<div class="carousel-item">
        							<img src="front_assets/assets/images/gallery05.jpg" alt="">
        						</div>
        						<div class="carousel-item">
        							<img src="front_assets/assets/images/gallery06.jpg" alt="">
        						</div>
        						<div class="carousel-item">
        							<img src="front_assets/assets/images/gallery07.jpg" alt="">
        						</div>
        					</div>
        					<a class="carousel-control carousel-control-prev" role="button" data-slide="prev" href="#lb-gallery1-c"><span class="mbri-left mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Previous</span>
        					</a>
        					<a class="carousel-control carousel-control-next" role="button" data-slide="next" href="#lb-gallery1-c"><span class="mbri-right mbr-iconfont" aria-hidden="true"></span><span class="sr-only">Next</span>
        					</a>
        					<a class="close" href="#" role="button" data-dismiss="modal"><span class="sr-only">Close</span>
        					</a>
        				</div>
        			</div>
        		</div>
        	</div> --}}
        </div>
    </div>
</section>



<section class="mbr-section article content11 cid-qAywAvQ1hz" id="content11-e" data-rv-view="878">
     

    <div class="container">
        <div class="media-container-row">
            <div class="mbr-text counter-container col-12 col-md-8 mbr-fonts-style display-7">
                <ol>
                    <li><strong>MOBILE FRIENDLY</strong> - no special actions required, all sites you make with Mobirise are mobile-friendly. You don't have to create a special mobile version of your site, it will adapt automagically. <a href="https://mobirise.com/">Try it now!</a></li>
                    <li><strong>EASY AND SIMPLE</strong> - cut down the development time with drag-and-drop website builder. Drop the blocks into the page, edit content inline and publish - no technical skills required. <a href="https://mobirise.com/">Try it now!</a></li>
                    <li><strong>UNIQUE STYLES</strong> - choose from the large selection of latest pre-made blocks - full-screen intro, bootstrap carousel, content slider, responsive image gallery with lightbox, parallax scrolling, video backgrounds, hamburger menu, sticky header and more. <a href="https://mobirise.com/">Try it now!</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section content8 cid-qAywCyYbRR" id="content8-f" data-rv-view="879">

    

    <div class="container">
        <div class="media-container-row title">
            <div class="col-12 col-md-8">
                <div class="mbr-section-btn align-center">
                    <a class="btn btn-primary display-4" href="https://mobirise.com">LEARN MORE</a>
                    <a class="btn btn-black-outline display-4" href="https://mobirise.com">LIVE DEMO</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features3 cid-qAywEk54Xf" id="features3-g" data-rv-view="880">

    

    
    <div class="container">
        <div class="media-container-row">
            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="front_assets/assets/images/01.jpg" alt="Mobirise" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-7">
                            No Coding
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Mobirise is an easy website builder - just drop site elements to your page, add content and style it to look the way you like.
                        </p>
                    </div>
                    <div class="mbr-section-btn text-center">
                        <a href="https://mobirise.com" class="btn btn-primary display-4">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="front_assets/assets/images/02.jpg" alt="Mobirise" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-7">
                            Mobile Friendly
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            All sites you make with Mobirise are mobile-friendly. You don't have to create a special mobile version of your site.
                        </p>
                    </div>
                    <div class="mbr-section-btn text-center">
                        <a href="https://mobirise.com" class="btn btn-primary display-4">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="front_assets/assets/images/03.jpg" alt="Mobirise" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title mbr-fonts-style display-7">
                            Unique Styles
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Mobirise offers many site blocks in several themes, and though these blocks are pre-made, they are flexible.
                        </p>
                    </div>
                    <div class="mbr-section-btn text-center">
                        <a href="https://mobirise.com" class="btn btn-primary display-4">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</section>

<section class="features3 cid-qAywFfIpdd" id="features17-h" data-rv-view="883">
    
    

    
    <div class="container-fluid">
        <div class="media-container-row">
            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="front_assets/assets/images/01.jpg" alt="Mobirise" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            No Coding
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Mobirise is an easy website builder - just drop site elements to your page, add content and style it to look the way you like.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="front_assets/assets/images/02.jpg" alt="Mobirise" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            Mobile Friendly
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            All sites you make with Mobirise are mobile-friendly. You don't have to create a special mobile version of your site.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="front_assets/assets/images/03.jpg" alt="Mobirise" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            Unique Styles
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Mobirise offers many site blocks in several themes, and though these blocks are pre-made, they are flexible.
                        </p>
                    </div>
                </div>
            </div>

            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="front_assets/assets/images/04.jpg" alt="Mobirise" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            Unlimited Sites
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                           Mobirise gives you the freedom to develop as many websites as you like given the fact that it is a desktop app.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="front_assets/assets/images/01.jpg" alt="Mobirise" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            No Coding
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            Mobirise is an easy website builder - just drop site elements to your page, add content and style it to look the way you like.
                        </p>
                    </div>
                </div>
            </div>
            <div class="card p-3 col-12 col-md-6 col-lg-2">
                <div class="card-wrapper">
                    <div class="card-img">
                        <img src="front_assets/assets/images/02.jpg" alt="Mobirise" media-simple="true">
                    </div>
                    <div class="card-box">
                        <h4 class="card-title pb-3 mbr-fonts-style display-7">
                            Mobile Friendly
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            All sites you make with Mobirise are mobile-friendly. You don't have to create a special mobile version of your site.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection