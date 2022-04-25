@extends('layout.main')

@section('title', 'Product Details')


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
                              
                                    @if($product[0]->Image == Null)
                                    <td>   No Image </td>
                                    @else

                                  <td>  <img src="{{asset('products')}}/{{$product[0]->Image}}" style="height:50px; width:50px">   </td>

                                    @endif
                             
                            </tr>
                            <tr>
                                <td class="fw-bold">Name</td>
                                <td>{{$product[0]->Name}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Code</td>
                                <td>{{$product[0]->Code}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Brand</td>
                                <td>{{$product[0]->PName}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Category</td>
                                <td>{{$product[0]->name}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Unit</td>
                                <td>{{$product[0]->unit_name}}</td>
                            </tr>
                            
                            <tr>
                                <td class="fw-bold">Cost</td>
                                <td>{{$product[0]->Cost}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Price</td>
                                <td>{{$product[0]->Price}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Qty</td>
                                <td class="text-success">{{$product[0]->Qty}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Promotion</td>
                                <td>{{$product[0]->PromotionPrice}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">StartingDate</td>
                                <td>{{$product[0]->StartingDate}}</td>
                            </tr>
                            <tr>
                                <td class="fw-bold">LastDate</td>
                                <td>{{$product[0]->LastDate}}</td>
                            </tr>
                            
                            

                        </table>

                    
                    </div>
                </div>


               


               




                




               


                <!-- end card -->




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

    @endsection