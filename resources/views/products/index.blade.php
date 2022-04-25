@extends('layout.main')

@section('title', 'Product')


@section('content')

    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Product</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">Products Data</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Product<a href="{{ route('productform') }}"><button
                                            class="btn btn-primary" style="float:right">Add Product</button></a> </h4>
                                <br><br>
                                <table id="datatable"
                                    class="table table-bordered dt-responsive  nowrap w-100 employeetable">
                                    <thead>
                                        <tr>
                                         
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Price</th>
                                            <th>Cost</th>
                                            <th>Qty</th>
                                            <th>Alert Qty</th>
                                            <th>Action</th>
                                            {{-- <th>Tittle</th>
                                                <th>Action</th> --}}
                                        </tr>
                                    </thead>


                                    <tbody>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->



            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


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
    <!-- end main content-->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
    
    <script>
    
        function delete_employee(id) {


            url = '{{ URL::TO('/') }}/' + 'deleteproduct' + '/' + id;
            // alert(id);



            jQuery('#staticBackdrop').modal('show', {
                backdrop: 'static'
            });
            document.getElementById('delete_link').setAttribute('href', url);

        }


        $(function() {

            var table = $('.employeetable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('showproducts') }}",
                columns: [

                    {
                        data: 'Image',
                        render: function(data, type, row, meta){
                            var a =`
                            <img src="{{asset('products')}}/${row.Image}"
                            width="100" height="100" />`;
                            return a;
                        },
                        
                    },
                    {
                        data: 'Name',
                        name: 'Name '
                    },
                    {
                        data: 'Code',
                        name: 'Code'
                    },
                    {
                        data: 'Cost',
                        name: 'Cost'
                    },
                    {
                        data: 'Price',
                        name: 'Price'
                    },
                    {
                        data: 'Qty',
                        name: 'Qty'
                    },
                    {
                        data: 'AlertQuantity',
                        name: 'AlertQuantity'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
    
    </script>
@endsection

