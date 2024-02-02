<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB; 

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function manageViewSupplier($suppliers)
    {
        return view('crudSupplier', compact('suppliers'));
    }

    public function filter(Request $request)
    {
        $search = $request->search;
        $suppliers = Supplier::where('company_name','LIKE','%'.$search.'%')
                    ->orWhere('email','LIKE','%'.$search.'%')
                    ->orWhere('contact_name','LIKE','%'.$search.'%')
                    ->orWhere('address','LIKE','%'.$search.'%')
                    ->get();

        return $this->manageViewSupplier($suppliers);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->manageViewSupplier(Supplier::all());
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
        $validateData =  Validator::make($request->all(),[
            'company_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:30',
            'email' => 'required|string|email|unique:suppliers',
            'contact_name' => 'required|string|max:100',
            'address' => 'required|string|max:150'
        ]);

        if(!$validateData->fails()){
            $supplier = Supplier::create($validateData->validated());
            return redirect()->back();
        }

        return back()->with('fail',$validateData->errors());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('editViewSupplier', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {

        $validateData = $request->validate([
            'company_name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:30',
            'email' => 'required|string|email|unique:suppliers,email,'.$supplier->id,
            'contact_name'  => 'required|string|max:100',
            'address' => 'required|string|max:150'
        ]);

        $supplier->update($validateData);

        return redirect('manage/suppliers')->with('success','Successfully Updated');

        // $findSupplier  = Supplier::findOrFail($supplier->id);

        // $validateData =  Validator::make($request->all(),[
        //      'company_name' => 'required|string|max:100',
            // 'phone_number' => 'required|string|max:30',
            // 'email' => 'required|string|email|unique:suppliers,email,'.$supplier->id,
            // 'contact_name'  => 'required|string|max:100',
            // 'address' => 'required|string|max:150'
        // ]);

        // if(!$validateData->fails()){
        //     $supplier = Supplier::update($validateData->validated());
        //     // $supplier->articlesCategory()->sync($request['categories']);
        //     return redirect()->back();
        // }

        // return response()->json(['errors' => $validateData->errors()], 417);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier  = Supplier::findOrFail($id);

        if($supplier){
            $supplier->delete();
            return redirect()->back();
        }
        // return response()->json(['Error' => 'Supplier not found'], 404);
    }
}
