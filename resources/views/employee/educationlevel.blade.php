@extends('layout.main')

@section('title', 'Education Level')


@section('content')

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Education Level</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item">Add Education Level</li>

                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                  
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <form action="{{ route('addeducationlevels') }} " method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Department Name</label>
                                        <input type="text" class="form-control" name="educationlevel" id="formrow-firstname-input"
                                            placeholder="Enter Education Level">
                                       <span style="color: red">@error('educationlevel'){{ $message }} @enderror </span>     
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

                                        @foreach ($educationlevels as $educationlevel => $value)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $value->EducationLevelName }}</td>
                                                <td><a href ="deleteeducationlevel/{{ $value->EducationLevelID }}" class="btn  btn-sm edit waves-effect waves-light" title="Edit" id="sa-params">
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

    @endsection
