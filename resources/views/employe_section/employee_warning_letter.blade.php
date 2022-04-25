@extends('employe_section.layout.employeemain')
@section('title', 'Warning Letter')
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
                                 
                            <div >
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



                        
                                <!-- end card -->

                                 <div class="row">
                            <div class="col-lg-12">
                                <div class="card " >

                                     <div class="card-body card-body border-primary border-top border-1 rounded-top">

                                        <h4 class="card-title ">Warning Letters</h4>

<p class="card-title-desc"> </p>     
 <table class="table table-hover align-middle table-sm table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>
                                                         
                                                        <th class="col-1" class="align-middle">#</th>
                                                         <th class="col-9">Title</th>
                                                         <th class="col-2">Date</th>
                                                          <th class="col-1">Action</th>
                                                    </tr>
                                                </thead>

 
                                                <tbody>

                                                    <tr>
                                                         
                                                        <td>1</td>
                                                          <td>hgh</td>
                                                         <td>ghgfhfl</td>
                                                          <td>
                                                            
                                                             

        <div class="d-flex gap-3">
        <a href="#" class="text-success"><i class="mdi mdi-pencil font-size-15"></i></a>
        <a href="#" class="text-secondary"><i class="mdi mdi-printer font-size-15"></i></a>
        <a href="#"     class="text-danger"><i class="mdi mdi-delete font-size-15"></i></a>
                                                             </div>
                                                        </td>
                                                    </tr>



                                                </tbody>
                                            </table>

                                                      </div>
                                </div>
                            </div>
  </div>
                            </div>
                            <!-- end col -->
                         
                         <!-- employee detail side bar -->
                         @include('template.emp_sidebar')

                           
                        </div>
                        <!-- end row -->

                      

                       

                         
                     
                        
                    </div> <!-- container-fluid -->
                </div>


  @endsection