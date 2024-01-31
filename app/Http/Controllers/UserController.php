<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;




class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // ->except('update','destroy')
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // $roles = $users->getRoleNames();
        $roles = Role::all();
        return view('crudUsers', compact('users','roles'));
    }

    public function filter(Request $request)
    {
        $search = $request->search;
        $users = User::where('name','LIKE','%'.$search.'%')
                    ->orWhere('user_name','LIKE','%'.$search.'%')
                    ->get();

        return view('crudUsers', compact('users'));
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
            'name' => 'required|string|max:100',
            'user_name' => 'required|string|min:6|max:35|unique:users',
            'password' => 'required|string|min:5'
        ]);


        if(!$validateData->fails()){
            $user = User::create([
                'name' => $validateData->validated()['name'],
                'user_name' => $validateData->validated()['user_name'],
                'password' => Hash::make($request['password'])
            ])->assignRole('user_system');

            // 'password' => Hash::make($validateData->validated()['password'])

            $token = $user->createToken('auth_token')->plainTextToken;
            return redirect()->back();

        }

        return back()->with('fail',$validateData->errors());

        // return response()->json(['errors' => $validateData->errors()], 422);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $role = $user->roles->first();
        $role_name = $role ? $role->name : null;

        return view('editViewUser', compact('user', 'role_name'));
    }

    public function editPassword(User $user)
    {

        return view('editViewUserPassword', compact('user'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {

            $user  = User::findOrFail($id);

            $validateData =  Validator::make($request->only('name','user_name'),[
                'name' => 'required|string|max:100',
                'user_name' => 'required|string|min:6|max:35|unique:users,user_name,' . $id
            ]);

            $user->update([
                'name' => $validateData->validated()['name'],
                'user_name' => $validateData->validated()['user_name']
            ]);

            if($id > 1){
                $roles = $request['roles'];
                $role_id =  DB::table('roles')->where('name', $roles)->first();
                $user->roles()->sync($role_id->id);
            }


            return redirect()->intended('manage/user')->with('success','Successfully Updated');

        }catch (\Exception $e) {
            return back()->with('fail',$e->getMessage());
            // return redirect()->back()->with('error', $e->getMessage());
        }

    }


    public function updatePasswordUser(Request $request, $id)
    {
        try {

            $user  = User::findOrFail($id);

            $validateData =  Validator::make($request->only('password'),[
                'password' => 'required|string|min:5'
            ]);

            $user->update([
                'password' => Hash::make($request['password'])
            ]);

            return redirect()->intended('manage/user')->with('success','Successfully Updated');

        }catch (\Exception $e) {
            return back()->with('fail',$e->getMessage());
        
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        if($user){
            $user->delete();
            return redirect()->back();
        }
        return response()->json(['Error' => 'User not found'], 404);

        // return redirect()->back();
    }
}
