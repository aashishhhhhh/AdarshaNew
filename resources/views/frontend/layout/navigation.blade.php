<nav>
    <div class="container">
      <div id="cssmenu">
        <ul>
          @php
       
          @endphp
     
          @foreach ($pages as $item)
          @if ($item->show_on_homepage==1)
          <li >
            @if ($item->title=='HOME')
            <a href="{{url($item->slug)}}">{{$item->title}}</a>
            @else
            @if ($item->title=='CONTACT US')
            <a href="{{url($item->slug)}}">{{$item->title}}</a>
            @else
             @if ($item->title=='RESULT')
            <a href="{{url($item->slug)}}">{{$item->title}}</a>
            @else
            @if ($item->title=='DOWNLOADS')
            <a href="{{url($item->slug)}}">{{$item->title}}</a>
            @else
            @if ($item->title=='ARTICLE')
            <a href="{{url($item->slug)}}">{{$item->title}}</a>
            @else
            @if ($item->title=='NOTICE BOARD')
            <a href="{{url($item->slug)}}">{{$item->title}}</a>
            @else
            @if ($item->title=='ALUMNI')
            <a href="{{url($item->slug)}}">{{$item->title}}</a>
            @else
            <a href="#">{{$item->title}}  </a>
            @endif
            @endif
            @endif
            @endif
            @endif
            @endif
            @endif

            
            <ul>
              @if ($item->title!=='RESULT' && $item->title!='DOWNLOADS' && $item->title!='CONTACT US' && $item->title!='ARTICLE' && $item->title!='NOTICE BOARD' && $item->title!='ALUMNI'  )
                  
              @foreach ($item->pages as $value)
              @php
              @endphp
              @if ($value->id!=14)
              @php
                //  $conten=json_decode();
              @endphp
              <li>
               @if ($value->slug!='technical' && $value->slug!='non-technical')
                <a href="{{route('program.slug',$value->slug)}}"> {{$value->title}}</a>
                @else
                <a href="#"> {{$value->title}}  </a>
                <ul>
                  @if ($value->Parents!=null)
                  @foreach ($value->Parents as $item)
                  @php
                    $content=json_decode($item->content);
                    // dd($content);
                  @endphp
                  @if ($item->slug=='school')
                  <li><a href="{{route('program.slug',$item->slug)}}"> {{isset($item->title) ? $item->title : ''}}</a></li>
                  @else
                  <li><a href="{{route('program.slug',$item->slug)}}"> {{isset($item->title) ? $item->title : ''}}</a></li>

                  @endif

                  @endforeach
                  @endif

                  {{-- <li><a href="d-civil.html"> D-CIVIL </a></li>
                  <li><a href="pre-diploma.html"> PRE-DIPLOMA </a></li>
                  <li>
                    <a href="appentiship-24-months.html">
                      APPRENTISHIP 24 MONTHS
                    </a>
                  </li>
                  <li>
                    <a href="short-term-training.html">
                      SHORT TERM TRAINING
                    </a>
                  </li> --}}
                </ul>

                @endif
              
                
              </li>
              @endif
              @endforeach
              @endif

              {{-- <li>
                <a href="overview.html"> INSTITUTIONAL OVERVIEW (HISTORY) </a>
              </li>
              <li>
                <a href="organizational-structure.html">
                  ORGANIZATIONAL STRUCTURE
                </a>
              </li>
              <li><a href="our-mission.html"> OUR MISSION </a></li>
              <li>
                <a href="staff-directories.html"> STAFF DIRECTORIES </a>
              </li> --}}
            </ul>
          </li>
          @endif
          @endforeach

          {{-- <li class="active">
            <a href="#">FACULTIES</a>
            <ul>
              <li>
                <a href="#">TECHNICAL</a>
                <ul>
                  <li><a href="d-com.html">D-COM</a></li>
                  <li><a href="d-civil.html"> D-CIVIL </a></li>
                  <li><a href="pre-diploma.html"> PRE-DIPLOMA </a></li>
                  <li>
                    <a href="appentiship-24-months.html">
                      APPRENTISHIP 24 MONTHS
                    </a>
                  </li>
                  <li>
                    <a href="short-term-training.html">
                      SHORT TERM TRAINING
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#"> NON-TECHNICAL </a>
                <ul>
                  <li>
                    <a href="#"> SCHOOL</a>
                    <ul>
                      <li>
                        <a href="english-medium.html"> ENGLISH MEDIUM</a>
                      </li>
                      <li><a href="nepali-medium.html"> NEPALI MEDIUM</a></li>
                    </ul>
                  </li>
                  <li><a href="10+2-education.html"> 10+2 SCIENCE </a></li>
                  <li>
                    <a href="10+2-management.html"> 10+2 MANAGEMENT </a>
                  </li>
                  <li><a href="10+2-education.html"> 10+2 EDUCATION </a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="active">
            <a href="#">NOTICE BOARD</a>
            <ul>
              <li><a href="general.html"> GENERAL </a></li>
              <li><a href="exam.html"> EXAM </a></li>
            </ul>
          </li>
          <li><a href="result.html">RESULT</a></li>
          <li><a href="downloads.html">DOWNLOADS</a></li>
          <li class="">
            <a href="#">GALLERY</a>
            <ul>
              <li><a href="gallery.html"> Photo Gallery </a></li>
              <li><a href="video-gallery.html"> Video Gallery </a></li>
            </ul>
          </li>
          <li><a href="contact.html">Contact</a></li> --}}
        </ul>
      </div>
    </div>
  </nav>