@extends('employe_section.layout.employeemain')

@section('title', 'Leave')


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

                                <form action="{{ Route('empLeaveSave') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="basicpill-firstname-input">From Date *</label>
                                                <div class="input-group" id="datepicker2">
                                                    <input type="text" name="FromDate" autocomplete="off"
                                                        class="form-control" placeholder="dd/mm/yyyy" 
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
                                                        data-provide="datepicker" data-date-autoclose="true">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>







                                            </div>

                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="verticalnav-address-input">Reason</label>
                                                <textarea id="verticalnav-address-input" class="form-control" rows="2" name="Reason">{{ old('Reason') }}</textarea>
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
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Leave List</h4>




                                </div>
                            </div>
                        </div>
                        <!-- end page title -->






                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <table id="datatable" class="table   dt-responsive  nowrap w-100 table-sm">
                                            <thead>
                                                <tr>

                                                    <th>From</th>
                                                    <th>To</th>
                                                    <th>No of Days</th>
                                                    <th>Reason</th>
                                                    <th>OM</th>
                                                    <th>HR</th>
                                                    <th>GM</th>
                                                    <th>Action</th>


                                                </tr>
                                            </thead>


                                            <tbody>
                                                @foreach ($leaves as $leave)
                                                <tr>
                                                    <td>{{ $leave->FromDate }}</td>
                                                    <td>{{ $leave->ToDate }}</td>
                                                    <td></td>
                                                    <td>{{ $leave->Reason }}</td>
                                                    <td>{{ $leave->OMStatus }}</td>
                                                    <td>{{ $leave->HRStatus }}</td>
                                                    <td>{{ $leave->GMStatus }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="font-size-16 text-muted dropdown-toggle" role="button"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                <i class="mdi mdi-dots-horizontal"></i>
                                                            </a>

                                                            <div class="dropdown-menu dropdown-menu-end"
                                                                style="margin: 0px;">
                                                                <a class="dropdown-item" href="empleaveedit/{{ $leave->LeaveID }}">Edit</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item"
                                                                    onclick="delete_confirm('delete_leave','{{ $leave->LeaveID }}')">Remove</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- end card -->
                            </div>
                            <!-- end col -->


                        </div>
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
   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Are you sure to delete this information ?</p>
                    <p class="text-center">



                        <a href="#" class="btn btn-danger " id="delete_link">Delete</a>
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>

                    </p>
                </div>

            </div>
        </div>
</div>
    <script type="text/javascript">
        function delete_confirm(url, LeaveID) {

            url = '{{ URL::TO('/') }}' + /delete_emp_leave/ + LeaveID;
            jQuery('#staticBackdrop').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', url);
        }
    </script>
@endsection
