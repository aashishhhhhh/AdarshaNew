<div class="right-box">

    <div class="facebook-page py-4">
        <div class="fb-page"
            data-href="https://www.facebook.com/Adarsha-Secondary-School-Biratnagar-7-Admin-104689884201666/"
            data-tabs="" data-width="" data-height="200" data-small-header="false" data-adapt-container-width="true"
            data-hide-cover="false" data-show-facepile="false">
            <blockquote cite="https://www.facebook.com/Adarsha-Secondary-School-Biratnagar-7-Admin-104689884201666/"
                class="fb-xfbml-parse-ignore"><a
                    href="https://www.facebook.com/Adarsha-Secondary-School-Biratnagar-7-Admin-104689884201666/">Adarsha
                    Secondary School Biratnagar-7 Admin</a></blockquote>
        </div>
    </div>

    {{-- Important Link --}}
    <div class="important_link">
        <h4 class="important_link_title"> Important Links </h4>
        <div class="important_link_body">
            <ul>
                @foreach ($pages as $key => $page)
                    @if ($page->slug == 'link')
                        @foreach ($page->pages as $key => $value)
                            @php
                                $content = json_decode($value->content);
                            @endphp
                            <li><a target="_blank" href="{{ $content->link }}"> <i
                                        class="fa-solid fa-angles-right"></i> <span>
                                        {{ $content->title }}</span></a></li>
                        @endforeach
                    @endif
                @endforeach

            </ul>
        </div>
    </div>

    <div class="photo-gallery">


    </div>
    <div class="video-gallery">
        <iframe width="100%" height="300" src="https://www.youtube.com/embed/lZ3p8qYvZws">
        </iframe>
    </div>
</div>
