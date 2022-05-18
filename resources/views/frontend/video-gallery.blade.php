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
                                <h4 class="page-title">Video Gallery</h4>
                                <div class="page-body">
                                    <p>

                                    </p>
                                    <div class="sub-video-gallery row">
                                        <!-- gallery item -->
                                        <div class="video_gallery_item">
                                            @php
                                                $content = json_decode($program->parents);
                                                $data = json_decode($content[0]->content)[1];
                                            @endphp
                                            @foreach ($program->parents as $item)
                                                @php
                                                    $content = json_decode($item->content);
                                                @endphp
                                                {!! $content[1] !!}
                                            @endforeach


                                            {{-- <div class="sub_video_gallery_item_img">
                          <a class="gimg" href="assets/images/banner001.jpg"
                            ><img
                              src="assets/images/banner001.jpg"
                              alt="Gallery Image"
                          /></a>
                        </div>

                        <div class="sub_video_gallery_item_img">
                          <a class="gimg" href="assets/images/banner001.jpg"
                            ><img
                              src="assets/images/banner001.jpg"
                              alt="Gallery Image"
                          /></a>
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
