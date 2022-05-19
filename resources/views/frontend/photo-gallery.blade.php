@include('frontend.layout.header')
<!-- Navigation -->
@include('frontend.layout.navigation')

<main class="container">
    <div class="main-body">

        <!-- section two -->
        <section id="page">
            <div class="container">
                <div class="row">
                    <!-- left box -->
                    <div class="col-md-8">
                        <div class="left-box">
                            <div class="page">
                                <h4 class="page-title"> Gallery </h4>
                                <div class="page-body">
                                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum
                                        omnis? Consectetur, asperiores ducimus.</p>
                                    <div class="photo-gallery row">

                                        @foreach ($program->Parents as $item)
                                            @php
                                                //  dd($item);
                                            @endphp
                                            @foreach ($item->pictures as $value)
                                                @php
                                                    //  dd($value);
                                                @endphp
                                                <!-- gallery item -->
                                                <div class="col-md-5 text-center">
                                                    <div class="gallery_item">
                                                        <div class="gallery_img_box">
                                                            <a href="{{ route('photo-gallery', $item->slug) }}"
                                                                class="features_image">
                                                                <img src="{{ asset('storage/upload/' . $value->url) }}"
                                                                    alt="" class="px-1" width="100">
                                                            </a>
                                                        </div>
                                                        <h5> {{ $item->title }} </h5>
                                                        <p> {{ count($item->pictures) }} Photos</p>
                                                    </div>
                                                </div>
                                                @php
                                                    break;
                                                @endphp
                                            @endforeach
                                        @endforeach

                                        <!-- gallery item -->
                                        {{-- <div class="col-md-5 text-center">
                              <div class="gallery_item">
                                <div class="gallery_img_box">
                                  <a href="sub-gallery.html" class="features_image">
                                  
                                    <img src="assets/images/+2.jpg" class="img-fluid" alt="">
                                    
                                  </a>
                                </div>
                                <h5> Gallery Name  </h5>
                              <p> 10 Photos</p>
                              </div>  
                            </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @include('frontend.layout.sidebar')

                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@include('frontend.layout.footer')
