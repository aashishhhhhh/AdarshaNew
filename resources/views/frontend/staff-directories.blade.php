@include('frontend.layout.header')
    <!-- Navigation -->
   @include('frontend.layout.navigation')
<main class="container">
    <div class="main-body">
        @php
        

           $content=json_decode($program->content);
          

        
        @endphp
      <!-- section two -->
      <section id="page">
        <div class="container">
          <div class="row">
            <!-- left box -->
            <div class="col-md-8">
              <div class="left-box">
                  <div class="page">
                      <h4 class="page-title"> {{isset($program->title) ? $program->title : ''}} </h4>
                      <div class="page-body">
                          <p> {!!$content->content!!}</p>
                          <table class="table mt-5">
                              <thead class="bg text-light">
                                <tr>
                                  <th scope="col">Photo</th>
                                  <th scope="col">Name </th>
                                  <th scope="col">Designation</th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach ($program->Parents as $item)
                                    @php
                                        $data=json_decode($item->content);
                                    @endphp
                                <tr>
                                  {{-- {{isset($item->pictures[0])) ? $item->pictures[0]) : ''}} --}}
                                  <td><img src="{{ asset('storage/upload/' . $item->pictures[0]->url) }}" alt=""
                                    class="px-1" width="100"></td>
                                  <td>{{isset($data->name) ? $data->name : ''}}</td>
                                  <td>{{isset($data->Designation) ? $data->Designation : ''}}</td>
                                </tr>
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
