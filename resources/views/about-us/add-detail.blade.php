@extends('layouts.main')
@section('title','Add Detail')
@section('is_active_about_us','active')
@section('main_content')
<div class="card card-primary">
    <form action="{{route('aboutus-detail.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="card-body">
        <input type="hidden" name="aboutUsId" value="{{$aboutus->id}}" name="" id="">
    <div class="division">
        <div class="col-md-12 mt-5">
            <p class="text-center font-weight-bold" style="font-size: 1.5rem;">{{ __('Add Details') }}
            </p>
            <hr class="w-100">
            <a class="btn btn-sm btn-primary text-white mb-0" id="addBank">
                <i class="fas fa-plus-circle px-1"></i>{{ __('Add Details') }}</a>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('S.N.') }}</th>
                        <th class="text-center">{{ __('Photo') }}</th>
                        <th class="text-center">{{ __(' Name') }}</th>
                        <th class="text-center">{{ __(' Designation') }}</th>
                        <th class="text-center">{{ __(' Contact No') }}</th>
                        <th class="text-center">{{ __(' Position') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="banks">
               @php
                   $length= count($members);
               @endphp

                     @foreach ($members as $key => $item)
                     @php
                         $content= json_decode($item->content);
                     @endphp
                   
                    <tr id="rem_bank{{$key}}" class="addPrposal" >
                        <td class="text-center">{{$key+1}}</td>
                        <td class="text-center">
                            <input type="file" name="photo[]" id="" class="form-control-sm form-control">
                        </td>
                        @if ($key>2)
                        <td class="text-center">
                            <input name="name[]" id="" value="{{$content->name}}" value="" class="form-control-sm form-control">
                        </td>
                        @else
                        <td class="text-center">
                            <input name="name[]" id="" value="{{$content->name}}" value="" class="form-control-sm form-control" readonly>
                        </td>

                        @error('name')
                            <strong style="color: red">{{$message}}</strong>
                        @enderror
                        @endif
                        @if ($key>2)
                        <td class="text-center">
                            <input name="designation[]" id="" value="{{$content->designation}}"  class="form-control-sm form-control" >
                        </td>
                        @else
                        <td class="text-center">
                            <input name="designation[]" id="" value="{{$content->designation}}"  class="form-control-sm form-control" readonly>
                        </td>   
                        @endif
                        @error('designation')
                        <strong style="color: red">{{$message}}</strong>
                        @enderror

                        @if ($key>2)
                        <td class="text-center">
                            <input name="contact_no[]" id="" value="{{isset($content->contact_no) ? $content->contact_no : '' }}"  class="form-control-sm form-control" >
                        </td>
                        @else
                        <td class="text-center">
                            <input name="contact_no[]" id="" value="{{isset($content->contact_no) ? $content->contact_no : '' }}"  class="form-control-sm form-control" readonly>
                        </td>   
                        @endif
                        @error('contact_no')
                        <strong style="color: red">{{$message}}</strong>
                        @enderror

                        @if ($key>2)

                        <td class="text-center">
                            <input name="position[]" id="" value="{{$item->position}}" class="form-control-sm form-control" readonly>
                        </td>
                        @else
                        <td class="text-center">
                            <input name="position[]" id="" value="{{$item->position}}" class="form-control-sm form-control" readonly>
                        </td>
                        @endif

                        @error('position')
                        <strong style="color: red">{{$message}}</strong>
                        @enderror

                       @if ($key>2)
                        <td>
                            <i class="fas fa-trash-alt text-danger" onclick="removeBank({{$key}},{{$item->page_id}},{{$item->id}})"></i>
                        </td>
                       @endif

                    </tr>
                    @endforeach   
                  
                </tbody>
            </table>
        </div>
    </div>
   
    </div>
    <div class="form-check">
    </div>
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
    

    
    @endsection

    @section('scripts')


<script>
    $(document).ready(function() {
        var local = @json($members, JSON_PRETTY_PRINT);
        let length= local.length
        console.log(length);
        let i = length+1;
        let j=2;
        $('#addBank').on("click", function() {
            var html = '<tr id="rem_bank' + i + '">' +
                '<td class="text-center">' + i + '</td>' +
                '<td class="text-center">' +
                '<input type="file" name="photo[]" id="" class="form-control-sm form-control">' +
                '</td>' +
                '<td class="text-center">' +
                '<input name="name[]" id="" class="form-control-sm form-control">' +
                '</td>' +
                '<td class="text-center">' +
                '<input name="designation[]" id="" class="form-control-sm form-control">' +
                '</td>' +
                '<td class="text-center">' +
                '<input name="contact_no[]" id="" class="form-control-sm form-control">' +
                '</td>' +
                '<td class="text-center">' +
                '<input name="position[]" id="" value="'+i+'" class="form-control-sm form-control" readonly>' +
                '</td>' +
                '<td><i class="fas fa-trash-alt text-danger" onclick="removeBank(' + i +
                ')"></i></td>' +
                '</tr>';
            i++;
            j++;
            $("#banks").append(html);
        });
    });
</script>
<script>
    function removeBank(i,parent_id,id) {
            $("#rem_bank" + i).html("");
            axios.get("{{ route('delete-staff') }}", {
            params: {
                 id: id,
            }
            }).then(function(response){
                console.log(response);
            })
        }
</script>


@endsection
