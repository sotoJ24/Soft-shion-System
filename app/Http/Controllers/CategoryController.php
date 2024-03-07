<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function manageViewArticles($articles,$categories,$suppliers)
    {

        return view('crudArticles', compact('articles','categories','suppliers'));
    }

    private function getArticlesWithSupplier()
    {
        return Catalog::with('supplier')->get();
    }

    private function getSuppliers()
    {
        return Supplier::all();
    }

    private function getCategories()
    {
        return Category::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->manageViewArticles(
                                         $this->getArticlesWithSupplier(),
                                         $this->getCategories(),
                                         $this->getSuppliers()
                                        );
    }


    public function filter(Request $request)
    {
        $search = $request->search;
        $articles = Catalog::where('product_code','LIKE','%'.$search.'%')
                    ->orWhere('product_name','LIKE','%'.$search.'%')
                    ->orWhere('size','LIKE','%'.$search.'%')
                    ->get();

        return $this->manageViewArticles($articles,$this->getCategories());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function getSupplierId($supplier)
    {
        $id = Supplier::where('company_name', $supplier)->value('id');

        return $id ?? 0;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $supplier_id = $this->getSupplierId($request['suppliers']);

        $supplier = Supplier::findOrFail($supplier_id);
        $request['supplier_id'] = $supplier_id;


        $validateData =  Validator::make($request->all(),[
            'product_code' => 'required|string|unique:catalogs',
            'product_name' => 'required|string|max:27',
            'product_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'quantity' => 'required|integer',
            'size' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'supplier_id' => 'required|integer'
        ]);

        $fileNameImage = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileNameImage, 'public');

        if(!$validateData->fails()){
            $article = Catalog::create([
                'product_code' => $validateData->validated()['product_code'],
                'product_name' => $validateData->validated()['product_name'],
                'product_price' => $validateData->validated()['product_price'],
                'quantity' =>  $validateData->validated()['quantity'],
                'size' => $validateData->validated()['size'],
                'description' => $validateData->validated()['description'],
                'image' =>  $fileNameImage,
                'supplier_id' => $supplier_id
            ]);
            $article->productsCategory()->attach($request['categories']);
            return redirect()->back();
        }


        return back()->with('fail',$validateData->errors());
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function show(Catalog $catalog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalog  $catalog
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalog $catalog)
    {

        $categories = $this->getCategories();
        $suppliers = $this->getSuppliers();
        return view('editViewArticle', compact('catalog','categories','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article  = Article::findOrFail($id);

        $supplier_id = $this->getSupplierId($request['suppliers']);

        $supplier = Supplier::findOrFail($supplier_id);
        $request['supplier_id'] = $supplier_id;



        $validateData =  Validator::make($request->all(),[
            'product_code' => 'required|string|unique:catalogs,product_code,'.$id,
            'product_name' => 'required|string|max:27',
            'product_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'quantity' => 'required|integer',
            'size' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'supplier_id' => 'required|integer'
        ]);

        $fileNameImage = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileNameImage, 'public');

        if($validateData->fails())
        {
            return back()->with('fail',$validateData->errors());
        }

        $article->update([
            'product_code' => $validateData->validated()['product_code'],
            'product_name' => $validateData->validated()['product_name'],
            'product_price' => $validateData->validated()['product_price'],
            'quantity' => $validateData->validated()['quantity'],
            'size' => $validateData->validated()['size'],
            'description' => $validateData->validated()['description'],
            'image' => $fileNameImage,
            'supplier_id' => $supplier_id
        ]);

        $article->productsCategory()->sync($request['categories']);
        return redirect('manage/articles')->with('success','Successfully Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Catalog::find($id);
        if($article){
            $article->delete();
            return redirect()->back();
        }
        return response()->json(['Error' => 'Product not found'], 404);
    }
}
