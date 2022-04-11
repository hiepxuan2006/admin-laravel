<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Http\Requests\ProductAddRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\StorageImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;

class ProductController extends Controller
{
    use StorageImage;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;


    public function __construct(Category $category, Product $product, ProductImage $productImage, ProductTag $productTag, Tag $tag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }
    public function getCategory($parentID)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->CategoryRecusive($parentID);
        return $htmlOption;
    }
    // danh sách sản phẩm
    public function index()
    {
        $productsData = $this->product->latest()->paginate(5);
        return view('admin.product.indexProduct', compact('productsData'));
    }
    // khởi tạo trang thêm sản phẩm
    public function create()
    {
        $htmlOption = $this->getCategory('');
        return view('admin.product.addProduct', compact('htmlOption'));
    }
    // thêm sản phẩm vào data
    public function store(ProductAddRequest $request)
    {
        try {
            //code...
            DB::beginTransaction();
            $dataProduct = [
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'slug' => Str::slug($request->name)
            ];
            $dataImage = $this->starogeUpload($request, 'feature_image_path', '/product');
            if (!empty($dataImage)) {
                $dataProduct['feature_image_path'] = $dataImage['file_path'];
            }
            $product = $this->product->create($dataProduct);
            // lưu image chi tiết vào bảng ProductImage
            if ($request->hasFile('image_path')) {

                foreach ($request->image_path as $fileItem) {
                    $dataImageDetail = $this->starogeUploadMulti($fileItem, '/productDetail');
                    $product->ProductImageComment()->create([
                        'image_path' => $dataImageDetail['file_path']
                    ]);
                }
            }
            // lưu tags vào bảng Tags
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tagData = $this->tag->firstOrCreate([
                        'name' => $tagItem
                    ]);
                    // $this->productTag->create([
                    //     'product_id' => $product->id,
                    //     'tag_id' => $tagData->id

                    // ]);
                    $tagIds[] = $tagData->id;
                }
                $product->TagsComment()->attach($tagIds);
            }
            DB::commit();
            return redirect(route('product.index'));
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
        // lưu ảnh vào bảng product

    }
    public function edit($id)
    {
        $productItem = $this->product->find($id);
        $htmlOption = $this->getCategory($productItem->category_id);
        // dd($productItem->ProductImageComment);
        return view('admin.product.editProduct', compact('htmlOption', 'productItem'));
    }
    public function update(Request $request, $id)
    {
        try {
            //code...
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'content' => $request->contents,
                'user_id' => auth()->id(),
                'slug' => Str::slug($request->name)

            ];
            $dataImage = $this->starogeUpload($request, 'feature_image_path', '/product');
            if (!empty($dataImage)) {
                $dataProductUpdate['feature_image_path'] = $dataImage['file_path'];
            }
            $results =  $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);
            // // lưu image chi tiết vào bảng ProductImage
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataImageDetail = $this->starogeUploadMulti($fileItem, '/productDetail');
                    $product->ProductImageComment()->create([
                        'image_path' => $dataImageDetail['file_path']
                    ]);
                }
            }
            // lưu tags vào bảng Tags
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tagData = $this->tag->firstOrCreate([
                        'name' => $tagItem
                    ]);
                    // $this->productTag->create([
                    //     'product_id' => $product->id,
                    //     'tag_id' => $tagData->id

                    // ]);
                    $tagIds[] = $tagData->id;
                }
                $product->TagsComment()->sync($tagIds);
            }
            DB::commit();
            return redirect(route('product.index'));
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
        }
    }
    public function del($id)
    {
        try {
            //code...
            $this->product->find($id)->delete();
            return response()->json([
                'code' => 200,
                'status' => 'success'
            ], status: 200);
        } catch (\Throwable $th) {
            throw $th;
            return response()->json([
                'code' => 500,
                'status' => 'fail'
            ], status: 500);
        }
    }
}
