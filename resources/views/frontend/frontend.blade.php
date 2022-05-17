@include('frontend.layout.header')
    <!-- Navigation -->
   @include('frontend.layout.navigation')
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
                        @if ($value->title=='Slider')
                        @foreach ($value->pages as $item)
                        @foreach ($item->pictures as $value)
                      <div
                        class="item"
                        style="
                          background-image: linear-gradient(
                              to right,
                              rgb(23 61 98 /0%),
                              rgb(23 61 98 / 0%)
                            ),
                            url('{{ asset('storage/upload/' .$value->url)}}');
                        "
                      ></div>
                      @endforeach
                      @endforeach
                      @endif
                      @endforeach

                  
                    </div>
                  </div>
                </div>
              </div>

              @foreach ($pages as $item)
              @foreach ($item->pages as $item)
             
              @if ($item->slug=='principles-message')
              @php
                    $content = json_decode($item->content,true);
                    
              @endphp
              <div class="col-md-4">
                <div class="right-box">
                  <div class="message_from">
                    <h1>Mesage from Principal</h1>
                    <div class="message_body">
                      <div class="image-outer">
                        <div class="image">
                         
                         @foreach ($item->pictures as $value)
                          <img src="{{ asset('storage/upload/' .$value->url)}}" alt=""
                           class="px-1" width="100">
                        @endforeach
                        </div>
                      </div>
                      <p class="limit-200">
                        {{isset($content['name']) ? $content['name'] : ''}}
                      </p>
                      @php
                      @endphp
                      <a href="{{route('program.slug',$item->slug)}}">@isset($content['message'])
                          {!!substr($content['message'], 0, 300)!!}
                      @endisset <br> Read More..</a>
                    </div>
                  </div>
                </div>
              </div>
              @endif

              @endforeach
              @endforeach

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
                                    
                  <div class="exam-content">
                    <div class="exam__title">
                      Exam Notice: 
                    </div>
                    <div class="hwrap">
                      <div class="hmove">
                        @php
                            $i=0;
                        @endphp
                        @foreach ($pages as $item)
                      
                        @foreach ($item->pages as $item)
                          @if ($item->slug=='exam')
                          @php
                          @endphp
                            @if ($item->Parents!=null)
                             @foreach ($item->Parents as $item)
                        <div class="hitem"><a href="{{route('exam-notice',$item->slug)}}"> {{isset($item->title) ? $item->title : ''}}
                        </a></div>
                        @if ($i==5)
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
                        @if ($item->slug=='exam')
                      
                    <a href="{{route('program.slug',$item->slug)}}"> View all</a>
                    @endif
                    @endforeach
                   @endforeach
                    </div>
                  </div>
                  <div class="notice">
                    <div class="notice-title-section">
                      <h1>Notice Board</h1>
                      @php
                        $slug='general';
                      @endphp
                      <a href="{{route('program.slug',$slug)}}"> View all</a>
                    </div>
                    <!-- .itme -->
                    @foreach ($pages as $item)
                       @foreach ($item->pages as $item)
                       
                         @if ($item->slug=='general')
                        
                           @if ($item->Parents!=null)
                           @php
                             $max=count($item->Parents);
                           @endphp
                            @foreach ($item->Parents as $item)
                                    @php
                                        $content = json_decode($item->content,true);
                                    @endphp
                                    <div class="notice_item">
                                      <div class="info">
                                        <h4>
                                          <a href="{{route('general-notice',$item->slug)}}"> {{isset($item->title) ? $item->title : ''}}
                                          </a>
                                        </h4>
                                        <p>
                                          <i class="fa-solid fa-clock"></i>
                                      
                                        <span> {{isset($content[0]['date']) ? $content[0]['date'] : ''}}  </span>
                                        </p>
                                      </div>
                                      <div class="img_box">
                                        <span> <i class="fa-solid fa-angle-right"></i> </span>
                                      </div>
                                    </div>

                          @endforeach
                        @endif
                       @endif
                     @endforeach
                    @endforeach
                    <!-- .itme -->
                  
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="right-box">
                  <div class="facebook-page">
                    <!-- <h4> Facebook Page</h4> -->
                    <div
                      class="fb-page"
                      data-href="https://www.facebook.com/Adarsha-Secondary-School-Biratnagar-7-Admin-104689884201666/"
                      data-tabs=""
                      data-width=""
                      data-height="200"
                      data-small-header="false"
                      data-adapt-container-width="true"
                      data-hide-cover="false"
                      data-show-facepile="false"
                    >
                      <blockquote
                        cite="https://www.facebook.com/Adarsha-Secondary-School-Biratnagar-7-Admin-104689884201666/"
                        class="fb-xfbml-parse-ignore"
                      >
                        <a
                          href="https://www.facebook.com/Adarsha-Secondary-School-Biratnagar-7-Admin-104689884201666/"
                          >Adarsha Secondary School Biratnagar-7 Admin</a
                        >
                      </blockquote>
                    </div>
                  </div>
                  @include('frontend.layout.gallery')
                  
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
    <!-- Footer Section  -->
    @include('frontend.layout.footer')
   
