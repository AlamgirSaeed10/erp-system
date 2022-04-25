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



          <form action="{{ route('letter_issue_preview') }}" method="post">
            {{csrf_field()}}
            <div class="card ">
              <div class="card-body card-body border-secondary border-top border-1 rounded-top">
                <h4 class="card-title ">Select Letter Template</h4>
                <table class="table table-sm m-0 table-striped">
                  <thead>
                    <tr>
                      <th class="col-sm-1 text-center">#</th>
                      <th class="col-sm-9">Title</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    @foreach($letter as $value)
                    <tr>
                      <td class="text-center"> <input class="form-check-input  " type="radio" name="letter_id" id="formRadios1" checked="" value="{{$value->LetterID}}"></td>
                      <td scope="row">
                        {{$value->Title}}
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <hr>
                <input type="submit" name="Submit" value="Preview Letter" class="btn btn-primary btn-sm mt-3 w-md" />
              </div>
            </div>
          </form>

          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body card-body border-primary border-top border-1 rounded-top">
                  <h4 class="card-title ">Issued Letter</h4>
                  <p class="card-title-desc"> </p>
                  <table class="table table-hover align-middle table-sm table-nowrap mb-0">
                    <thead class="table-light">
                      <tr>
                        <th class="col-1" class="align-middle">#</th>
                        <th class="col-6">Title</th>
                        <th class="col-2">Date</th>
                        <th class="col-2">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      @foreach ($issue_letter as $value)
                      <tr>
                        <td>{{$i}}.</td>
                        <td>{{$value->Title}}</td>
                        <td>{{$value->eDate}}</td>
                        <td>
                          <div class="d-flex gap-3">
                            <a href="edit_letter_issue/{{$value->IssueLetterID}}" class="text-success"><i class="mdi mdi-pencil font-size-18"></i></a>
                            <a href="issue_letter_print/{{$value->IssueLetterID}}" class="text-secondary"><i class="mdi mdi-printer font-size-18"></i></a>
                            <a href="#" onclick="delete_confirm2('delete_issue_letter','{{$value->IssueLetterID }}')" class="text-danger"><i class="mdi mdi-delete font-size-18"></i></a>
                          </div>
                        </td>
                      </tr>
                      <?php $i++; ?>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
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