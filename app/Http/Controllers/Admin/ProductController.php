<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    const TITLE = 'Product';
    const VIEW = 'admin/product';
    const URL = 'admin/products';


    public function __construct()
    {
        view()->share([
            'url' => url(self::URL),
            'title' => self::TITLE,
            'image_url' => env('APP_IMAGE_URL') . 'product',
        ]);
    }
    public function toString($value)
    {
        return '"' . (string)($value) . '"';
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('view_product'), Response::HTTP_FORBIDDEN, 'Forbidden');

        if ($request->ajax()) {
            $records = Product::latest()->get()
                ->map(function ($r,$key) {
                    $url = url(self::URL);
                    $delete_url = $this->toString($url . '/' . $r->id);
                    $user=User::find(Auth::id());
                    if($user->can('edit_product')){
                        $name="<a href='$url/$r->id/edit' class='toggle' data-target='editClass'><span>$r->name</span></a>";
                    }else{
                        $name="<a href='#' class='toggle' data-target='editClass'><span>$r->name</span></a>";

                    }
                    $edit=$user->can('edit_product')?
                        "<li><a href='$url/$r->id/edit' class='toggle' data-target='editClass'><em
                        class='icon ni ni-edit'></em><span>Edit</span></a>
                        </li>":"";
                    $delete=$user->can('delete_product')?" <li><a href='javascript:'   onclick='deleteRecordAjax($delete_url)' ><em
                    class='icon ni ni-trash'></em><span>Delete</span></a>
                    </li>" : "";
                    $actions = '';
                    $price = "{$r->getPrice()}";
                    $stock = "{$r->getStock()}";
                    $actions .= "
                                <ul class='nk-tb-actions gx-1'>
                                <li>
                                    <div class='drodown'>
                                        <a href='#'
                                            class='dropdown-toggle btn btn-sm btn-icon btn-trigger'
                                            data-toggle='dropdown'><em class='icon ni ni-more-h'></em></a>
                                        <div class='dropdown-menu dropdown-menu-right'>
                                            <ul class='link-list-opt no-bdr'>
                                               $edit
                                               $delete
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                   ";
                    return [
                        'id' => $key + 1,
                        'image' => $r->getFirstImage(),
                        'name' => $name,
                        'sku' => $r->sku,
                        'empty' =>'',
                        'sale_price' => $price,
                        'stock' => $stock,
                        'size' => $r->getProductSizes(),
                        'created_at' => $r->created_at->format('M d,Y'),
                        'updated_at' => $r->updated_at->format('M d,Y'),
                        'actions' => $actions,

                    ];
                });
            return DataTables::of($records)
                ->rawColumns(['actions','name', 'sale_price','size', 'stock'])
                ->make(true);
        }
        return view(self::VIEW . '.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:250',
            'sku' => 'required|min:3|max:250',
            'stock' => 'required',
            'sale_price' => 'required',
            'description' => 'required',
            'product_size' => 'required',
        ]);
        $product = new Product();
        $product->fill($request->all());
        $product->user_id = Auth::id();
        $product->save();
        if ($request->images) {
            foreach ($request->images as $image) {
                $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/product', $name);
                $image_name = $name;
                Image::saveImage([
                    'image' => $image_name,
                    'imageable_type' => Product::class,
                    'imageable_id' => $product->id,
                ]);
            }
        }
        if($request->product_size){
            foreach($request->product_size as $size){
                ProductSize::create([
                    'product_id'=>$product->id,
                    'name'=>$size['name'],
                ]);
            }

        }
        return response()->json(
            [
                'success' => true,
                'message' => 'Record Add Successfully'
            ],
            200
        );
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        abort_if(Gate::denies('edit_product'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $product = Product::findOrFail($id);
        $images = $product->images;
        return view(self::VIEW . '.edit', get_defined_vars());
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:250',
            'sku' => 'required|min:3|max:250',
            'stock' => 'required',
            'sale_price' => 'required',
            'product_size' => 'required',
        ]);
        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();

        if (!$request->old) {
            Image::where('imageable_type', Product::class)->where('imageable_id', $product->id)->delete();
        } else {
            Image::where('imageable_type', Product::class)->where('imageable_id', $product->id)
                ->whereNotIn('id', $request->old)->delete();
        }
        if ($request->images) {
            foreach ($request->images as $image) {
                $name = rand(10, 100) . time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/product', $name);
                $image_name = $name;
                Image::saveImage([
                    'image' => $image_name,
                    'imageable_type' => Product::class,
                    'imageable_id' => $product->id,
                ]);
            }
        }
        if($request->product_size){
            ProductSize::where('product_id', $product->id)->delete();
            foreach($request->product_size as $size){
                ProductSize::create([
                    'product_id'=>$product->id,
                    'name'=>$size['name'],
                ]);
            }

        }
        return response()->json(
            [
                'success' => true,
                'message' => 'Record Update Successfully'
            ],
            200
        );
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return 1;
        }
    }
}
