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
                            <form action="{{ route('Job_Title') }}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Job Title *</label>
                                            <input type="text" class="form-control" name="JobTitleName" value="{{old('JobTitleName')}} ">
                                            <span style="color: red">@error('JobTitleName'){{ $message }} @enderror </span>
                                        </div>
                                    </div>
                                    <div><button type="submit" class="btn btn-success w-lg float-right">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end card body -->
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">List of Job Titles</h4>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="col">S.No</th>
                                            <th scope="col">JobTitle Name</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($jobtitles  as $jobtitle)
                                        <tr>
                                            <td class="col-md-1">{{$i}}.</td>

                                            <td class="col-md-10">
                                                {{$jobtitle->JobTitleName}}
                                            <td class="col-md-1">
                                                <a href="edit_job/{{$jobtitle->JobTitleID}}"><i class="bx bx-pencil align-middle me-1"></i></a> 
                                                <i onclick="delete_confirm2('delete_job','{{ $jobtitle->JobTitleID  }}')" class="bx bx-trash  align-middle me-1 text-primary"></i>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
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
       function delete_confirm2(url,JobTitleID) {
           console.log(JobTitleID);
            url = '{{URL::TO('/')}}'+/delete_job/+JobTitleID;
            jQuery('#staticBackdrop').modal('show', {backdrop: 'static'});
            document.getElementById('delete_link').setAttribute('href' , url);
        }
</script>
    @endsection