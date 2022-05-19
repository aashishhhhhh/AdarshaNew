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
                                <h4 class="page-title"> Alumnis </h4>
                                <br>
                                <div class="page-body">

                                    <div class="row" id="team">
                                        <!-- Team member -->
                                        @foreach ($datas as $item)
                                            @php
                                                $data = json_decode($item->content);
                                            @endphp
                                            <div class="col-xs-12 col-sm-6 col-md-4">
                                                <div class="image-flip">
                                                    <div class="mainflip flip-0">
                                                        <div class="frontside">
                                                            <div class="card">
                                                                <div class="card-body text-center">
                                                                    <p><img class=" img-fluid"
                                                                            src="{{ asset('storage/upload/' . $data->image) }}"
                                                                            alt="card image"></p>
                                                                    <h4 class="card-title">
                                                                        {{ isset($data->name) ? $data->name : '' }}
                                                                    </h4>
                                                                    <p class="card-text">
                                                                        {{ isset($data->designation) ? $data->designation : '' }}
                                                                    </p>
                                                    
                                                                    {{-- <a href="https://www.fiverr.com/share/qb8D02"
                                                                        class="btn btn-primary btn-sm"><i
                                                                            class="fa fa-plus"></i></a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="backside">
                                                            <div class="card">
                                                                <div class="card-body text-center mt-4">
                                                                    <h4 class="card-title">
                                                                        {{ isset($data->name) ? $data->name : '' }}
                                                                    </h4>
                                                                    <p class="card-text">
                                                                        {{ isset($data->designation) ? $data->designation : '' }}
                                                                    </p>
                                                                     <p class="card-text">
                                                                        {{ isset($data->contact_no) ? $data->contact_no : '' }}
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @isset($datas)
                        {{$datas->links()}}
                        @endisset
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


