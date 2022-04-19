@extends('layout.main')
@section('title', 'HR')
@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Job Title</h4>

                        <div class="page-title-right">
                            <div class="page-title-right">
                                <!-- button will appear here -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4"></h4>

                            <form action="/updatejob/<?php echo $jobtitles[0]->JobTitleID; ?>" method="post">

                                {{csrf_field()}}
                                <input type="hidden" class="form-control" name="JobTitleID" value="<?php echo$jobtitles[0]->JobTitleID; ?>">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Job Title *</label>
                                            <input type="text" class="form-control" name="JobTitleName" value ='<?php echo$jobtitles[0]->JobTitleName; ?>'>
                                        </div>
                                    </div>
                                    <div><button type="submit" class="btn btn-success w-lg float-right">Save</button>
                                    </div>
                                </div>
                            </form>


                        </div>
                        <!-- end card body -->
                    </div>


                </div>
                <!-- end col -->


            </div>

        </div> <!-- container-fluid -->
    </div>


    @endsection