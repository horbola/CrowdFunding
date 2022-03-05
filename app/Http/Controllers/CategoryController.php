<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller {

    public function index(Request $request) {
        $categories = Category::all();
        $title = 'Category';
        $menuName = 'platform';
        return view('campaign.campaigns-category', compact('categories', 'request', 'title', 'menuName'));
    }
    
    public function store(Request $request) {
        $rules = [
            'category_name' => 'required|string:100',
            'category_image' => 'required|mimes:jpeg,jpg,png'
        ];
        $this->validate($request, $rules);

        $slug = Str::slug($request->category_name);
        $duplicate = Category::where('category_slug', $slug)->count();
        if ($duplicate > 0) {
            return back()->with('error', trans('app.category_exists_in_db'));
        }

        $image = $request->file('category_image');
        $image_base_name = str_replace('.' . $image->getClientOriginalExtension(), '', $image->getClientOriginalName());
        $image_name = strtolower(time().Str::random(5).'-'.Str::slug($image_base_name)).'.' . $image->getClientOriginalExtension();
        
        $publicPath = public_path();
        // this is root relative path. but
        // this 'uploads/avatar/' is file relative path.
        $categoryPath = 'uploads/category/';
        $categoryFullPath = $publicPath.'/'.$categoryPath;
        $imagePublicPath = $categoryPath.$image_name;
        $dbPath = '/'.$imagePublicPath;
        
        if (!file_exists($categoryFullPath)) {
            mkdir($categoryFullPath, 0777, true);
        }
        
        $resized = Image::make($image)->resize(100, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        try {
            // Uploading avatar
            $resized->save($imagePublicPath);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
        $data = [
            'category_name' => $request->category_name,
            'category_slug' => $slug,
            'category_image' => $dbPath,
            'show_in_home' => true,
        ];
        $create = Category::create($data);
        if($create){
            return back()->with('success', trans('app.category_created'));
        }
        return back()->with('error', 'Category couldn\'t be created');
    }
    
    
    public function update(Request $request, $categoryId) {
        $rules = [
            'category_image_edit' => 'required|mimes:jpeg,jpg,png'
        ];
        $this->validate($request, $rules);

        $image = $request->file('category_image_edit');
        $image_base_name = str_replace('.' . $image->getClientOriginalExtension(), '', $image->getClientOriginalName());
        $image_name = strtolower(time().Str::random(5).'-'.Str::slug($image_base_name)).'.' . $image->getClientOriginalExtension();
        
        $publicPath = public_path();
        // this is root relative path. but
        // this 'uploads/avatar/' is file relative path.
        $categoryPath = 'uploads/category/';
        $categoryFullPath = $publicPath.'/'.$categoryPath;
        $imagePublicPath = $categoryPath.$image_name;
        $dbPath = '/'.$imagePublicPath;
        
        if (!file_exists($categoryFullPath)) {
            mkdir($categoryFullPath, 0777, true);
        }
        
        $resized = Image::make($image)->resize(100, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $category = Category::find($categoryId);
        try {
            // Uploading avatar
            $resized->save($imagePublicPath);
            $previous_image = $category->category_image;
            $category->category_image = $dbPath;
            $category->update();
            if ($previous_image) {
                if (file_exists($publicPath.$previous_image)) {
                    unlink($publicPath.$previous_image);
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        
        if($request->hasFile('category_image_edit')){
            return back()->with('success', trans('app.category_created'));
        }
        return back()->with('error', 'Category couldn\'t be created');
    }
    
    
    public function destroy($categoryId) {
        $category = Category::find($categoryId);
        $deleted = $category->delete();
        if($deleted){
            try {
                $previous_image = $category->category_image;
                $publicPath = public_path();
                if ($previous_image && (file_exists($publicPath.$previous_image))) {
                    unlink($publicPath.$previous_image);
                }
            } catch (\Exception $e) {
                return $e->getMessage();
            }
            return back()->with('success', 'category deleted');
        }
        return back()->with('error', 'Category couldn\'t be deleted');
    }

}
