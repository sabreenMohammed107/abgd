<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Validator;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::where('type',1)->orderBy('id','DESC')->get();

        return view('users.index',compact('data'))
           ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();

        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'phone' => 'required|unique:users'

        ], [
            'name.required' =>'حقل الاسم مطلوب',

            'email.required' =>'حقل البريد الالكتروني مطلوب',
            'email.email' =>'البريد الالكتروني غير صحيح',
            'email.unique' =>'حقل البريد الالكترونى موجود بالفعل',

            'password.required' => 'حقل كلمة المرور مطلوب',
            'password.same' => 'كلمة المرور / تأكيد كلمة المرور لا تتطابق',

            'roles.required' => 'حقل  الصلاحيات مطلوب',


            'phone.required' =>'حقل رقم الهاتف  مطلوب',

            'phone.unique' =>'حقل  رقم الهاتف موجود بالفعل',


        ]);
        if ($validator->fails()) {

            return redirect()->back()->withInput()
                ->withErrors($validator->messages());

        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['type'] = 1;
        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit',compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $validator = Validator::make($request->all(), [

                'name' => 'required|unique:users,name,'.$id,
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'required_with:confirmed',
                'roles' => 'required',
                'phone' => 'required|unique:users,phone,'.$id,

            ], [
            'name.required' =>'حقل الاسم مطلوب',

            'email.required' =>'حقل البريد الالكتروني مطلوب',
            'email.email' =>'البريد الالكتروني غير صحيح',
            'email.unique' =>'حقل البريد الالكترونى موجود بالفعل',


            'password.confirmed' => 'كلمة المرور / تأكيد كلمة المرور لا تتطابق',

            'roles.required' => 'حقل  الصلاحيات مطلوب',


            'phone.required' =>'حقل رقم الهاتف  مطلوب',

            'phone.unique' =>'حقل  رقم الهاتف موجود بالفعل',


        ]);

        if ($validator->fails()) {
            return $this->convertErrorsToString($validator->messages());
        }
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);

        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);

        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }





}
