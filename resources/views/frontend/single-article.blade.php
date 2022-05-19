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
                            @php
                                $content = json_decode($article->content);
                                
                            @endphp
                            <div class="page">
                                <h4 class="page-title">{{ $article->title }}</h4>
                                <div class="page-body">
                                    <!-- Blog Post -->
                                    <div class="single-article">
                                        <img src="{{ asset('storage/upload/' . $content->article_cover_image) }}"
                                            class="img-fluid" alt="" />
                                        <div class="single-article-detail">
                                            <div class="auth-detail">
                                                <img src="{{ asset('storage/upload/' . $content->writer_image) }}"
                                                    alt="" />
                                                <div>
                                                    {{ $content->writer_name }}
                                                    <br />
                                                    <span> {!! $content->writer_description !!} </span>
                                                </div>
                                            </div>
                                            <div class="date">
                                                Date :-
                                                <span>{{ $content->article_date }}</span>
                                            </div>
                                        </div>
                                        <div class="single-article-body mt-4">
                                            <p>
                                                {!! $content->article_content !!}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="fb-comments"
                                        data-href="https://adarshaschool.edu.np/website/public/index.php/article/fifth"
                                        data-width="" data-numposts="10"></div>
                                    <!-- end -->
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
