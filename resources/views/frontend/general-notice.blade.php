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
                                    {{-- <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis cumque earum omnis? Consectetur, asperiores ducimus.</p> --}}

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
                                                    @if ($item->page_type_id == 5)
                                                        @if ($item->Parents != null)
                                                            @foreach ($item->Parents as $key => $item)
                                                                @php
                                                                    $content = json_decode($item->content, true);
                                                                    // dd($content);
                                                                @endphp
                                                                <tr>
                                                                    <td class="w-5">{{ $key + 1 }}</td>
                                                                    <td><a
                                                                            href="{{ route('single-notice', $item->slug) }}">
                                                                            {{ isset($item->title) ? $item->title : '' }}
                                                                        </a></td>
                                                                    <td class="w-5 text-center"> <a
                                                                            href="{{ route('downloadFile', $content['RealFile']) }} ">
                                                                            <i class="fa-solid fa-download"></i> </a>
                                                                    </td>
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
                        @include('frontend.layout.sidebar')

                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@include('frontend.layout.footer')
