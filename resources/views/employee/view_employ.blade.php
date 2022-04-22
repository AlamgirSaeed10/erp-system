@extends('layout.main')

@section('title', 'Profile')


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

                <a href="{{URL('/Employee')}}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-arrow-left  me-1 pt-5"></i> Go Back</a>

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
                @if($employee[0]->Picture == Null)
                <td> No Image </td>
                @else

                <td> <img src="{{asset('employee_pictures')}}/{{$employee[0]->Picture}}" style="height:50px; width:50px"> </td>

                @endif

                    </div>
                      <div class="media-body align-self-center">
                          <div class="text-muted">
                              <h5></h5>
                              <p class="mb-1">Usama Shakeel <span class="badge badge-soft-success font-size-11 me-2 ml-5"> Permanent </span> </p>
                          </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

          <form action="{{URL('/EmployeeUpdate')}}" method="post" enctype="multipart/form-data">
            <div class="row">

              {{csrf_field()}}
              <input type="hidden" name="EmployeeID" value="{{Session::get('EmployeeID')}}" readonly="">

                    
            <div>







<div class="card">
    <div class="card-header bg-transparent border-bottom h5">
        Personal Information
    </div>
    <div class="card-body">
        <!-- start of personal detail row -->
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">


          
            <tr>
                <td class="fw-bold">Title</td>
                <td>{{$employee[0]->Title}}</td>
            </tr>
            <tr>
                <td class="fw-bold">First Name</td>
                <td>{{$employee[0]->FirstName}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Middle Name</td>
                <td>{{$employee[0]->MiddleName}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Last Name</td>
                <td>{{$employee[0]->LastName}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Date of Birth</td>
                <td>{{$employee[0]->DateOfBirth}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Is Supervisor</td>
                <td>Yes</td>
            </tr>
            <tr>
                <td class="fw-bold">Gender</td>
                <td>{{$employee[0]->Gender}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Email</td>
                <td>{{$employee[0]->Email}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Password</td>
                <td class="text-success">{{$employee[0]->Password}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Nationality</td>
                <td>{{$employee[0]->Nationality}}</td>
            </tr>
            <tr>
                <td class="fw-bold">MobileNo</td>
                <td>{{$employee[0]->MobileNo}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Home Phone</td>
                <td>{{$employee[0]->HomePhone}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Full Address</td>
                <td>{{$employee[0]->FullAddress}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Education Level</td>
                <td>{{$employee[0]->EducationLevel}}</td>
            </tr>
            <tr>
                <td class="fw-bold">Last Degree</td>
                <td>{{$employee[0]->LastDegree}}</td>
            </tr>

        </table>

        <div class="row">








        </div>
        <!-- end of personal detail row -->
    </div>
</div>


<div class="card">
    <div class="card-header bg-transparent border-bottom h5">
        Marital Detail
    </div>
    <div class="card-body">

        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">
            <tr>
                <td class="fw-bold col-md-5">MaritalStatus</td>
                <td class="col-md-6">{{$employee[0]->MaritalStatus}}</td>

            </tr>

            <tr>
                <td class="fw-bold">SpouseName</td>
                <td>{{$employee[0]->SpouseName}}</td>
            </tr>



            <tr>
                <td class="fw-bold">SpouseEmployer</td>
                <td>{{$employee[0]->SpouseEmployer}}</td>
            </tr>
            <tr>
                <td class="fw-bold">SpouseWorkPhone</td>
                <td>{{$employee[0]->SpouseWorkPhone}}</td>
            </tr>


        </table>

    </div>
</div>



<div class="card">
    <div class="card-header bg-transparent border-bottom h5">
        Visa / Passport Section
    </div>
    <div class="card-body">

        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">
            <tr>
                <td class="fw-bold col-md-5">VisaIssueDate</td>
                <td class="col-md-6">{{$employee[0]->VisaIssueDate}}</td>

            </tr>
            <tr>
                <td class="fw-bold">VisaExpiryDate</td>
                <td>{{$employee[0]->VisaExpiryDate}}</td>
            </tr>
            <tr>
                <td class="fw-bold">PassportNo</td>
                <td>{{$employee[0]->PassportNo}}</td>
            </tr>



            <tr>
                <td class="fw-bold">PassportExpiry</td>
                <td>{{$employee[0]->PassportExpiry}}</td>
            </tr>



        </table>



    </div>
</div>




<div class="card">
    <div class="card-header bg-transparent border-bottom h5">
        Next of Kin
    </div>
    <div class="card-body">

        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">
            <tr>
                <td class="fw-bold col-md-5">NextofKinName</td>
                <td class="col-md-6">{{$employee[0]->NextofKinName}}</td>

            </tr>
            <tr>
                <td class="fw-bold">NextofKinAddress</td>
                <td>{{$employee[0]->NextofKinAddress}}</td>
            </tr>
            <tr>
                <td class="fw-bold">NextofKinPhone</td>
                <td>{{$employee[0]->NextofKinPhone}}</td>
            </tr>



            <tr>
                <td class="fw-bold">NextofKinRelationship</td>
                <td>{{$employee[0]->NextofKinRelationship}}</td>
            </tr>



        </table>





    </div>
</div>




<div class="card">
    <div class="card-header bg-transparent border-bottom h5  ">
        Offical Details
    </div>
    <div class="card-body">

        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">
            <tr>
                <td class="fw-bold col-md-5">JobTitle</td>
                <td class="col-md-6">{{$employee[0]->JobTitleName}}</td>

            </tr>
            <tr>
                <td class="fw-bold">DepartmentID</td>
                <td>{{$employee[0]->DepartmentName}}</td>
            </tr>
            <tr>
                <td class="fw-bold">SupervisorID</td>
                <td>{{$employee[0]->SupervisorID}}</td>
            </tr>



            <tr>
                <td class="fw-bold">WorkLocation</td>
                <td>{{$employee[0]->WorkLocation}}</td>
            </tr>
            <tr>
                <td class="fw-bold">EmailOffical</td>
                <td>{{$employee[0]->EmailOffical}}</td>
            </tr>
            <tr>
                <td class="fw-bold">WorkPhone</td>
                <td>{{$employee[0]->WorkPhone}}</td>
            </tr>
            <tr>
                <td class="fw-bold">StartDate</td>
                <td>{{$employee[0]->eDate}}</td>
            </tr>






        </table>


    </div>
</div>


<!-- end card -->




</div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </form>
          <!-- end card -->
        </div>

        <div class="col-xl-3">
          <div class="card">
            <div class="card-body p-4">

              <ul class="list-unstyled categories-list">
                <li>
                  <a href="" class="text-body d-flex align-items-center">
                    <i class="mdi mdi-speedometer-slow font-size-16 text-muted me-2"></i> <span class="me-auto">Dashboard</span>
                  </a>
                </li>



                <li>
                  <a href="" class="text-body d-flex align-items-center">
                    <i class="mdi mdi-folder font-size-16 text-warning me-2"></i> <span class="me-auto">Documents</span>
                  </a>
                </li>
                <li>
                  <a href="" class="text-body d-flex align-items-center">
                    <i class="mdi mdi-bank font-size-16 text-muted me-2"></i> <span class="me-auto">Salary</span>
                  </a>
                </li>

                <li>
                  <a href="" class="text-body d-flex align-items-center">
                    <i class="mdi mdi-account-cash font-size-20 text-muted me-2"></i> <span class="me-auto">Advance / Loan</span>
                  </a>
                </li>

                <li>
                  <a href="" class="text-body d-flex align-items-center">
                    <i class="mdi mdi-file-document font-size-18 me-2 text-muted "></i> <span class="me-auto">Letter</span>
                  </a>
                </li>
                <li>
                  <a href="" class="text-body d-flex align-items-center">
                    <i class="mdi mdi-calendar-cursor
                                                      font-size-16 me-2"></i> <span class="me-auto">Leave</span> <i class="mdi mdi-circle-medium text-danger ms-2"></i>
                  </a>
                </li>
                <li>
                  <a href="" class="text-body d-flex align-items-center">
                    <i class="mdi mdi-fingerprint
                                                          text-muted font-size-18 me-2"></i> <span class="me-auto">Attendance</span>
                  </a>
                </li>
                <li>
                  <a href="" class="text-body d-flex align-items-center">
                    <i class="bx bxs-error-circle

                                                          text-muted font-size-18 me-2"></i> <span class="me-auto">Warnings</span>
                  </a>
                </li>
                <li>
                  <a href="" class="text-body d-flex align-items-center">
                    <i class="fas fa-money-bill-alt
                                                          font-size-16 text-muted me-2"></i> <span class="me-auto">Deposit</span>
                  </a>
                </li>

                <li>
                  <a href="" class="text-body d-flex align-items-center">
                    <i class="mdi mdi-account-supervisor-circle
                                                          font-size-18 text-muted me-2"></i> <span class="me-auto">Supervising</span>
                  </a>
                </li>

                <li>
                  <a href="" class="text-body d-flex align-items-center">
                    <i class="mdi mdi-account-supervisor-circle
                                                      font-size-18 text-muted me-2"></i> <span class="me-auto">Salary Slip</span>
                  </a>
                </li>
                <!--   <li>
                                                            <a href="javascript: void(0);" class="text-body d-flex align-items-center">
                                                                <i class="mdi mdi-cog text-muted font-size-16 me-2"></i> <span class="me-auto">Setting</span><span class="badge bg-success rounded-pill ms-2">01</span>
                                                            </a>
                                                        </li> -->
              </ul>



            </div>
          </div>
          <!-- end card -->
        </div>
      </div>
    </div>
</div>

  @endsection