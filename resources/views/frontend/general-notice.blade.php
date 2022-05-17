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
                      <h4 class="page-title"> General </h4>
                      <div class="page-body">
                          {{-- <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.</p>   --}}

                          <table class="table mt-5">
                            <thead class="bg text-light">
                              <tr>
                                <th scope="col">S.N.</th>
                                <th scope="col">Title </th>
                                <th scope="col">Download </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($pages as $item)
                              @foreach ($item->pages as $item)
                              @if ($item->page_type_id==5)
                              @if ($item->Parents!=null)
                              @foreach ($item->Parents as $key=> $item)
                              @php
                                  $content = json_decode($item->content,true);
                                  // dd($content);
                              @endphp
                              <tr>
                                <td class="w-5">{{$key+1}}</td>
                                <td><a href="{{route('single-notice',$item->slug)}}"> {{isset($item->title) ? $item->title : ''}}  </a></td>
                                <td class="w-5 text-center"> <a href="{{route('downloadFile',$content['RealFile'])}} "> <i class="fa-solid fa-download"></i> </a> </td>
                              </tr>
                              @endforeach
                              @endif
                              @endif
                              @endforeach
                              @endforeach
                             
                            </tbody>
                          </table>
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="right-box">
                <div class="facebook-page">
                  <!-- <h4> Facebook Page</h4> -->
                  <div class="fb-page" data-href="https://www.facebook.com/Adarsha-Secondary-School-Biratnagar-7-Admin-104689884201666/" data-tabs="" data-width="" data-height="200" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/Adarsha-Secondary-School-Biratnagar-7-Admin-104689884201666/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Adarsha-Secondary-School-Biratnagar-7-Admin-104689884201666/">Adarsha Secondary School Biratnagar-7 Admin</a></blockquote></div>
                </div>
                <div class="photo-gallery">
                  <h4> Photo Gallery  </h4>
                  <!-- <div class="gallery"> -->
                    <div class="owl-carousel gallery owl-theme">
                      <div class="item">
                        <a href="{{  url('/program/photo-gallery') }}"><img src="{{ asset("assets/images/banner002.jpg") }}" alt="Gallery Image"></a>
                      </div>
                      <div class="item">
                        <a  href="{{  url('/program/photo-gallery') }}"><img src="{{ asset("assets/images/banner002.jpg") }}" alt="Gallery Image"></a>
                      </div>
                    </div>
                  <!-- </div> -->
                </div>
                <div class="video-gallery">
                  <h4> Video Gallery </h4>
                  <iframe width="100%" height="200" src="https://www.youtube.com/embed/lZ3p8qYvZws">
                  </iframe>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  @include('frontend.layout.footer')