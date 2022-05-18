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
                                <h4 class="page-title"> Result </h4>
                                <div class="page-body">
                                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum
                                        omnis? Consectetur, asperiores ducimus.</p>
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
                                                @php
                                                @endphp
                                                @if ($item->title == 'RESULT')
                                                    @foreach ($item->pages as $key => $value)
                                                        @php
                                                            $content = json_decode($value->content, true);
                                                            
                                                        @endphp
                                                        <tr>
                                                            <td class="w-5">{{ $key + 1 }}</td>
                                                            <td>{{ isset($content[0]['title']) ? $content[0]['title'] : '' }}
                                                            </td>
                                                            <td class="w-5 text-center"> <a
                                                                    href="{{ route('downloadFile', $content['RealFile']) }} ">
                                                                    <i class="fa-solid fa-download"></i> </a> </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach


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
