<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('admin.home');
    }


    // Category functionality
    public function addCategory()
    {
        return view('admin.Category.addCategory');
    }

    public function saveCategory(Request $request)
    {
        $category_name = $request->category_name;
    
        $Testi = new Category();
        $Testi->category_name = $category_name;
        $Testi->save();

        return redirect()->back()->withSuccess("Record Added successfully");

    }

    public function ListCategory()
    {
        $Category = Category::orderBy('id','desc')->get();
        return view ('admin.Category.listCategory', compact('Category'));
    }

    public function deleteCategory($id)
    {
        $res=Category::find($id)->delete();
        return redirect()->back()->withSuccess("Record deleted successfully");
    }

    public function editCategory($id)
    {
        return view('admin.Category.editCategory');
    }

    public function updateCategory(Request $request)
    {

        $Category_id = $request->Category_id;
        $category_name = $request->category_name;

        Category::where('id',$Category_id)
            ->update(['category_name' =>$category_name]);
        return redirect()->back()->withSuccess("Record updated successfully");
    }


    // SubCategory functionality
    public function addSubCategory()
    {
        $Category = Category::orderBy('id','desc')->get();
        return view('admin.SubCategory.addCategory', compact('Category'));
    }

    public function saveSubCategory(Request $request)
    {
        $category_name = $request->category_name;
        $subcategory_name = $request->subcategory_name;
    
        $Testi = new SubCategory();
        $Testi->category_name = $category_name;
        $Testi->subcategory_name = $subcategory_name;
        $Testi->save();

        return redirect()->back()->withSuccess("Record Added successfully");

    }

    public function ListSubCategory()
    {
        $SubCategory = SubCategory::orderBy('id','desc')->get();
        return view ('admin.SubCategory.listCategory', compact('SubCategory'));
    }

    public function deleteSubCategory($id)
    {
        $res=SubCategory::find($id)->delete();
        return redirect()->back()->withSuccess("Record deleted successfully");
    }

    public function editSubCategory($id)
    {
        $Category = Category::orderBy('id','desc')->get();
        return view('admin.SubCategory.editCategory', compact('Category'));
    }

    public function updateSubCategory(Request $request)
    {
       
        $id = $request->id;
        $category_name = $request->category_name;
        $subcategory_name = $request->subcategory_name;

        SubCategory::where('id',$id)
            ->update(['category_name' =>$category_name,'subcategory_name' =>$subcategory_name]);
        return redirect()->back()->withSuccess("Record updated successfully");
    }




    // Products functionality 

    public function addWorks()
    {
        $Category = Category::orderBy('id','desc')->get();
        return view('admin.Works.addWorks', compact('Category'));
    }

    public function saveWorks(Request $request)
    {  

        $category = $request->category;
        $subcategory = $request->subcategory_name;

        if ($request->hasFile('works_img')) {
            $image_name = 'works_img-' . time() . '.' . $request->works_img->extension();
            $request->works_img->move(public_path('/uploads/works_img'), $image_name);
        } else {
            $image_name = '';
        }

        $Testi = new Products();
       
        
        $Testi->category = $category;
        $Testi->subcategory = $subcategory;
        $Testi->work_img = $image_name;
        $Testi->save();

        return redirect()->back()->withSuccess("Record Added successfully");

    }

    public function ListWorks()
    {
        $Works = Products::orderBy('id','desc')->get();

        return view ('admin.works.listWorks', compact('Works'));
    }

    public function deleteWorks($id)
    {
        $res=Products::find($id)->delete();
        return redirect()->back()->withSuccess("Record deleted successfully");
    }

    public function editWorks($id)
    {
        $Category = Category::orderBy('id','desc')->get();
       
        return view('admin.Works.editWorks', compact('Category'));
    }

    public function updateWorks(Request $request)
    {
       
        $work_id = $request->work_id;
        $category = $request->category;
        $subcategory = $request->subcategory;


        if ($request->hasFile('works_img')) {
            $image_name = 'works_img-' . time() . '.' . $request->works_img->extension();
            $request->works_img->move(public_path('/uploads/works_img'), $image_name);
        } else {
            $image_name = '';
        }

        Products::where('id',$work_id)
            ->update(['category' => $category,'subcategory' => $subcategory,'work_img' =>$image_name]);


        return redirect()->back()->withSuccess("Record updated successfully");
    }

    public function fetchSubCategory(Request $request)
    {
       
        $data['subcategories'] = SubCategory::where("category_name", $request->category_name)
                                    ->get();
                                      
        return response()->json($data);
    }






    

    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(),[

            'password' => 'required|min:6|max:100',
            'confirm_password' => 'required|same:password'
        ]);


        $user = $request->user();
            if($request->password == $request->confirm_password)
            {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
                Auth::logout();
                return redirect('/admin')->with('success', "Password updated successfully,please login with new password");
            }
            else
            {
                return redirect()->back()->with('error', "Password and Confirm password does not match");
            }
    }
}
