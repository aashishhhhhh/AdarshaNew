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
                                @php
                                    $content = json_decode($program->content);
                                @endphp
                                <h4 class="page-title"> {{ isset($program->title) ? $program->title : '' }} </h4>
                                <div class="page-body">
                                    <p>
                                        @isset($content->description)
                                            {!! $content->description !!}
                                        @endisset
                                    </p>
                                    <div class="sub-photo-gallery row">
                                        <!-- gallery item -->
                                        <div class="sub_gallery_item">
                                            @if ($program->pictures != null)

                                                @foreach ($program->pictures as $item)
                                                    @php
                                                        
                                                    @endphp
                                                    <div class="sub_gallery_item_img">
                                                        <a class="gimg"
                                                            href="{{ asset('storage/upload/' . $item->url) }}"><img
                                                                src="{{ asset('storage/upload/' . $item->url) }}"
                                                                alt="Gallery Image"></a>
                                                    </div>
                                                @endforeach
                                            @endif


                                            {{-- <div class="sub_gallery_item_img">
                                <a class="gimg" href="assets/images/banner001.jpg"><img src="assets/images/banner001.jpg" alt="Gallery Image"></a> 
                              </div>

                              <div class="sub_gallery_item_img">
                                <a class="gimg" href="assets/images/banner001.jpg"><img src="assets/images/banner001.jpg" alt="Gallery Image"></a> 
                              </div> --}}


                                        </div>

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
