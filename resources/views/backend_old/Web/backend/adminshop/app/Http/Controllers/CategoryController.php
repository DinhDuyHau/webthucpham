<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Component\Recursive;



class CategoryController extends Controller
{
    use DeleteModelTrait;
    private $category;
    public function __construct(Category $category){
        $this->category = $category;
    }

    public function index(){
            $categories = $this->category->Simplepaginate(5);
            return view('category.index', compact('categories'));
        }

    public function create(){
            $htmloption = $this->getcategory($parentId='');
            return view('category.add', compact('htmloption'));
        }

    public function getcategory($parentId){
        $data = $this->category->All();
        $recursive = new Recursive($data);
        $htmloption = $recursive->CategoryRecursive($parentId);
        return $htmloption;

    }
    public function store(Request $request){
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str::slug($request->name)

        ]);
        return redirect()->route('category_index');

    }
    public function edit($id){
        $category = $this->category->find($id);
        $htmloption = $this->getcategory($category->parent_id);
        return view('category.edit', compact('category', 'htmloption'));

    }

    public function update($id, Request $request){
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str::slug($request->name)
        ]);
        return redirect()->route('category_index');

    }
    public function delete($id){
        return $this->deleteModelTrait($id, $this->category);
    }
}
