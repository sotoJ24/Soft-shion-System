<?php

namespace App\Http\Traits;
use Illuminate\Support\Facades\Validator;

trait controllerChildMethods{

    public static function storeChild($data,$model)
    {
        $validateData =  Validator::make($data,[
            'name' => 'required|string',
            'last_name' => 'required|string|max:27',
            'identifier' => 'required|string|unique:people',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string|unique:people'
        ]);

        if(!$validateData->fails()){
            $modelCreated = $model::create($validateData->validated());
            return redirect()->back();
        }

        return back()->with('fail',$validateData->errors());
    }


    public static function updateChild($data,$model,$id,$route)
    {
        $id_model  = $model::findOrFail($id);

        $validateData =  Validator::make($data,[
            'name' => 'required|string',
            'last_name' => 'required|string|max:27',
            'identifier' => 'required|string|unique:people,identifier,'.$id,
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|string|unique:people,email,'.$id,
        ]);


        if($validateData->fails()){
            return back()->with('fail',$validateData->errors());
        }

        $id_model->update($validateData->validated());

        return redirect()->intended($route)->with('success','Successfully Updated');

    }

    public static function deleteChild($model,$id)
    {
        $id_model  = $model::find($id);

        if($id_model){
            $id_model->delete();
            return redirect()->back();
        }
        return response()->json(['Error' => 'Not found'], 404);
    }

    public static function filterChild($Model,$search)
    {

        $filterQuery = $Model::where('name','LIKE','%'.$search.'%')
                    ->orWhere('last_name','LIKE','%'.$search.'%')
                    ->orWhere('identifier','LIKE','%'.$search.'%')
                    ->orWhere('email','LIKE','%'.$search.'%')
                    ->get();

        return $filterQuery;

    }
}
