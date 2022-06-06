<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\School;
use App\Models\User;
use App\Models\User_parent;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang as Lang;
use Validator;
use Hash;
use Illuminate\Support\Arr;

class UsersController extends Controller
{
    //

    use AuthenticatesUsers;
    //
    public function login()
    {
        $partenters = Partner::all();
        return view('auth.webLogin', compact('partenters'));
    }

    public function profile($id)
    {

        $user_parent = User_parent::where('user_id', $id)->first();
        $schools = School::all();
        $userSchools = $user_parent->schools->all();
        $partenters = Partner::all();
        return view('web.userProfile', compact('user_parent', 'schools', 'userSchools', 'partenters'));
    }
    public function register()
    {
        $partenters = Partner::all();
        $schools = School::all();
        return view('auth.webRegister', compact('partenters', 'schools'));
    }

    public function username()
    {

        $identifier = request()->get('user_identifier');
        $vali=[
            'identifier'=>$identifier,
        ];
        // if(filter_var($identifier, FILTER_VALIDATE_EMAIL)){
        //     return 'email';
        // }

        // return 'phone';

        if (is_numeric($identifier)) {



            return 0;
        }
        return 1;
    }
    public function saveLogin(Request $request)
    {
        $test = $this->username();

        $input = $request->all();

        $this->validate($request, [
            'user_identifier' => 'required',
            'password' => 'required|min:6|max:20',
        ],[
            'user_identifier.required' => Lang::get('links.userMobileLgoin'),
            'password.required' =>  Lang::get('links.passwordLogin'),
            'password.min' => Lang::get('links.password_min'),
            'password.max' => Lang::get('links.password_max'),


        ]);


        if ($this->username() == 0) {


            if (auth()->attempt(array('phone' => $input['user_identifier'], 'password' => $input['password'], 'type' => 'user'))) {

                return redirect()->intended(url('/'));

            } else {
                // return redirect()->route('user-login')
                // ->withErrors('Email-Address And Password Are Wrong.');
  $vali=[
                'user_identifier'=>$input['user_identifier'],
            ];
            $validatorr = Validator::make( $vali, [

                'user_identifier' => 'regex:/(01)[0-9]{9}/',

            ],[

                'user_identifier.regex' => Lang::get('links.phone_regex'),



            ]);
                      return redirect()->back()->withInput()
                    ->withErrors($validatorr->messages());

            }

        }
        else {

            if (auth()->attempt(array('name' => $input['user_identifier'], 'password' => $input['password'], 'type' => 'user'))) {

                return redirect()->intended(url('/'));

            } else {

                return redirect()->route('user-login')
                ->withErrors( Lang::get('links.invalid_msg'));

            }
        }

    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        // Logic that determines where to send the user
        if (\Auth::user()->type == 'user') {
            return '/';
        }

        return '/user-login';
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function capthcaFormValidate(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'name' => ['required','unique:users'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'regex:/(01)[0-9]{9}/', 'unique:users'],
            'captcha' => 'required|captcha',
            'password' => 'same:confirm-password|min:6|max:20',
            'full_name' => 'required',
            'child_no' => 'required',
            'total_cost' => 'required',

        ],[
            'name.required' => Lang::get('links.name_required'),
            'name.unique' => Lang::get('links.name_unique'),
            'phone.unique' => Lang::get('links.phone_unique'),
            'phone.required' => Lang::get('links.phone_required'),
            'phone.regex' => Lang::get('links.phone_regex'),
            'captcha.required' => Lang::get('links.captcha_required'),
            'captcha.captcha' => Lang::get('links.captcha_captcha'),
            'password.min' => Lang::get('links.password_min'),
            'password.max' => Lang::get('links.password_max'),
            'full_name.required' => Lang::get('links.fullname_required'),
            'total_cost.required' => Lang::get('links.fees_required'),
            'child_no.required' => Lang::get('links.childNo_required'),



        ]);

        if ($validator->fails()) {

            return redirect()->back()->withInput()
                ->withErrors($validator->messages());

        }
        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $user = User::create([
                'name' => $request->name,
                // 'email' => $request->email,
                'phone' => $request->phone,
                'type' => 0,
                'password' => Hash::make($request->password),
            ]);

            $user_parent = new User_parent();
            $user_parent->user_id = $user->id;
            $user_parent->full_name = $request->full_name;
            $user_parent->child_no = $request->child_no;
            $user_parent->total_cost = $request->total_cost;
            $user_parent->gender = $request->gender;
            $user_parent->other_schools=$request->other_schools;

            $user_parent->save();
            if(!empty($request->get('schools'))){
                if($request->get('schools')[0] !=0){
                    $user_parent->schools()->attach($request->schools);
                }

            }
            Auth::login($user);
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            session()->flash('success', Lang::get('links.register_message'));
            return view('web.success')->with('flash_success', Lang::get('links.register_message'));

        } catch (\Throwable$e) {
            // throw $th;
            DB::rollback();
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // return redirect()->back()->withInput()->withErrors('حدث خطأ فى ادخال البيانات قم بمراجعتها مرة اخرى');
        }

    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

    public function updateProfile(Request $request)
    {

        $user_parent = User_parent::where('id', $request->user_parent)->first();

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users,name,'. $user_parent->user_id,
            // 'email' => 'required|email|unique:users,email,'. $user_parent->user_id,
            'phone' => 'required|regex:/(01)[0-9]{9}/|unique:users,phone,' . $user_parent->user_id,

            'password' => 'same:confirm-password',
            'captcha' => 'required|captcha',
        ],
        [
            'name.required' => Lang::get('links.name_required'),
            'phone.unique' => Lang::get('links.phone_unique'),
            'phone.required' => Lang::get('links.phone_required'),
            'phone.regex' => Lang::get('links.phone_regex'),
            'password.same' => Lang::get('links.password_same'),
            'captcha.required' => Lang::get('links.captcha_required'),


        ]
    );

        if ($validator->fails()) {
            return redirect()->back()->withInput()
            ->withErrors($validator->messages());
        }

        DB::beginTransaction();
        try {
            // Disable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $input =[
            'name'=>$request->get('name'),
            // 'email'=>$request->get('email'),
            'phone'=>$request->get('phone'),
        ];
        if(!empty($request->get('password'))){
            $input['password'] = Hash::make($request->get('password'));
        }
        // else{
        //     $input = Arr::except($input,array('password'));
        // }

        $user = User::find($user_parent->user_id);

        $user->update($input);
        // dd($user);
        $parent=[
'user_id'=> $user->id,
'full_name'=>$request->full_name,
'child_no'=>$request->child_no,
'total_cost'=>$request->total_cost,
'gender'=>$request->gender,
'other_schools'=>$request->other_schools,

        ];

        // $user_parent = User_parent::find($user_parent);
        // dd($user_parent);

        $user_parent->update($parent);
        if(!empty($request->get('schools'))){
            if($request->get('schools')[0] !=0){
        $user_parent->schools()->sync($request->schools);
            }
 }

        Auth::login($user);
        DB::commit();
        // Enable foreign key checks!
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        session()->flash('success', Lang::get('links.update_message'));
        return view('web.success')->with('flash_success', Lang::get('links.update_message'));

    } catch (\Throwable$e) {
        // throw $th;
        DB::rollback();
        return redirect()->back()->withInput()->withErrors($e->getMessage());
        // return redirect()->back()->withInput()->withErrors('حدث خطأ فى ادخال البيانات قم بمراجعتها مرة اخرى');
    }

    }
}
