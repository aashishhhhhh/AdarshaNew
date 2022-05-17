@extends('layouts.main')
@section('is_active_alumni','active')

@section('title', 'Downloads')
@section('main_content')
<div class="card text-sm ">
    @if (session()->has('msg'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{{session('msg')}}</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
        <div class="card-header">
            <div class="row my-1">
                <div class="col-md-6" style="margin-bottom:-5px;">
                    <p class="">{{ __('Alumni Table') }}</p>
                </div>

            </div>
        <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
        
        </div>
        </div>
        </div>
        
        <div class="card-body table-responsive p-0">
        <table class="table table-head-fixed text-nowrap">
        <thead>
        <tr>
        <th>Image</th>
        <th>Full Name</th>
        <th>Permanent Address</th>
        <th>Current Address</th>
        <th>Show Details</th>
        <th>Approve </th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($alumni->pages as $key=>$value)
            @if ($value->is_approved==0)
            <tr>
                @php
                    $content= json_decode($value->content);
                @endphp
                <td><img src="{{ asset('storage/thumbnails/' . $content->image) }}" alt=""
                    class="px-1" width="100"></td>
                <td>{{isset($content->name) ? $content->name : ''}}</td>
                <td>{{isset($content->p_address) ? $content->p_address: ''}}</td>
                <td>{{isset($content->c_address) ? $content->c_address: ''}}</td>
                <td><button onclick="show({{$value->id}})" class="btn btn-primary"><i class="fas fa-eye"></i> View details</button></td>
                <td>
                    <a href="{{route('alumni.form.approve',$value->id)}}" class="btn btn-success"><i class="fas fa-thumbs-up"></i> Approve</a>
                    <a href="{{route('alumni.form.decline',$value->id)}}" class="btn btn-info"><i class="fas fa-thumbs-down"></i> Decline</a>
                <td>
                    <form action="{{route('alumni.destroy',$value->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endif


        @endforeach

        </tbody>
        </table>
        </div>
        <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" style="width:1250px">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Alumni details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                    <th>Current job</th>
                    <th>Designation</th>
                    <th>Office</th>
                    <th>Contact no.
                    </th>
                    <th>School Starting Year</th>
                    <th>School Ending Year</th>
                    </th>
                    <th>Starting Class</th>
                    <th>Ending Class</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td id="c_job"></td>
                        <td id="designation"></td>
                        <td id="office"></td>
                        <td id="contact_no"></td>
                        <td id="school_start"></td>
                        <td id="school_end"></td>
                        <td id="starting_class"></td>
                        <td id="ending_class"></td>
                        </tr>
                    </tbody>
                    </table>
              </div>
            </div>
          </div>
        
    
    <!-- /.card-body -->
</div>
@endsection

@section('scripts')
    <script>
        function show(id)
        {
            $("#myModal").modal();
            axios.get("{{ route('get-alumni-data') }}", {
                  params: {
                        id: id,
                }
            }) .then(function(response){
                const obj = JSON.parse(response.data.content);
                console.log(obj);
                var c_job = obj.current_job;
                var designation = obj.designation;
                var office= obj.office;
                var contact_no = obj.contact_no;
                var starting_year = obj.starting_year;
                var leaving_year= obj.leaving_year;
                var starting_class= obj.starting_class;
                var leaving_class= obj.leaving_class;

                $('#c_job').text(c_job);
                $('#designation').text(designation);
                $('#office').text(office);
                $('#contact_no').text(contact_no);
                $('#school_start').text(starting_year);
                $('#school_end').text(leaving_year);
                $('#starting_class').text(starting_class);
                $('#ending_class').text(leaving_class);
                var url = ''
                    url = url.replace(':id', id);
                    var button = $("<a href='"+url+"' class='btn btn-success'><i class='fas fa-thumbs-up'></i> स्वीकृत गर्नुहोस</a>");
                    button.appendTo("#submitBtn");
            });

            

           

        }
    </script>
@endsection