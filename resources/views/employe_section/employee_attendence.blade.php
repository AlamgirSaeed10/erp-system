@extends('employe_section.layout.employeemain')
@section('title', 'Employee Letter')
@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Employee Attendence</h4>
                        <div class="page-title-right">
                            <div class="page-title-right">
                                <a href="" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-arrow-left  me-1 pt-5"></i> Go Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                    <div class="card">
                        <div class="card-header bg-transparent border-bottom h5  ">
                            Attendance Section
                        </div>
                        <div class="card-body">
                            @if(count($attendance)!=0)
                            <div class="table-responsive">
                                <table class="table table-striped mb-0 table-sm">

                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($attendance as $value)
                                        <tr>
                                            <th scope="row">{{$i++}}</th>
                                            <td>{{$value->DateTime}}</td>
                                            <td>{{$value->Status}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <p class="text-danger text-center">No Record Found</p>
                            @endif
                        </div>
                    </div>
                </div>
                @include('template.emp_sidebar')
            </div>
        </div>
    </div>
@endsection