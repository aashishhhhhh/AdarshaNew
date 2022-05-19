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
                            @if (session()->has('msg'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ session('msg') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="page">
                                <h4 class="page-title"> Contact </h4>
                                <div class="page-body">
                                    <p> Contact us by filling up the form below</p>

                                    <form action="{{ route('feedback') }}" class="feedback" method="POST">
                                        @csrf
                                        <br>
                                        Full name: <br>
                                        <input class="form-contol" type="text" name="name"><br>
                                        <br>

                                        Your email: <br>
                                        <input type="text" name="email"><br>
                                        <br>

                                        Your comments: <br>
                                        <textarea name="feedback" rows="15" cols="50"></textarea><br><br>

                                        <input type="submit" value="Submit">

                                    </form>
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
