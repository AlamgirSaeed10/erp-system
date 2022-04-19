@extends('layout.main')

@section('title', 'Letter')


@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Letter Status</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"></h4>
                        <form action="{{ route('letter') }}" method="POST">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Title *</label>
                                        <div class="input-group" id="datepicker2">
                                            <input type="text" name="Title" autocomplete="off" class="form-control" data-date-autoclose="true">
                                        </div>
                                        <span style="color: red">@error('Title'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <!-- <label for="basicpill-firstname-input">User Id *</label> -->
                                        <div class="input-group" id="datepicker2">
                                            <input type="hidden" name="UserID" autocomplete="off" class="form-control" data-date-autoclose="true">
                                        </div>
                                        <span style="color: red">@error('UserID'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                            </div>    
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="basicpill-firstname-input">Add Content *</label>
                                        <div class="col-md-12">
                                            <textarea name="Content"></textarea>
                                        </div>
                                    </div>
                                </div><br>
                                <div>
                                    <button type="submit" class="btn btn-success w-lg float-right">Submit</button>
                                </div>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
                
                <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">List of Letters</h4>
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="col">S.No</th>
                                            <th scope="col">Title </th>

                                            <th scope="col">Action</th>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($letters  as $letter)
                                        <tr>
                                            <td class="col-md-1">{{$i}}.</td>

                                            <td class="col-md-10">
                                                {{ $letter->Title }}
                                            </td>
                                            <td class="col-md-1">
                                                <a href="edit_letter/{{$letter->LetterID }}"><i class="bx bx-pencil align-middle me-1"></i></a> 
                                                <!-- <a href="delete_letter/{{ $letter->LetterID  }}"  class="text-primary"><i class="bx bx-trash  align-middle me-1"></i></a> -->
                                              <i class="bx bx-trash  align-middle me-1 text-primary cursor-pointer" onclick="delete_confirm2('letter_delete','{{$letter->LetterID}}')"></i>
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

            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

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
<script type="text/javascript">
    CKEDITOR.replace('Content', {
        height: 350,
    });


       function delete_confirm2(url,LetterID) {
           console.log(LetterID);
            url = '{{URL::TO('/')}}'+/delete_letter/+LetterID;
            jQuery('#staticBackdrop').modal('show', {backdrop: 'static'});
            document.getElementById('delete_link').setAttribute('href' , url);
        }
</script>
@endsection