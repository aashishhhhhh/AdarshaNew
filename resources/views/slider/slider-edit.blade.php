@extends('layouts.main')
@section('is_active_slider', 'active')
@section('title', 'Edit Slider')
@section('main_content')
    <div class="card text-sm ">
        <div class="card-header my-2">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('Edit Carousel') }}</p>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form method="post" action="{{ route('sliders.update',$page) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @php
                    $content = json_decode($page->content);
                @endphp
                <div class="row">
                    <div class="col-6 mb-3">
                       
                    </div>
                    <div class="col-6 mb-3">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('Carousel Image') }}
                                </span>
                            </div>
                            <input type="file" value="" name="photo[]"
                                class="form-control  @error('image') is-invalid @enderror" multiple>
                            @error('image')
                                <p class="invalid-feedback" style="font-size: 1rem">
                                    {{ __('Carousel image field is required') }}
                                </p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    {{ __('Carousel Image') }}
                                </span>
                            </div>
                            @foreach ($images as $image)
                                <a href="{{ asset('storage/upload/' . $image->url) }}" target="_blank">
                                    <img src="{{ asset('storage/thumbnails/' . $image->url) }}" alt=""
                                class="px-1" width="100">
                                </a>
                                <input type="hidden" name="old_carousel_image[]" value="{{$image->name}}">
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <textarea name="title" id="editor1">{{isset($content->title) ?  $content->title  : ''}}</textarea>
                    </div>
                </div>
                <div class="col-4 my-2 mx-0">
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-left:-6px;"><i
                            class="fas fa-plus px-1"></i>
                        Update</button>
                </div>

        </form>
    </div>
    <!-- /.card-body -->
    </div>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('editor1');
    </script>
@endsection
