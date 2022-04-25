@extends('layout.main')

@section('title', 'Home')


@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Leave</h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Leaves Form</h4>
                        <form action="/updateleave/<?php echo $leaves[0]->LeaveID; ?>" method="POST">
                            @csrf
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Employee Name</label>
                                    <select name="BranchID" class="form-control select2">
                                        <option>Select..</option>
                                        @foreach ($employees as $employee=>$value)
                                        <option value="{{ $value->EmployeeID }}">{{ $value->FirstName }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color: red">@error('BranchID'){{ $message }} @enderror </span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="formrow-inputCity" class="form-label">From Date</label>
                                            <input type="date" name="FromDate" value ='<?php echo$leaves[0]->FromDate; ?>' class="form-control" id="formrow-inputCity" placeholder="Enter Your From Date">
                                            <span style="color: red">@error('FromDate'){{ $message }} @enderror </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="formrow-inputZip" class="form-label">To Date</label>
                                            <input type="date" name="ToDate" value ='<?php echo$leaves[0]->ToDate; ?>' class="form-control" id="formrow-inputZip" placeholder="Enter Your To Date">
                                            <span style="color: red">@error('ToDate'){{ $message }} @enderror </span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label class="form-label">Textarea</label>
                                        <div>
                                            <textarea name="Reason" value ='<?php echo$leaves[0]->Reason; ?>' class="form-control" rows="5" style="width: 860px;"></textarea>
                                            <span style="color: red">@error('Reason'){{ $message }} @enderror </span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success w-md">Update</button>
                                </div>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end card body -->
        </div>
    </div>
</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->

<!-- Transaction Modal -->
<div class="modal fade transaction-detailModal" tabindex="-1" role="dialog" aria-labelledby="transaction-detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transaction-detailModalLabel">Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">Product id: <span class="text-primary">#SK2540</span></p>
                <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span></p>

                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <img src="assets/images/product/img-7.png" alt="" class="avatar-sm">
                                    </div>
                                </th>
                                <td>
                                    <div>
                                        <h5 class="text-truncate font-size-14">Wireless Headphone (Black)</h5>
                                        <p class="text-muted mb-0">$ 225 x 1</p>
                                    </div>
                                </td>
                                <td>$ 255</td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div>
                                        <img src="assets/images/product/img-4.png" alt="" class="avatar-sm">
                                    </div>
                                </th>
                                <td>
                                    <div>
                                        <h5 class="text-truncate font-size-14">Phone patterned cases</h5>
                                        <p class="text-muted mb-0">$ 145 x 1</p>
                                    </div>
                                </td>
                                <td>$ 145</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6 class="m-0 text-right">Sub Total:</h6>
                                </td>
                                <td>
                                    $ 400
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6 class="m-0 text-right">Shipping:</h6>
                                </td>
                                <td>
                                    Free
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <h6 class="m-0 text-right">Total:</h6>
                                </td>
                                <td>
                                    $ 400
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
</div> -->

@endsection