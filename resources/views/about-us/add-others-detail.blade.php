@extends('layouts.main')
@section('title','Add Detail')
@section('is_active_about_us','active')
@section('main_content')
<div class="card card-primary">
    <form action="{{route('aboutus-other-detail.store')}}" method="POST" enctype="multipart/form-data">
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
                        <th class="text-center">{{ __(' Name') }}</th>
                        <th class="text-center">{{ __(' Designation') }}</th>
                        <th class="text-center">{{ __(' Position') }}</th>
                        <th class="text-center">{{ __(' Contact no') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="banks">
        
                    <tr class="addPrposal" >
                        <td class="text-center">1</td>
                        <td class="text-center">
                            <select name="name[]" id="name1" onchange="myFunction(1)" class="form-control">
                                <option value="">क्षान्नुहोस्</option>
                                @foreach ($members as $item)
                                @php
                                    $content= json_decode($item->content);
                                @endphp
                                    <option value="{{$item->id}}">{{$content->name}} </option>
                                @endforeach
                            </select>
                        </td>

                        <td class="text-center">
                            <input name="designation[]" id="designation1" value="" class="form-control-sm form-control" >
                        </td>

                       
                        <td class="text-center">
                            <input name="position[]" id="position1"  class="form-control-sm form-control" >
                        </td>

                        <td class="text-center">
                            <input name="contact_no[]" id="contact_no1"  class="form-control-sm form-control" >
                        </td>

                        <td>
                            <i class="fas fa-trash-alt text-danger" onclick="removeBank()"></i>
                        </td>

                    </tr>
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
        let i = 2;
        let j=2;
        $('#addBank').on("click", function() {
            var html = '<tr id="rem_bank' + i + '">' +
                '<td class="text-center">' + i + '</td>' +

                '<td class="text-center">'+
                    '<select name="name[]" id="name'+i+'" onchange="myFunction('+i+')" class="form-control name">'+
                        ' <option value="">क्षान्नुहोस्</option>'+
                        '@foreach($members as $item)'+
                        '<option value="{{$item->id}}"> {{$item->title}}  </option>'+
                        '@endforeach'+
                    '</select>'+
                '</td>'+

                '<td class="text-center">' +
                '<input name="designation[]" id="designation'+i+'"  class="form-control-sm form-control" >' +
                '</td>' +

                '<td class="text-center">' +
                '<input name="position[]" id="position'+i+'"  class="form-control-sm form-control" >' +
                '</td>' +

                '<td class="text-center">' +
                '<input name="contact_no[]" id="contact_no'+i+'"  class="form-control-sm form-control" >' +
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
            // axios.get("{{ route('delete-staff') }}", {
            // params: {
            //      id: id,
            // }
            // }).then(function(response){
            //     console.log(response);
            // })
        }
</script>

<script>
            function myFunction(i) {
                console.log(i);
                    var id = $('#name'+i).val();
                    axios.get("{{ route('get-staff-data') }}", {
                    params: {
                        id: id,
                    }
                    }).then(function(response){
                        console.log(response.data.content);
                        const obj = JSON.parse(response.data.content);
                        console.log(obj);
                        var designation=obj.designation;
                        var name = obj.name;
                        var position = obj.position;
                        var contact_no = obj.contact_no;
                        $('#position'+i).val(position);
                        $('#designation'+i).val(designation);
                        $('#contact_no'+i).val(contact_no);
                    })
            }

</script>


@endsection
