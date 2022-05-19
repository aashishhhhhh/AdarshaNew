
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
              <div class="col-md-9">
                <div class="left-box">
                  <div class="page">
                    <h4 class="page-title">Article</h4>
                    <div class="page-body">
                      <!-- Blog Post -->
                                            @php 
                                                $content= json_decode($latestArticle->content);
                                                
                                            @endphp
                                              <div class="article_item first">
                                                <img src="assets/images/banner002.jpg" alt="" />
                                                <div class="article_item_header">
                                                  <a class="title" href="{{route('single-article',$latestArticle->slug)}}">
                                                    <h1>{{$latestArticle->title}}</h1>
                                                  </a>
                                                  <div class="article_detail">
                                                    <div class="auth-detail">
                                                      <img
                                                        src="assets/images/logo.jpg"
                                                        class="auth-img"
                                                        alt=""
                                                      />
                                                      <span class="auth-name">
                                                            {{$content->writer_name}}
                                                      </span>
                                                    </div>
                                                    <div class="art-date">
                                                      <span>{{$content->article_date}}</span>
                                                    </div>
                                                  </div>
                                                </div>
                                             </div>
                            
                       
                       
                      
                      <!-- end -->
                      
                      
                    
                      <div class="row mt-4">
                          @foreach($allArticle as $key=> $value)
                         @if($key!=0)
                         @php
                            $content= json_decode($value->content);
                         @endphp
                            <div class="col-md-4">
                              <div class="article_item2">
                                <img src="{{ asset('storage/upload/' .$content->article_cover_image)}}" alt="" />
                                <div class="article_item2-des">
                                  <h2 class="articl_item_title2">
                                    <a href="{{route('single-article',$value->slug)}}">{{$content->article_title}}  </a>
                                  </h2>
                                  <div class="article_detail2">
                                    <div class="auth-detail2">
                                      <img
                                        src="{{ asset('storage/upload/' .$content->writer_image)}}"
                                        class="auth-img2"
                                        alt=""
                                      />
                                      <span class="auth-name2"> {{$content->writer_name}}</span>
                                    </div>
                                    <div class="art-date2">
                                      <span>Date: {{$content->article_date}}</span>
                                    </div>
                                  </div>
                                  <div class="des">
                                 
                                   {!! Str::limit($content->article_content, 50)!!}
                                  </div>
                                </div>
                              </div>
                            </div>
                       @endif
                      @endforeach
                      </div>
                    </div>
                  </div>
                </div>

                <div style="text-align: center">
                  {{$allArticle->links()}}
                  </div>

              </div>
              <div class="col-md-3">
                @include('frontend.layout.sidebar')
              </div>
            </div>
          </div>
        </section>
      </div>
    </main>
  @include('frontend.layout.footer')
