<div>
    <div class="card text-sm ">

        @isset($msg)
            @if($msg!='')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{$msg}}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @endif  
        @endisset
        @if (session()->has('msg'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{session('msg')}}</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        <div class="card">
            <div class="card-header">
                <div class="row my-1">
                    <div class="col-md-6" style="margin-bottom:-5px;">
                        <p class="">{{ __('Sliders') }}</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{route('sliders.create')}}"
                            class="btn btn-sm btn-primary">{{ __('Add Sliders') }}
                            <i class="fas fa-plus px-1"></i></a>
                    </div>
                </div>
            <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
            
            </div>
            </div>
            </div>
            
            <div class="card-body table-responsive p-0" style="height: 300px;">
            <table class="table table-head-fixed text-nowrap">
            <thead>
            <tr>
            <th>Photo</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @if ($slider != '' && $slider->pictures->count() > 0)
    
                <tr>
                    <td class="text-center">
                        @foreach ($slider->pictures as $image)
                            <span wire:click="removeImage('{{ $image->id }}')"><i class="fas fa-times"></i></i></span> 
                                    <a
                                            href="{{ asset('storage/upload/' . $image->url) }}" target="_blank">
                                            <img src="{{ asset('storage/thumbnails/' . $image->url) }}" alt=""
                                                class="px-1" width="100">
                                        </a>
                            @endforeach
    
                    </td>
                    <td class="text-center">
                        <a href="{{ route('sliders.edit', $page) }}" class="btn btn-sm btn-success"><i
                                class="fas fa-edit px-1"></i>{{ __('Edit') }}</a>
                    </td>
                </tr>
    
            @endif
            </tbody>
            </table>
            </div>
            
            </div>
        <!-- /.card-body -->
    </div>
</div>
