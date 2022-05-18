<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3 footer">
                <h4>Address </h4>
                <div class="footer_body">
                    @foreach ($pages as $key => $page)
                        @if ($page->slug == 'school-address')
                            @foreach ($page->pages as $key => $value)
                                @php
                                    $content = json_decode($value->content);
                                @endphp
                                <p>
                                    <span>
                                        {{ $content->name }}
                                        <br>
                                        Address: {{ $content->address }}
                                        <br>
                                        Post box no: {{ $content->post_box }}

                                    </span>
                                </p>
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <div class="footer_body footer_social">
                    <ul>
                        <li>
                            <a href="" target="_blank">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" target="_blank">
                                <i class="fa-brands fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 footer quick_links">
                <h4>Contact Us</h4>
                <div class="footer_body">
                    @foreach ($pages as $key => $page)
                        @if ($page->slug == 'contact')
                            @foreach ($page->pages as $key => $value)
                                @php
                                    $content = json_decode($value->content);
                                @endphp
                                <div class="">
                                    <b> {{ isset($value->title) ? $value->title : '' }} </b>
                                    <p>
                                        Phone No : {{ isset($content->phone) ? $content->phone : '' }} <br />
                                        Email : {{ isset($content->email) ? $content->email : '' }}
                                    </p>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>
            </div>
            <div class="col-md-5 col-lg-5 footer">
                {{-- <h4></h4> --}}
                <div class="footer_body">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3571.780253823647!2d87.28238371494743!3d26.46281138568358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef743e496e0069%3A0x33b3089b94465f45!2sAdarsha%20Secondary%20School!5e0!3m2!1sen!2snp!4v1650624331659!5m2!1sen!2snp"
                        width="400" height="170" style="border:4px solid #eee;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="footer_body">
                    <br>
                    Visitor :

                    <span> {{ App\Models\visitor::count() }} </span>
                    <br />


                </div>


            </div>
        </div>
    </div>
</footer>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                @ Adarsha School 2020. All Rights Reserved.
            </div>
            <div class="col-lg-6 col-md-6 powerby">
                Power by: <a href="https://pdmt.com.np" target="_blank">PDMT</a>
            </div>
        </div>
    </div>
</div>
<!-- :: Scroll Up -->
<!--<div class="scroll-up">-->
<!--  <a href="#page" class="move-section">-->
<!--    <i class="fa-solid fa-arrow-up-to-line"></i>-->
<!--  </a>-->
<!--</div>-->

<!-- Script Include -->


<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script>
    $(".gimg").magnificPopup({
        type: "image",
        gallery: {
            enabled: true,
        },
    });
</script>
</body>

</html>
