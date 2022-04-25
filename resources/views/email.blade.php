@extends('employe_section.layout.employeemain')

@section('title', 'Profile')
@section('content')

<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
        <div class="col-9">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Email Module</h4>
            <div class="page-title-right">
              <div class="page-title-right">
                <!-- <a href="/Report" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-arrow-left  me-1 pt-5"></i> Go Back</a> -->
              </div>
            </div>
          </div>
          <div class="col-xl-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title mb-4">Email Form</h4>

                <form action="{{ route('send.email') }}" method="post">
                  @csrf
                  @if(session()->has('message'))
                  <div class="alert alert-success">
                    {{ session()->get('message') }}
                  </div>
                  @endif
                  <div class="row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="name" id="horizontal-firstname-input" placeholder="Enter Your Name">
                      @error('name')
                      <span class="text-danger"> {{ $message }} </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label for="horizontal-email-input" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" name="email" class="form-control" id="horizontal-email-input" placeholder="Enter Your Email ID">
                      @error('subject')
                      <span class="text-danger"> {{ $message }} </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label for="horizontal-password-input" class="col-sm-3 col-form-label">Subject</label>
                    <div class="col-sm-9">
                      <input type="text" name="subject" class="form-control" id="horizontal-password-input" placeholder="Enter Your Subject">
                      @error('subject')
                      <span class="text-danger"> {{ $message }} </span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-4">
                    <label for="horizontal-password-input" class="col-sm-3 col-form-label">Message</label>
                    <div class="col-sm-9">
                      <textarea name="content" class="form-control" rows="5" required=""></textarea>
                      @error('content')
                      <span class="text-danger"> {{ $message }} </span>
                      @enderror
                    </div>
                  </div>

                  <div class="row justify-content-end">
                    <div class="col-sm-9">
                      <div>
                        <button type="submit" class="btn btn-success w-md">Submit</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- end card body -->
            </div>
            <!-- end card -->
          </div>
        </div>
        @include('template.emp_sidebar')
      </div>
    </div>
  </div>
  

  @endsection