<div>
    
<div class="card text-sm ">
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
                    <p class="">{{ __('Gallery') }}</p>
                </div>
                <div class="col-md-6 text-right">

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
        <th>title</th>
        <th>Photos</th>
        </tr>
        </thead>
        <tbody>
            @php
                // dd($gallery->pages);
            @endphp
        @foreach ($gallery->pages as $key=> $value)
        <tr>
        <td>{{$value->title}}</td>
        <td>
            <button wire:click="showGallery('{{$value->id}}')" class="btn btn-primary"><i class="fas fa-edit"></i>Show</button>
        </td>
        </tr>
        @endforeach
        </tbody>
        </table>
        </div>
        
        </div>
        
        @if ($showGallery==true)
        <div class="card">
          <div class="card-header">
              <div class="row my-1">
                  <div class="col-md-6" style="margin-bottom:-5px;">
                      <p class="">{{ __('Gallery ') }}</p>
                  </div>
                  <div class="col-md-6 text-right">
                  @isset($galleryId)
                  <a href="{{route('albumCreate',$galleryId)}}"
                  class="btn btn-sm btn-primary">{{ __('Add Album') }}
                  <i class="fas fa-plus px-1"></i></a>
                  @endisset
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
          <th>S.N</th>
          <th>Title</th>
          <th>Photos</th>
          <th>Action</th>
          </tr>
          </thead>
          <tbody>
           @foreach ($albums as $key=> $item)
           @php
               $data=json_decode($item->content,true);
           @endphp
          <tr>
          <td>{{$key+1}}</td>
          <td>{{$data['title']}}</td>
          {{-- <td>{{$data}}</td> --}}
          <td> <a href="{{route('showPhotos',$item->id)}}" class="btn btn-primary"> Show Photos </a>
           </td>
              <td>
                  <a href="{{route('album-edit',$item->id)}}"  class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
                  <a href="{{route('album-delete',$item->id)}}"  class="btn btn-primary" ><i class="fas fa-trash-alt"></i>Delete</a> 
              </td> 
          </tr>
          @endforeach
          </tbody>
          </table>
          </div>
          
          </div>
        @endif

        @if ($showVideo==true)
        <div class="card">
            <div class="card-header">
                <div class="row my-1">
                    <div class="col-md-6" style="margin-bottom:-5px;">
                        <p class="">{{ __('Gallery ') }}</p>
                    </div>
                        <div class="col-md-6 text-right">
                            @isset($galleryId)
                            <a href="{{route('videoAdd',$galleryId)}}"
                            class="btn btn-sm btn-primary">{{ __('Add Video ') }}
                            <i class="fas fa-plus px-1"></i></a>
                          @endisset
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
            <th>S.N</th>
            <th>Title</th>
            <th>Photos</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
             @foreach ($albums as $key=> $item)
             @php
                 $data=json_decode($item->content,true);
              //    $date=$data[0]['date'];
             @endphp
            <tr>
            <td>{{$key+1}}</td>
            <td>{{$data[0]['title']}}</td>
             <td> <a href="{{route('showVideo',$item->id)}}" class="btn btn-primary"> Show Video </a>
             </td>
                <td>
                    <a href="{{route('video-edit',$item->id)}}"  class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
                    <a href="{{route('video-delete',$item->id)}}"  class="btn btn-primary" ><i class="fas fa-trash-alt"></i>Delete</a> 
                </td> 
            </tr>
            @endforeach 
            </tbody>
            </table>
            </div>
            
            </div>
        @endif
    <!-- /.card-body -->
</div>
</div>
