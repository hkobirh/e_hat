<section class="intro-section">
    <div class="owl-carousel owl-theme owl-nav-inner owl-dot-inner owl-nav-lg animation-slider gutter-no row cols-1"
         data-owl-options="{
                    'nav': false,
                    'dots': true,
                    'items': 1,
                    'responsive': {
                        '1600': {
                            'nav': true,
                            'dots': false
                        }
                    }
                }">
        @foreach ($slider as $item)

            <div class="banner banner-fixed intro-slide intro-slide1"
                 style="background-image: url({{asset('storage/uploads/sliders/'.$item->background_image)}}); background-color: #ebeef2;">
                <div class="container">
                    <div class="banner-content y-50 text-right">
                        <h5 class="banner-subtitle font-weight-normal text-default ls-50 lh-1 mb-2 slide-animate"
                            data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.2s'
                                }">
                            Custom <span class="p-relative d-inline-block">Men’s</span>
                        </h5>
                        <h3 class="banner-title text-light font-weight-bolder ls-25 lh-1 slide-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.4s'
                                }">
                            RUNNING SHOES
                        </h3>
                        <p class="font-weight-normal text-default slide-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.6s'
                                }">
                            Sale up to <span class="font-weight-bolder text-secondary">30% OFF</span>
                        </p>

                        <a href="#" class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                           data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'duration': '1s',
                                    'delay': '.8s'
                                }">SHOP NOW<i class="w-icon-long-arrow-right"></i></a>

                    </div>
                    <!-- End of .banner-content -->
                </div>
                <!-- End of .container -->
            </div>
    @endforeach
    <!-- End of .intro-slide3 -->
    </div>
    <!-- End of .owl-carousel -->
</section>
<!-- End of .intro-section -->
