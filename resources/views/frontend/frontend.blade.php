@include('frontend.layout.header')
<!-- Navigation -->
@include('frontend.layout.navigation')
{{-- === New Notice === --}}
<div id="new_notice">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="exam-content">
                    <div class="exam__title">
                        Notice:
                    </div>
                    <div class="hwrap">
                        <div class="hmove">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($pages as $item)
                                @foreach ($item->pages as $item)
                                    @if ($item->slug == 'exam')
                                        @php
                                        @endphp
                                        @if ($item->Parents != null)
                                            @foreach ($item->Parents as $item)
                                                <div class="hitem"><a
                                                        href="{{ route('exam-notice', $item->slug) }}">
                                                        {{ isset($item->title) ? $item->title : '' }}
                                                    </a></div>
                                                @if ($i == 5)
                                                    @php
                                                        break;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach

                        </div>
                    </div>
                    <div class="view-all">
                        @foreach ($pages as $item)
                            @foreach ($item->pages as $item)
                                @if ($item->slug == 'exam')
                                    <a href="{{ route('program.slug', $item->slug) }}"> View all</a>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<main class="container">
    <div class="main-body">
        <!-- Home section start -->
        <section id="home">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="left-box">
                            <!-- slider  -->

                            <div id="banner">
                                <div class="owl-carousel banner owl-theme">

                                    @foreach ($pages as $key => $value)
                                        @if ($value->title == 'Slider')
                                            @foreach ($value->pages as $item)
                                                @foreach ($item->pictures as $value)
                                                    <div class="item" style="
                                                        background-image: linear-gradient(
                                                            to right,
                                                            rgb(23 61 98 /0%),
                                                            rgb(23 61 98 / 0%)
                                                          ),
                                                          url('{{ asset('storage/upload/' . $value->url) }}');">
                                                        <div class="banner_descrption">
                                                            {!! $value->description !!}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endforeach
                                        @endif
                                    @endforeach


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="right-box">
                            <div class="organization_structure">
                                <h4 class="organization_structure_title">
                                    Staff Directories
                                </h4>
                                {{-- item 1 --}}
                                <div class="org_item">
                                    <img src="{{ asset('assets/images/profile.png') }}" alt="" class="org_img">
                                    <div class="org_body">
                                        <div class="name">भिम पराजुली </div>
                                        <div class="designation">अध्यक्ष</div>
                                        <div class="contact_no"> 9824367788 </div>
                                    </div>
                                </div>
                                {{-- item end --}}

                                {{-- item 2 --}}
                                <div class="org_item">
                                    <img src="{{ asset('assets/images/profile.png') }}" alt="" class="org_img">
                                    <div class="org_body">
                                        <div class="name"> सन्तोष पराजुली </div>
                                        <div class="designation">सदस्य सचिव</div>
                                        <div class="contact_no"> 9824367788 </div>
                                    </div>
                                </div>
                                {{-- item end --}}

                                {{-- item 3 --}}
                                <div class="org_item">
                                    <img src="{{ asset('assets/images/profile.png') }}" alt="" class="org_img">
                                    <div class="org_body">
                                        <div class="name">इन्द्र बाहादुर चौहान </div>
                                        <div class="designation">सिक्षक प्रतिनिधि</div>
                                        <div class="contact_no"> 9824367788 </div>
                                    </div>
                                </div>
                                {{-- item end --}}

                                {{-- item 3 --}}
                                <div class="org_item">
                                    <img src="{{ asset('assets/images/profile.png') }}" alt="" class="org_img">
                                    <div class="org_body">
                                        <div class="name">आशिष पाण्डे </div>
                                        <div class="designation">सदस्य</div>
                                        <div class="contact_no"> 9824367788 </div>
                                    </div>
                                </div>
                                {{-- item end --}}
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        <!-- end home section -->
        <!-- section two -->
        <section id="section1">
            <div class="container">
                <div class="row">
                    <!-- left box -->
                    <div class="col-md-8">
                        <div class="left-box">

                            <div class="voiceofpricipal">
                                <div class="notice-title-section">
                                    <h1>Voice of Principle </h1>
                                </div>
                                @foreach ($pages as $item)
                                    @foreach ($item->pages as $item)
                                        @if ($item->slug == 'principles-message')
                                            @php
                                                $content = json_decode($item->content, true);
                                                
                                            @endphp
                                            <div class="row">
                                                <div class="col-md-3">
                                                    @foreach ($item->pictures as $value)
                                                        <img src="{{ asset('storage/upload/' . $value->url) }}" alt=""
                                                            class="px-1" width="200">
                                                    @endforeach
                                                    <div class="text-center font-weight-bold">
                                                        {{ isset($content['name']) ? $content['name'] : '' }} </div>

                                                </div>
                                                <div class="col-md-9">
                                                    <div class="_message_body">
                                                        @isset($content['message'])
                                                            {!! substr($content['message'], 0, 500) !!}
                                                        @endisset
                                                    </div>
                                                    <a href="{{ route('program.slug', $item->slug) }}">
                                                        <br> Read More..</a>
                                                </div>
                                            </div>


                                            @php
                                            @endphp
                                        @endif
                                    @endforeach
                                @endforeach


                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="right-box">
                            <div class="facebook-page">
                                <!-- <h4> Facebook Page</h4> -->
                                <div class="fb-page"
                                    data-href="https://www.facebook.com/Adarsha-Secondary-School-Biratnagar-7-Admin-104689884201666/"
                                    data-tabs="" data-width="" data-height="200" data-small-header="false"
                                    data-adapt-container-width="true" data-hide-cover="false"
                                    data-show-facepile="false">
                                    <blockquote
                                        cite="https://www.facebook.com/Adarsha-Secondary-School-Biratnagar-7-Admin-104689884201666/"
                                        class="fb-xfbml-parse-ignore">
                                        <a
                                            href="https://www.facebook.com/Adarsha-Secondary-School-Biratnagar-7-Admin-104689884201666/">Adarsha
                                            Secondary School Biratnagar-7 Admin</a>
                                    </blockquote>
                                </div>
                            </div>
                            {{-- @include('frontend.layout.gallery') --}}

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<!-- Footer Section  -->
@include('frontend.layout.footer')
