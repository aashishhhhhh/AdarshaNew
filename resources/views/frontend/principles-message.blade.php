@include('frontend.layout.header')
<!-- Navigation -->
@include('frontend.layout.navigation')
<main class="container">
    <div class="main-body">
        @php
            // dd($program);
            $content = json_decode($program->content);
            //    dd($content);
        @endphp
        <!-- section two -->
        <section id="page">
            <div class="container">
                <div class="row">
                    <!-- left box -->
                    <div class="col-md-8">
                        <div class="left-box">
                            <div class="page">
                                <h4 class="page-title"> {{ isset($program->title) ? $program->title : '' }} </h4>
                                <div>
                                    @foreach ($program->pictures as $item)
                                        <img src="{{ asset('storage/upload/' . $item->url) }}" alt=""
                                            class="px-1" width="100">
                                    @endforeach

                                </div>
                                <div class="page-heading">
                                    <p>{{ $content->name }},</p>
                                </div>
                                <div class="page-body">
                                    <p> {!! $content->message !!}</p>
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
