@include('frontend.layout.header')
<!-- Navigation -->
@include('frontend.layout.navigation')
<main class="container">
    <div class="main-body">
        @php
            // $content=json_decode($pages);
        @endphp
      <!-- section two -->
      <section id="page">
        <div class="container">
          <div class="row">
            <!-- left box -->
            <div class="col-md-8">
              <div class="left-box">
                  <div class="page">
                      <h4 class="page-title"> Notice  </h4>
                      <div class="page-body">
                          <table class="table mt-5">
                            <thead class="bg text-light">
                              <tr>
                                <th scope="col">S.N. </th>
                                <th scope="col">Title </th>
                                <th scope="col">Download </th>
                              </tr>
                            </thead>
                                
                            <tbody>
                              {{-- @dd($datas) --}}
                            @foreach ($datas as $key => $item)
                            @php
                            @endphp
                          @php
                              $content=json_decode($item->content,true);
                          @endphp
                          @if ($content!=null)
                              <tr>
                                <td>{{$datas->firstItem() + $key }}</td>
                                <td>{{isset($content[0]['title']) ? $content[0]['title'] : ''}}</td>
                                <td class="w-5 text-center"> <a href="{{route('downloadFile',$content['RealFile'])}} "> <i class="fa-solid fa-download"></i> </a> </td>
                              </tr>
                          @endif
                          @endforeach
                            </tbody>
                          </table>
                          {{ $datas->links() }}


                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@include('frontend.layout.footer')
