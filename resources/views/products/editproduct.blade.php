@extends('layout.main')

@section('title', 'Add Product')


@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">

                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Product Section</h4>

                        <div class="page-title-right">
                            <div class="page-title-right">
                                <!-- button will appear here <-->
                                <a href="{{ URL('/product') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2 w-md"><i class="mdi mdi-arrow-left pr-3"></i> Go Back</a>
                                </-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->








            <form action="{{ route('updateproduct') }}" method="post" enctype="multipart/form-data">
                <div class="row">

                    @csrf


                    <div>
                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                                Product Information
                            </div>
                            <div class="card-body">
                                <!-- start of personal detail row -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Product Name</label>
                                            <input type="text" class="form-control" name="Name" value="{{ $product[0]->Name }}">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Code</label>
                                            <input type="text" class="form-control" name="Code" value="{{ $product[0]->Code }}">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Brand <span class="text-danger">*</span></label>
                                            <select name="BrandId" id="BrandID" class="form-select">
                                            <option>---Select----</option>
                                                @foreach ($brand as $valueb)
                                                <option value="{{ $valueb->BrandID }}"{{ $product[0]->PName == $valueb->PName ? 'selected=selected' : '' }}>
                                                    {{ $valueb->PName }}</option>
                                            @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Category <span class="text-danger">*</span></label>
                                            <select name="CategoryId" id="BrandID" class="form-select">
                                                <option>---Select----</option>
                                                @foreach ($category as $valuec)
                                                <option value="{{ $valuec->id }}"{{ $product[0]->name == $valuec->name ? 'selected=selected' : '' }}>
                                                    {{ $valuec->name }}</option>
                                            @endforeach


                                            </select>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Unit <span class="text-danger">*</span></label>
                                            <select name="UnitId" id="BrandID" class="form-select">
                                                <option>---Select----</option>
                                                @foreach ($unit as $valueu)
                                                <option value="{{ $valueu->id }}"{{ $product[0]->unit_name == $valueu->unit_name ? 'selected=selected' : '' }}>
                                                    {{ $valueu->unit_name }}</option>
                                            @endforeach


                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Cost</label>
                                            <input type="number" class="form-control" name="Cost" value="{{ $product[0]->Cost }}">
                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Price</label>
                                            <input type="number" class="form-control" name="Price" value="{{ $product[0]->Price }}">
                                        </div>


                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Qty</label>
                                            <input type="number" class="form-control" name="Qty" value="{{ $product[0]->Qty }}">
                                        </div>


                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Alert Qty</label>
                                            <input type="number" class="form-control" name="AlertQuantity" value="{{ $product[0]->AlertQuantity }}">
                                        </div>


                                    </div>

                                </div>
                                <!-- end of personal detail row -->
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                                Image
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input" class="pr-5">
                                            Upload Staff Picture
                                            </label><br>
                                        <input type="file" name="Image"></div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="card">
                            <div class="card-header bg-transparent border-bottom h5">
                                Promotion
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Promotion Price</label>
                                            <input type="number" class="form-control" name="PromotionPrice" value="{{ $product[0]->PromotionPrice }}">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Starting Date <span class="text-danger">*</span></label>


                                            <input type="date" name="StartingDate" id="input-date1" class="form-control input-mask" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" value="{{ $product[0]->StartingDate }}" im-insert="false">
                                            <span class="text-muted">e.g "dd/mm/yyyy"</span>



                                        </div>


                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Ending Date <span class="text-danger">*</span></label>


                                            <input type="date" name="LastDate" id="input-date1" class="form-control input-mask" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy" value="{{ $product[0]->LastDate }}" im-insert="false">
                                            <span class="text-muted">e.g "dd/mm/yyyy"</span>



                                        </div>


                                    </div>

                                    

                                </div>
                            </div>
                        </div>


                        
                        <!-- <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Product Images</h4>

                                <form action="https://themesbrand.com/" method="post" class="dropzone">
                                    <div class="fallback">
                                        <input name="Image" type="file" multiple />
                                    </div>

                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                        </div>

                                        <h4>Drop files here or click to upload.</h4>
                                    </div>
                                </form>
                            </div>

                        </div> end card -->
                        <input type="hidden" class="form-control" name="ProductID"   value="{{$product[0]->ProductID}}">
                        <input type="hidden" class="form-control" name="oldpicture"   value="{{$product[0]->Image}}">

                        <div><button type="submit" class="btn btn-success w-lg float-right">Save /
                                Update</button>
                            <a href="#" onclick="history.back()" class="btn btn-secondary w-md float-right">Cancel</a>
                        </div>



                    </div>

                </div>
        </div>
    </div>
</div>
</div>
</form>






</div> <!-- container-fluid -->
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


@endsection