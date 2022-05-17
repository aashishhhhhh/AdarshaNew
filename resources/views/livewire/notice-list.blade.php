<div>
    {{-- Success is as dangerous as failure. --}}
<div>
    <div>
    
        <div class="card text-sm ">
            @isset($msg)
            @if ($msg)
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
                            <p class="">{{ __('Notice Type') }}</p>
                        </div>
                        <div class="col-md-6 text-right">
                            <button wire:click="addNotice()"
                                class="btn btn-sm btn-primary">{{ __('Add Notice Type') }}
                                <i class="fas fa-address-book"></i></button>
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
                <th>Notice Type</th>
                <th>Action</th>
                <th>Notices</th>

                </tr>
                </thead>
                <tbody>
                 @foreach ($notices->pages as $key=> $item)
                <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->title}}</td>
                    <td>
                        {{-- <button wire:click="editNotice('{{$item->id}}')" class="btn btn-primary"><i class="fas fa-edit"></i>Edit</button> --}}
                        <button wire:click="deleteNotice('{{$item->id}}')" type="submit" class="btn btn-primary" ><i class="fas fa-trash-alt"></i>Delete</button> 
                    </td> 
                    <td><button wire:click="showNotices('{{$item->id}}')" type="submit" class="btn btn-primary" ><i class="fas fa-eye"></i>Show</button>
                    <a href="{{route('notices.add',$item->id)}}"  type="submit" class="btn btn-primary" ><i class="fas fa-plus"></i></i>Add</a> 
                    </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                </div>
                
                </div>
                <!-- Button trigger modal -->


                @if ($showNotice==true)
                <div class="card">
                  <div class="card-header">
                      <div class="row my-1">
                          <div class="col-md-6" style="margin-bottom:-5px;">
                              <p class="">{{ __('Notice ') }}</p>
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
                  <th>Date</th>
                  <th>File</th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach ($noticeChild as $key=> $item)
                   @php
                       $data=json_decode($item->content,true);
                       $date=$data[0]['date'];
                   @endphp
                  <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$item->title}}</td>
                  <td>{{$date}}</td>
                  <td> <a class="btn btn-primary" href="{{ asset('storage/upload/' . $data['RealFile']) }}" target="_blank"> Show File </a>
                   </td>
                      <td>
                          <a href="{{route('notices-edit',$item->id)}}"  class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
                          <a href="{{route('notices-delete',$item->id)}}"  class="btn btn-primary" ><i class="fas fa-trash-alt"></i>Delete</a> 
                      </td> 
                  </tr>
                  @endforeach
                  </tbody>
                  </table>
                  </div>
                  
                  </div>
                @endif

        
          <!-- Modal -->
          <div class="modal fade" id="edit-notice" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @isset($notices)
                  <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Edit Notice</h3>
                    </div>
                    <form action="{{route('notice.update',$notices->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                    <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Notice Name</label>
                    <input type="text" value="{{$notices->title}}" name="notice" class="form-control"  placeholder="Enter Name">
                    </div>
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                    </div>
                  @endisset
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          


          <div class="modal fade" id="add-notice" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Add Notice Type</h3>
                    </div>
                    <form action="{{route('notice.store')}}" method="POST">
                        @csrf
                    <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Notice Name</label>
                    <input type="text"  name="notice" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                    </div>
                    </div>
                    <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
            <!-- /.card-body -->
        </div>
        </div>
        
</div>
</div>
