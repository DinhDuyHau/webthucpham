<?php

namespace App\Http\Controllers;

use App\Component\Recursive;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    use DeleteModelTrait;
    public function __construct( Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->$productTag = $productTag;
    }

    public function index(){
        $products = $this->product->Simplepaginate(5);
        return view('product.index', compact('products'));
    }
    public function create(){
        $htmloption = $this->getcategory($parentId='');
        return view('product.add', compact('htmloption'));
    }

    public function getcategory($parentId){
        $data = $this->category->All();
        $recursive = new Recursive($data);
        $htmloption = $recursive->CategoryRecursive($parentId);
        return $htmloption;

    }
    public function store(ProductRequest $request){

//        try {
//            DB::beginTransaction();
        //insert to product
        $dataProductCreat =[
            'name' => $request->name,
            'price' => $request->price,
            'feature_image_path' => $request-> feature_image_path,
            'content' => $request->contents,
            'user_id' => auth()->id(),
            'category_id' => $request->category_id

        ];

        $dataupload = $this->StoreImageUpload($request, 'feature_image_path', 'product');
        if(!empty($dataupload)){
            $dataProductCreat ['feature_image_name'] = $dataupload['file_name'];
            $dataProductCreat ['feature_image_path'] = $dataupload['file_path'];
        }
        $product = $this->product->create($dataProductCreat);

        //insert to productimage
        if( $request->hasFile('image_path') ){
            foreach ($request->image_path as $fileItem){
                $dataProductDetail = $this->StorageImageuploadMultiple($fileItem, 'product');
                $product->images()->create([
                    'image_path' => $dataProductDetail['file_path'],
                    'image_name' => $dataProductDetail['file_name']
                ]);
            }
        }
        //insert tags for product
        if (!empty($request->tags)){
            foreach ($request->tags as $tagItem){
                //insert to tags
                $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                $tagIds[] = $tagInstance->id;
            }
            $product->tags()->attach($tagIds);
        }


//            DB::commit();
        return redirect()->route('product_index');
//        }
//        catch (\Exception $exception)
//        {
//            DB::rollBack();
//            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
//        }
    }
    public function update(Request $request, $id){
//        try {
//            DB::beginTransaction();
            //insert to product
            $dataProductUpdate =[
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'category_id' => $request->category_id
            ];

            $dataupload = $this->StoreImageUpload($request, 'feature_image_path', 'product');
            if(!empty($dataupload)){
                $dataProductUpdate ['feature_image_name'] = $dataupload['file_name'];
                $dataProductUpdate ['feature_image_path'] = $dataupload['file_path'];
            }
            $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);

            //insert to productimage
            if( $request->hasFile('image_path') ){
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem){
                    $dataProductDetail = $this->StorageImageuploadMultiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductDetail['file_path'],
                        'image_name' => $dataProductDetail['file_name']
                    ]);
                }
            }
            //insert tags for product
            if (!empty($request->tags)){
                foreach ($request->tags as $tagItem){
                    //insert to tags
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
                $product->tags()->sync($tagIds);
            }


//            DB::commit();
            return redirect()->route('product_index');
        }
//        catch (\Exception $exception)
//        {
//            DB::rollBack();
//            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
//        }


    public function edit($id){
        $product = $this->product->find($id);
        $htmloption = $this->getcategory($product->category_id);
        return view('product.edit',compact('htmloption', 'product'));
    }
    public function delete($id){
        return $this->deleteModelTrait($id, $this->product);
    }
}
