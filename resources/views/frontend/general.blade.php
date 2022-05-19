@include('frontend.layout.header')
<!-- Navigation -->
@include('frontend.layout.navigation')
<main class="container">
    <div class="main-body">

        @php
            $content = json_decode($program->content, true);
            // dd($program);
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
                                <div class="page-body">
                                    @isset($content[0]['title'])
                                        <p>{!! $content[0]['title'] !!}</p>
                                    @endisset
                                    <table class="table mt-5">
                                        <thead class="bg text-light">
                                            <tr>
                                                <th scope="col">S.N.</th>
                                                <th scope="col">Title </th>
                                                <th scope="col">Download </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($program->Parents != null)
                                                @foreach ($program->Parents as $key => $item)
                                                    @php
                                                        $data = json_decode($item->content, true);
                                                    @endphp
                                                    <tr>
                                                        <td class="w-5">{{ $key + 1 }}</td>
                                                        <td><a href="{{ route('general-notice', $item->slug) }}">
                                                                {!! $data[0]['title'] !!} </a></td>
                                                        @php
                                                            $content = json_decode($item->content, true);
                                                        @endphp

                                                        <td class="w-5 text-center"> <a
                                                                href="{{ route('downloadFile', $content['RealFile']) }} ">
                                                                <i class="fa-solid fa-download"></i> </a> </td>

                                                    </tr>
                                                @endforeach
                                            @endif




                                        </tbody>
                                    </table>
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
