<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(15);
        return view('admin.categories.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_category = Category::where('parent_id', 0)->get();
        $attributes = Attribute::all();
        return view('admin.categories.create' , compact('parent_category', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|max:30",
            "slug" => "required|unique:categories,slug",
            "parent_id" => "required",
            "is_active" => "required",
            "attribute_ids" => "required",
            "attribute_is_filter_ids" => "required",
            "variation_id" => "required",
        ]);

        try {

            DB::beginTransaction();

            $category = Category::create([
                "name" => $request->name,
                "slug" => $request->slug,
                "parent_id" => $request->parent_id,
                "is_active" => $request->is_active,
                "icon" => $request->icon,
                "description" => $request->description,
            ]);

            foreach ($request->attribute_ids as $attribute_id) {
                $attribute = Attribute::findOrFail($attribute_id);
                $attribute -> categories()->attach($category->id , [
                    'is_filter' => in_array( $attribute_id , $request->attribute_is_filter_ids) ? 1 : 0,
                    'is_variation' =>$request->variation_id == $attribute_id ? 1 : 0,
                ]);
            }




            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error('Category Cant Create', '!Noooo')->persistent("Ok");
            return redirect()->back();
        }

            alert()->success('Category Saved', '!Yessss');

            return redirect()->route('admin.categories.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show' , compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $parent_category = Category::where('parent_id', 0)->get();
        $attributes = Attribute::all();
        return view('admin.categories.edit' , compact('category' , 'parent_category', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,'.$category->id,
            'parent_id' => 'required',
            "is_active" => "required",
            'attribute_ids' => 'required',
            'attribute_is_filter_ids' => 'required',
            'variation_id' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $category->update([
                'name' => $request->name,
                'slug' => $request->slug,
                "is_active" => $request->is_active,
                'parent_id' => $request->parent_id,
                'icon' => $request->icon,
                'description' => $request->description,
            ]);

            $category->attributes()->detach();

            foreach ($request->attribute_ids as $attributeId) {
                $attribute = Attribute::findOrFail($attributeId);
                $attribute->categories()->attach($category->id, [
                    'is_filter' => in_array($attributeId, $request->attribute_is_filter_ids) ? 1 : 0,
                    'is_variation' => $request->variation_id == $attributeId ? 1 : 0
                ]);
            }

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش دسته بندی', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }

        alert()->success('دسته بندی مورد نظر ویرایش شد', 'باتشکر');
        return redirect()->route('admin.categories.index');
    }


    public function destroy($id)
    {
        //
    }

    public function getCategoryAttributes(Category $category)
    {
        $attributes = $category->attributes()->wherePivot('is_variation' ,0)->get();
        $variation = $category->attributes()->wherePivot('is_variation' ,1)->first();
        return ['attrubtes' => $attributes , 'variation' => $variation];
    }
    
}
