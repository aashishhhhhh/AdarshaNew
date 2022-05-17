<div>
    <div class="card card-primary">
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
        
        <div class="card-body">
            
            <div class="form-group">
                <label for="exampleInputEmail1">Select a Faculty</label>
                <select wire:model="facultyId" class="form-control" required>
                  <option value="" >
                     Select a Faculty
                  @foreach ($faculty->pages as $item)
                  <option value="{{$item->id}}">   {{$item->title}}</option>
                  <h1> </h1>
              @endforeach
              </div>
        <div class="form-check">
        <input type="hidden" class="form-check-input" id="exampleCheck1">
        </div>
        </div>

        </form>
        </div>

        @if ($showCourse==true)
            
        <div class="card">
            <div class="card-header">
                <div class="row my-1">
                    <div class="col-md-6" style="margin-bottom:-5px;">
                        <p class="">{{ __('Course') }}</p>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{route('add-Course',$facultyId)}}"
                            class="btn btn-sm btn-primary">{{ __('Add Course') }}
                            <i class="fas fa-address-book"></i></a>
                    </div>
                </div>
            <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
            </div>
            </div>
            </div>
            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
            <thead>
            <tr>
            <th>S.N</th>
            <th>Name</th>
            <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($course as $key=> $value)
            <tr>
            <td>{{$key+1}}</td>
            <td>{{$value->title}}</td>
            <td>
              @if ($value->pictures!=null)
              @foreach ($value->pictures as $item)
              <a href="{{ asset('storage/upload/' . $item->url) }}"
                  target="_blank">
                  <img src="{{ asset('storage/thumbnails/' . $item->url) }}"
                      width="100">
              </a>
              @endforeach
              @endif
            </td>
            <td>
                <a href="{{route('course.edit',$value->id)}}"  class="btn btn-primary"><i class="fas fa-edit"></i>Edit</a>
                <a href="{{route('course-delete',$value->id)}}"  class="btn btn-primary"><i class="fas fa-trash"></i>Delete</a>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
            </div>
            
            </div>
            @endif

             <!-- Modal -->
          <div class="modal fade" id="edit-course" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle"></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  @isset($courses)
                  <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Course Name</h3>
                    </div>
                    <form action="{{route('course.update',$courses->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                    <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Course Name</label>
                    <input type="text" value="{{$courses->name}}" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
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

          <div class="modal fade" id="add-course" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
                    <h3 class="card-title">Course Name</h3>
                    </div>
                    <form action="{{route('course.store')}}" method="POST">
                        @csrf
                    <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputEmail1">Course Name</label>
                    <input type="hidden" name="faculty_id" value="{{$facultyId}}">
                    <input type="text"  name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
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


</div>