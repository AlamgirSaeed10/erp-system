@extends('employe_section.layout.employeemain')
@section('title', 'Employee Letter')
@section('content')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Salary</h4>

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
                        <div class="alert alert-{{ Session::get('class') }} p-3 ">

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
                        <div class="card-body">
                            <div>
                                <div class="row mb-3">
                                    <div class="col-xl-3 col-sm-6">
                                        <div class="mt-2">
                                            <h5>Salary</h5>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div>

                                <!-- end row -->
                            </div>



                            @if (count($employeesalary) > 0)
                                <div>
                                    <table class="table align-middle table-nowrap table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Salary</th>
                                                <th scope="col">Date modified</th>                                          
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($employeesalary as $key => $value): ?>



                                            <tr>
                                                <td>{{$value->Basic}}</td>
                                                <td>{{$value->eDate}}</td>
                                                
                                                
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="font-size-16 text-muted dropdown-toggle" role="button"
                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal"></i>
                                                        </a>

                                                        <div class="dropdown-menu dropdown-menu-end"
                                                            style="margin: 0px;">
                                                            <a class="dropdown-item"
                                                                href=""
                                                                target="_blank">Open</a>
                                                            <!--  <a class="dropdown-item" href="#">Edit</a>
                                                                                <a class="dropdown-item" href="#">Rename</a> -->
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" onclick="delete_document('delete_documment','{{ $value->EmployeeSalaryID }}')">Remove</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <?php endforeach ?>


                                        </tbody>
                                    </table>
                                </div>
                            @endif


                            @if (count($employeesalary) == 0)
                                <p class="text-danger">No Salary</p>
                            @endif
                        </div>
                    </div>
                    <!-- end card -->


                    <div class="card">
                        <div class="card-header bg-transparent   mt-2">
                            <h5>Add Salary</h5>
                        </div>
                        <div class="card-body">

                            <form action="{{ Route('addemployeesalary') }}" method="post"
                               > {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Salary*</label>
                                            <input type="text" class="form-control  form-control-sm" name="Salary" required>
                                        </div>
                                    </div>
                                   
                                    <input type="hidden" class="form-control"  value="{{ $employee[0]->EmployeeID }}"  name="EmployeeID">

                                    <div class="clearfix"></div>
                                    <div class="col-md-4">
                                        <button type="submit"
                                            class="btn  btn-rounded btn-success w-md float-right">Save</button>


                                    </div>


                                </div>


                            </form>


                        </div>
                    </div>

                </div>
                <!-- end col -->

                @include('employe_section.layout.employee_sidebar')



            </div>
            <!-- end row -->

        





        </div> <!-- container-fluid -->
    </div>
</div> <!-- end col -->



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



    
    <script type="text/javascript">
        function delete_confirm2(url, IssueLetterID) {
            console.log(IssueLetterID);
            url = '{{URL::TO(' / ')}}' + /delete_issue_letter/ + IssueLetterID;
            jQuery('#staticBackdrop').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', url);
        }
    </script>
    @endsection