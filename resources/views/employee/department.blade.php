@extends('layout.main')

@section('title', 'Department')


@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Departments</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">Add Departments</li>

                                </ol>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="{{ route('adddepartments') }}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Department Name</label>
                                        <input type="text" class="form-control" name="departmentname"
                                            id="formrow-firstname-input" placeholder="Enter Department Name">
                                        <span style="color: red">
                                            @error('departmentname')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="mb-4">

                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->


                    <!-- end col -->
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">All Departments</h4>


                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">#</th>
                                            <th class="align-middle">Department Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($departments as $depratment => $value)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $value->DepartmentName }}</td>
                                                <td><a href="#"
                                                        onclick="delete_confirm2('deleteletter','{{ $value->DepartmentID }}')"
                                                        class="btn  btn-sm edit waves-effect waves-light" title="Delete"
                                                        id="sa-params">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a></td>
                                            </tr>
                                        @endforeach


                                    </tbody>


                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
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
        </div>

        <!-- my own model -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
        <!-- end of my own model -->
        <script>
            function delete_confirm2(url, id) {



                url = '{{ URL::TO('/') }}/' + 'deletedepartment' + '/' + id;



                jQuery('#staticBackdrop').modal('show', {
                    backdrop: 'static'
                });
                document.getElementById('delete_link').setAttribute('href', url);

            }
        </script>
    @endsection
