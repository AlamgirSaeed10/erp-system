@extends('employe_section.layout.employeemain')

@section('title', 'Documents')


@section('content')
    <div class="main-content">


        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Employee Detail</h4>

                            <div class="page-title-right">
                                <div class="page-title-right">
                                    <!-- button will appear here -->

                                    <a href="{{ URL('/Employee') }}"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-arrow-left  me-1 pt-5"></i> Go Back</a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-9">
                        @if (session('error'))
                            <div class="alert alert-{{ Session::get('class') }} p-3 " id="success-alert">

                                {{ Session::get('error') }}
                            </div>
                        @endif

                        @if (count($errors) > 0)

                            <div>
                                <div class="alert alert-danger pt-3 pl-0   border-3 bg-danger text-white">
                                    <p class="font-weight-bold"> There were some problems with your input.</p>
                                    <ul>

                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                        @endif


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="me-3">
                                                @if ($employee[0]->Picture == null)
                                                    <td> No Image </td>
                                                @else
                                                    <td> <img
                                                            src="{{ asset('employee_pictures') }}/{{ $employee[0]->Picture }}"
                                                            style="height:50px; width:50px"> </td>
                                                @endif

                                            </div>
                                            <div class="media-body align-self-center">
                                                <div class="text-muted">
                                                    <h5></h5>
                                                    <p class="mb-1">Usama Shakeel <span
                                                            class="badge badge-soft-success font-size-11 me-2 ml-5">
                                                            Permanent </span> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5  ">
                                Offical Details
                            </div>
                            <div class="card-body">

                                <form action="{{ Route('empLeaveUpdate') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <input type="hidden" value="{{ $leave[0]->LeaveID }}" name="LeaveID">
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">From Date *</label>
                                                <div class="input-group" id="datepicker2">
                                                    <input type="text" name="FromDate" autocomplete="off"
                                                        class="form-control" placeholder="dd/mm/yyyy" value="{{ $leave[0]->FromDate }}"
                                                        data-date-format="dd/mm/yyyy" data-date-container="#datepicker2"
                                                        data-provide="datepicker" data-date-autoclose="true">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">To Date *</label>


                                                <div class="input-group" id="datepicker21">
                                                    <input type="text" name="ToDate" autocomplete="off"
                                                        class="form-control" placeholder="dd/mm/yyyy"
                                                        data-date-format="dd/mm/yyyy" data-date-container="#datepicker21"
                                                        data-provide="datepicker" data-date-autoclose="true" value="{{ $leave[0]->ToDate }}">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="verticalnav-address-input">Reason</label>
                                                <textarea id="verticalnav-address-input" class="form-control" rows="2" name="Reason">{{ $leave[0]->Reason }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div><button type="submit" class="btn btn-success w-lg float-right">Save </button>
                                        <a href="{{ URL('/') }}" class="btn btn-secondary w-lg float-right">Cancel</a>
                                    </div>


                                </form>


                            </div>
                        </div>
                        <!-- end card -->

                        <!-- start page title -->
                   
                        <!-- end page title -->






                 
                        <!-- end row -->



                    </div>
                    <!-- end col -->

                    <!-- employee detail side bar -->
                    @include('employe_section.layout.employee_sidebar')


                </div>
                <!-- end row -->








            </div> <!-- container-fluid -->
        </div>
    </div>

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Skote.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
