<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function showproducts(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('product')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<div class="dropdown">
        
                           <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <i class="fas fa-ellipsis-h"></i>
                             </a>
                           <div class="dropdown-menu">
                           <a class="dropdown-item" href ="productedetail/' . $row->ProductID . '"" class="btn btn-sm edit" title="Edit">View</a>
                               <a class="dropdown-item" href ="editproduct/' . $row->ProductID . '"" class="btn btn-sm edit" title="Edit">Edit</a>
                               <a class="dropdown-item" href ="#" onclick="delete_employee(' . $row->ProductID . ')" class="btn btn-sm edit" title="Edit" id="sa-params">
                                Delete</a>
                              
                           </div>
                       </div>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('products.index');
    }

    function productform()
    {
        $category = DB::table('categories')->get();
        $brand = DB::table('brand')->get();
        $unit = DB::table('unit')->get();
        // dd($brand[0]->BrandID);
        return view('products.add', compact('category', 'brand', 'unit'));
    }
    function editproduct($ProductID)
    {
        // dd($ProductID);

        $product =  DB::table('product')->where('ProductID', $ProductID)
            ->join('categories', 'product.CategoryId', 'categories.id')
            ->join('brand', 'product.BrandId', 'brand.BrandID')
            ->join('unit', 'product.UnitId', 'unit.id')
            ->select('product.*', 'brand.*', 'categories.name', 'unit.unit_name')
            // ->select('brand.Name')
            ->get();
        // dd($product);
        $category = DB::table('categories')->get();
        $brand = DB::table('brand')->get();
        $unit = DB::table('unit')->get();

        return view('products.editproduct', compact('product', 'category', 'brand', 'unit'));
    }

    function addproduct(Request $request)
    {

        //    dd($request->Image);


        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/products';
            $storage = $file->move($destinationPath, $fileName);
        }

        // dd($fileName);
        $data['Name'] = $request->Name;
        $data['Code'] = $request->Code;

        $data['BrandId'] = $request->BrandId;
        $data['CategoryId'] = $request->CategoryId;
        $data['UnitId'] = $request->UnitId;
        $data['Cost'] = $request->Cost;
        $data['Price'] = $request->Price;
        $data['Qty'] = $request->Qty;
        $data['AlertQuantity'] = $request->AlertQuantity;
        $data['PromotionPrice'] = $request->PromotionPrice;
        $data['StartingDate'] = $request->StartingDate;
        $data['LastDate'] = $request->LastDate;
        $data['Image'] = $fileName;

       

        DB::table('product')->insert($data);
        return view('products.index');
    }
    function deletproduct($ProductID)
    {
        // dd('hello');
        DB::delete('delete from product where ProductID = ?', [$ProductID]);
        return redirect()->back();
    }


    function updateproduct(Request $request)
    {
        // dd($request);
        if ($request->hasFile('Image')) {
            $file = $request->file('Image');
            $fileName = $file->getClientOriginalName();
            $destinationPath = public_path() . '/products';
            $storage = $file->move($destinationPath, $fileName);
        } else {
            $fileName = $request->oldpicture;
        }

        $data = array(
            'Name' => $request->Name,
            'Code' => $request->Code,
            'BrandId' => $request->BrandId,
            'CategoryId' => $request->CategoryId,
            'UnitId' => $request->UnitId,
            'Cost' => $request->Cost,
            'Price' => $request->Price,
            'Qty' => $request->Qty,
            'AlertQuantity' => $request->AlertQuantity,
            'PromotionPrice' => $request->PromotionPrice,
            'StartingDate' => $request->StartingDate,
            'LastDate' => $request->LastDate,
            'PromotionPrice' => $request->PromotionPrice,
            'StartingDate' => $request->StartingDate,
            'LastDate' => $request->LastDate,
            'Image' => $fileName,


        );


        // dd($request->ProductID);
        $id = DB::table('product')->where('ProductID', $request->ProductID)->update($data);


        return view('products.index');
    }
    function view_product($ProductID)
    {
        $product =  DB::table('product')->where('ProductID', $ProductID)
            ->join('categories', 'product.CategoryId', 'categories.id')
            ->join('brand', 'product.BrandId', 'brand.BrandID')
            ->join('unit', 'product.UnitId', 'unit.id')
            ->select('product.*', 'brand.*', 'categories.name', 'unit.unit_name')
            ->get();
        return view('products.view', compact('product'));
    }
}
