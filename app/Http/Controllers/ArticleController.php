<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function manageViewArticles($articles,$categories)
    {

        return view('crudArticles', compact('articles','categories'));
    }

    private function getArticles()
    {

        return Article::all();

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

        $articles = Article::with('supplier')->get();

        return $this->manageViewArticles($articles,$this->getCategories());
        //$articulo = Articulo::find(1);
        //$categorias = $articulo->categorias;

        // $articles = Article::with('articleSupplier')->get();
    }

    private function getNameOfSupplier()
    {
        $articles = $this->getArticles();
    }

    public function filter(Request $request)
    {
        $search = $request->search;
        $articles = Article::where('article_code','LIKE','%'.$search.'%')
                    ->orWhere('article_name','LIKE','%'.$search.'%')
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = Supplier::findOrFail($request['supplier_id']);

        $validateData =  Validator::make($request->all(),[
            'article_code' => 'required|string|unique:articles',
            'article_name' => 'required|string|max:27',
            'article_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'quantity' => 'required|integer',
            'size' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'supplier_id' => 'required|integer'
        ]);

        $fileNameImage = time().$request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileNameImage, 'public');
        // $request["image"] = '/storage/images'.$path;

        if(!$validateData->fails()){
            $article = Article::create([
                'article_code' => $validateData->validated()['article_code'],
                'article_name' => $validateData->validated()['article_name'],
                'article_price' => $validateData->validated()['article_price'],
                'quantity' =>  $validateData->validated()['quantity'],
                'size' => $validateData->validated()['size'],
                'description' => $validateData->validated()['description'],
                'image' =>  $fileNameImage,
                'supplier_id' => $validateData->validated()['supplier_id']
            ]);
            $article->articlesCategory()->attach($request['categories']);
            return redirect()->back();
        }


        return back()->with('fail',$validateData->errors());
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        $categories = $this->getCategories();
        return view('editViewArticle', compact('article','categories'));
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
        $supplier = Supplier::findOrFail($request['supplier_id']);

        $validateData =  Validator::make($request->all(),[
            'article_code' => 'required|string|unique:articles,article_code,'.$id,
            'article_name' => 'required|string|max:27',
            'article_price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
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
            'article_code' => $validateData->validated()['article_code'],
            'article_name' => $validateData->validated()['article_name'],
            'article_price' => $validateData->validated()['article_price'],
            'quantity' => $validateData->validated()['quantity'],
            'size' => $validateData->validated()['size'],
            'description' => $validateData->validated()['description'],
            'image' => $fileNameImage,
            'supplier_id' => $validateData->validated()['supplier_id']
        ]);

        $article->articlesCategory()->sync($request['categories']);
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
        $article = Article::find($id);
        if($article){
            $article->delete();
            return redirect()->back();
        }
        return response()->json(['Error' => 'Article not found'], 404);
    }
}
