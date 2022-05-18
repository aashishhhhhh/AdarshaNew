@include('frontend.layout.header')
<!-- Navigation -->
@include('frontend.layout.navigation')
<main class="container">
    <div class="main-body">
        <!-- section two -->
        <section id="page">
            <div class="container">
                <div class="row">
                    <!-- left box -->
                    <div class="col-md-8">
                        <div class="left-box">
                            @if (session()->has('msg'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ session('msg') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="page">
                                <h4 class="page-title">ALUMNI FORM</h4>
                                <div class="page-body">
                                    <p>
                                        We welcome you to the Alumni family of Adarsha Secondary
                                        School, Biratnagar
                                    </p>
                                    <form action="{{ route('alumni-form-store') }}" method="POST"
                                        class="mt-4 card p-4" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label">Full Name <span class="danger">
                                                        *</span></label>
                                                <input type="text" class="form-control" name="name"
                                                    id="formGroupExampleInput" placeholder="Full Name " />

                                                @error('name')
                                                    <strong style="color: red">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Image <span class="danger">
                                                    </span></label>
                                                <input type="file" class="form-control" id="formGroupExampleInput"
                                                    name="image" placeholder="Full Name " />
                                                @error('image')
                                                    <strong style="color: red">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label class="form-label">Permanent Address
                                                    <span class="danger"> *</span></label>
                                                <input type="text" class="form-control" name=" p_address"
                                                    id="formGroupExampleInput" placeholder="Permanent Address " />
                                                @error('p_address')
                                                    <strong style="color: red">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mt-3">
                                                <label class="form-label">Current Address
                                                    <span class="danger"> *</span></label>
                                                <input type="text" class="form-control" name="c_address"
                                                    id="formGroupExampleInput" placeholder="Current address " />
                                                @error('c_address')
                                                    <strong style="color: red">{{ $message }}</strong>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <label class="form-label">Current Job <span class="danger">
                                                        *</span></label>
                                                <input type="text" class="form-control" name="current_job"
                                                    id="formGroupExampleInput" placeholder="Current job " />
                                                @error('current_job')
                                                    <strong style="color: red">{{ $message }}</strong>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <label class="form-label">Designation <span class="danger">
                                                        *</span></label>
                                                <input type="text" class="form-control" name="designation"
                                                    id="formGroupExampleInput" placeholder="Designation " />
                                                @error('designation')
                                                    <strong style="color: red">{{ $message }}</strong>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <label class="form-label">Office/Organization
                                                </label>
                                                <input type="text" class="form-control" name="office"
                                                    id="formGroupExampleInput" placeholder="Office/Organization " />
                                                @error('office')
                                                    <strong style="color: red">{{ $message }}</strong>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <label class="form-label">Contact No. <span class="danger">
                                                        *</span></label>
                                                <input type="text" class="form-control" name="contact_no"
                                                    id="formGroupExampleInput" placeholder="Contact no " />
                                                @error('contact_no')
                                                    <strong style="color: red">{{ $message }}</strong>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <label class="form-label">School Admission Year <span
                                                        class="danger"> *</span></label>
                                                <input type="text" class="form-control" name="starting_year"
                                                    id="starting_year" placeholder="Starting Year " />
                                                @error('starting_year')
                                                    <strong style="color: red">{{ $message }}</strong>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <label class="form-label">School Leave Year <span
                                                        class="danger"> *</span></label>
                                                <input type="text" class="form-control" name="leaving_year"
                                                    id="leaving_year" placeholder="Leaving Year " />
                                                @error('leaving_year')
                                                    <strong style="color: red">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <label class="form-label">Starting Class in This School <span
                                                        class="danger"> *</span></label>
                                                <input type="text" class="form-control" name="starting_class"
                                                    id="formGroupExampleInput" placeholder="Starting Class " />
                                                @error('starting_class')
                                                    <strong style="color: red">{{ $message }}</strong>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mt-3">
                                                <label class="form-label">Leaving Class in This School <span
                                                        class="danger"> *</span></label>
                                                <input type="text" class="form-control" name="leaving_class"
                                                    placeholder="Leaving Class" />
                                                @error('leaving_class')
                                                    <strong style="color: red">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 mt-4">
                                                <button class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        @include('frontend.layout.sidebar')

                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
@include('frontend.layout.footer')

<script src="{{ asset('date-picker/js/nepali.datepicker.v3.7.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('js/convert_nepali.js') }}"></script>
<script>
    $('#starting_year').nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 70,
        readOnlyInput: true,
        ndpTriggerButton: false,
        ndpTriggerButtonText: '<i class="fa fa-calendar"></i>',
        ndpTriggerButtonClass: 'btn btn-primary',
    });

    $('#leaving_year').nepaliDatePicker({
        ndpYear: true,
        ndpMonth: true,
        ndpYearCount: 70,
        readOnlyInput: true,
        ndpTriggerButton: false,
        ndpTriggerButtonText: '<i class="fa fa-calendar"></i>',
        ndpTriggerButtonClass: 'btn btn-primary',
    });
</script>
