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
            <h4 class="mb-sm-0 font-size-18">Employee Detail</h4>

            <div class="page-title-right">
              <div class="page-title-right">
                <!-- button will appear here -->

                <a href="" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-arrow-left  me-1 pt-5"></i> Go Back</a>

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
        </div>
        @include('template.emp_sidebar')
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
    </div>
  </div>
  <script type="text/javascript">
    function delete_confirm2(url, IssueLetterID ) {
        console.log(IssueLetterID );
        url = '{{URL::TO('/')}}' + /delete_issue_letter/ + IssueLetterID ;
        jQuery('#staticBackdrop').modal('show', {
            backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', url);
    }
</script>
  @endsection