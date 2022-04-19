@extends('layout.main')

@section('title', 'Documents')


@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Documents</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">Upload Documents</li>

                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                  
                <div class="row">
               
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="{{ route('uploaddocument') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="mb-3">
                                                    <label class="form-label">Select Employee</label>
                                                    <select class="form-control select2" name="employee" required>
                                                        <option>Select</option>
                                                       @foreach ($employees as $employee=>$value)
                                                           <option value="{{ $value->EmployeeID }}">{{ $value->FirstName }}</option>
                                                       @endforeach
                                                        
                                                    </select>
                                                    <span style="color: red">@error('employee'){{ $message }} @enderror </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        
                                        <div class="col-md-6"> 
                                            <label for="formrow-firstname-input" class="form-label">File Name</label>
                                            <input type="text" class="form-control" name="filename" id="formrow-firstname-input"
                                                placeholder="Enter Document Name">
                                                <span style="color: red">@error('filename'){{ $message }} @enderror </span>

                                        </div>
                                        <div class="col-md-6">
                                            <label for="formrow-firstname-input" class="form-label">Upload File</label>
                                            <input type="file" class="form-control" name="file" id="formrow-firstname-input">
                                            <span style="color: red">@error('file'){{ $message }} @enderror </span>
                                        </div>

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

                                <h4 class="card-title">Education Levels</h4>
                               

                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">#</th>
                                                <th class="align-middle">Education Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {{-- @foreach ($educationlevels as $educationlevel => $value)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $value->EducationLevelName }}</td>
                                            </tr>
                                        @endforeach --}}


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

    @endsection
