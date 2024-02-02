<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function manageViewCategory($categories)
    {
        return view('crudCategories', compact('categories'));
    }

    public function index()
    {
        return $this->manageViewCategory(Category::all());
        // $categoria = Categoria::find(1);
        // $articulos = $categoria->articulos;
    }

    public function filter(Request $request) 
    {
        $search = $request->search;
        $categories = Category::where('id','LIKE','%'.$search.'%')
                    ->orWhere('category_name','LIKE','%'.$search.'%')
                    ->get();

        return $this->manageViewCategory($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData =  Validator::make($request->all(),[
            'category_name' => 'required|string|max:50',
            'description' => 'required|string'
        ]);

        if(!$validateData->fails()){

            $category = Category::create($validateData->validated());

            return redirect()->back();
            // $category->categoriesArticles()->sync(1);
            // return response()->json(['Created successfully' => $category], 201);
        }

        return back()->with('fail',$validateData->errors());



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('editViewCategories',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {

            $category = Category::findOrFail($id);

            $validateData =  Validator::make($request->all(),[
                'category_name' => 'required|string|max:100',
                'description' => 'required|string'
            ]);

            $category->update($validateData->validated());

            return redirect('manage/categories')->with('success','Successfully Updated');

        }catch (\Exception $e) {
            return back()->with('fail',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $category = Category::find($id);
        if($category){
            $category->delete();
            return redirect()->back();
        }
        return response()->json(['Error' => 'Category not found'], 404);
    }
}
