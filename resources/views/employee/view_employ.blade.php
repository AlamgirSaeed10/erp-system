@extends('layout.main')

@section('title', 'Employee Details')


@section('content')

<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Employee</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">Employee Persnal Information</li>

              </ol>
            </div>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="card">
          <div class="card-header bg-transparent border-bottom h5">
            Personal Information
          </div>
          <div class="card-body">
            <!-- start of personal detail row -->
            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">


              <tr>
              <td class="fw-bold">Image</td>
                @if({{$employee[0]->Picture}} == '')
                <td>No image</td>
                @else
                <td><img src="{{asset('employee_pictures')}}/{{$employee[0]->Picture}}" style="height:50px; width:50px"></td>
                @endif
              
               
              </tr>
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


            <div class="row">

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



                <div class="card">
                    <div class="card-header bg-transparent border-bottom h5">
                        Personal Information
                    </div>
                    <div class="card-body">
                        <!-- start of personal detail row -->
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-striped table-sm table-responsive">


                            <tr>

                                <td class="fw-bold">Image</td>
                              
                                    @if($employee[0]->Picture == Null)
                                    <td>   No Image </td>
                                    @else

                                  <td>  <img src="{{asset('employee_pictures')}}/{{$employee[0]->Picture}}" style="height:50px; width:50px">   </td>

                                    @endif
                             
                            </tr>
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

            </table>


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


            </table>


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


        <div class="card">
          <div class="card-header bg-transparent border-bottom h5  ">
            Offical Details
          </div>
          <div class="card-body">

                        </table>

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

  <!-- my own model -->

  <!-- end of my own model -->

    <!-- my own model -->

    <!-- end of my own model -->

    @endsection
