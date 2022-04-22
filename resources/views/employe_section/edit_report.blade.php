@extends('employe_section.layout.employeemain')

@section('title', 'Edit Report')
@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Report</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"></h4>
                        <form action="/updatereport/<?php echo $reports[0]->ReportID; ?>" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Title *</label>
                                        <div class="input-group" id="datepicker2">
                                            <input type="text" name="Title" autocomplete="off" value='<?php echo $reports[0]->Title; ?>' class="form-control" data-date-autoclose="true">
                                        </div>
                                        <span style="color: red">@error('Title'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="basicpill-firstname-input">Upload File</label>
                                        <div class="input-group" id="datepicker2">
                                            <input type="file" name="ReportFile" autocomplete="off" class="form-control" data-date-autoclose="true">
                                            <input type="Hidden" name="OldFile" value='<?php echo $reports[0]->ReportFile; ?>' autocomplete="off" class="form-control" data-date-autoclose="true">

                                        </div>
                                        <span style="color: red">@error('ReportFile'){{ $message }} @enderror </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <div class="col-md-12">
                                            <textarea name="TextArea">{{ $reports[0]->TextArea}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success w-lg float-right">Save</button>
                                </div>
                        </form>
                    </div>
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
                    </script> © ShahCorporation.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Teqholic
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script>
    CKEDITOR.replace('TextArea', {
        height: 350,
    });
</script>
@endsection