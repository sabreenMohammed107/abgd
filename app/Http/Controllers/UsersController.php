<?php

namespace App\Http\Controllers;

use App\Models\Other_schools_parent;
use App\Models\Partner;
use App\Models\School;
use App\Models\User;
use App\Models\User_parent;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang as Lang;
use Validator;

class UsersController extends Controller
{
    //

    use AuthenticatesUsers;
    //

    public function successregister()
    {

        session()->flash('success', Lang::get('links.register_message'));

        return view('web.success')->with('flash_success', Lang::get('links.register_message'));
    }

    public function successlogin()
    {

        session()->flash('success', Lang::get('links.controller_message'));

        return view('web.success')->with('flash_success', Lang::get('links.controller_message'));
    }

    public function successprofile()
    {

        session()->flash('success', Lang::get('links.update_message'));

        return view('web.success')->with('flash_success', Lang::get('links.update_message'));
    }

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
        $vali = [
            'identifier' => $identifier,
        ];
        // if(filter_var($identifier, FILTER_VALIDATE_EMAIL)){
        //     return 'email';
        // }

        // return 'phone';

        if (is_numeric($identifier)) {

            // return 0;
            dd(0);
        }
        // return 1;
        dd(1);
    }
    public function saveLogin(Request $request)
    {
        $test = $this->username();

        $input = $request->all();

        $this->validate($request, [
            'user_identifier' => 'required',
            'password' => 'required',
        ], [
            'user_identifier.required' => Lang::get('links.userMobileLgoin'),
            'password.required' => Lang::get('links.passwordLogin'),
            // 'password.min' => Lang::get('links.password_min'),
            // 'password.max' => Lang::get('links.password_max'),

        ]);

        if ($this->username() == 0) {
            $vali = [
                'user_identifier' => $input['user_identifier'],
            ];
            $validatorr = Validator::make($vali, [

                'user_identifier' => 'regex:/(01)[0-2,5]{1}[0-9]{8}/',

            ], [

                'user_identifier.regex' => Lang::get('links.phone_regex'),

            ]);

            if ($validatorr->fails()) {
                return redirect()->back()->withInput()
                    ->withErrors(Lang::get('links.invalid_msg'));

            }

            if (auth()->attempt(array('phone' => $input['user_identifier'], 'password' => $input['password'], 'type' => 'user'))) {

                return redirect()->intended(url('/'));

            } else {

                return redirect()->route('user-login')
                    ->withErrors(Lang::get('links.invalid_msg'));

            }

        } else {

            if (auth()->attempt(array('name' => $input['user_identifier'], 'password' => $input['password'], 'type' => 'user'))) {

                return redirect()->intended(url('/'));

            } else {

                return redirect()->route('user-login')
                    ->withErrors(Lang::get('links.invalid_msg'));

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
            'full_name' => 'required',
            'phone' => ['required', 'min:11', 'max:11', 'regex:/(01)[0-2,5]{1}[0-9]{8}/', 'unique:users'],
            'name' => ['required', 'unique:users', 'regex:/^(?!.*[@$!%*#?&])(?=.*[\sa-zA-Zء-ي])+[^\.]*$/'],
            'child_no' => 'required',
            'total_cost' => 'required',
            // "other_schools" =>"required_without:schools",
            "schools" => "required_without:other_schools",
            'password' => ['required', 'same:confirm-password', 'min:8', 'regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
            'captcha' => 'required|captcha',

        ], [

            'full_name.required' => Lang::get('links.fullname_required'),
            'phone.unique' => Lang::get('links.phone_unique'),
            'phone.required' => Lang::get('links.phone_required'),
            'phone.regex' => Lang::get('links.phone_regex'),
            'phone.max' => Lang::get('links.phone_max'),
            'phone.min' => Lang::get('links.phone_regex'),
            'child_no.required' => Lang::get('links.childNo_required'),
            'total_cost.required' => Lang::get('links.fees_required'),
            'name.required' => Lang::get('links.name_required'),
            'name.regex' => Lang::get('links.name_regex'),
            // 'other_schools.required_without' => Lang::get('links.school_message'),
            'schools.required_without' => Lang::get('links.school_message'),
            'name.required' => Lang::get('links.name_required'),
            'password.required' => Lang::get('links.passwordLogin'),
            'password.regex' => Lang::get('links.password_regex'),
            'password.min' => Lang::get('links.password_min'),
            'password.same' => Lang::get('links.password_same'),
            'captcha.required' => Lang::get('links.captcha_required'),
            'captcha.captcha' => Lang::get('links.captcha_captcha'),

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
            // $user_parent->other_schools = $request->other_schools;

            $user_parent->save();
            if (!empty($request->get('schools'))) {
                if ($request->get('schools')[0] != 0) {
                    $user_parent->schools()->attach($request->schools);
                }

            }
            if (!empty($request->get('other_schools'))) {
                foreach ($request->get('other_schools') as $scol) {

                    $other_parent_school = new Other_schools_parent();
                    $other_parent_school->user_parent_id = $user_parent->id;
                    $other_parent_school->school = $scol;
                    $other_parent_school->save();
                }

            }
            Auth::login($user);
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            // session()->flash('success', Lang::get('links.register_message'));
            // return view('web.success')->with('flash_success', Lang::get('links.register_message'));
            return \Redirect::route('success-register')->with('message', 'State saved correctly!!!');

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
            'full_name' => 'required',
            'phone' => 'required|min:11|max:11|regex:/(01)[0-2,5]{1}[0-9]{8}/|unique:users,phone,' . $user_parent->user_id,
            'child_no' => 'required',
            'total_cost' => 'required',
            // "other_schools" =>"required_without:schools",
            "schools" => "required_without:other_schools",

            'password' => ['required_with:confirmed', 'nullable', 'min:8', 'regex:/^(?=.*[a-z|A-Z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/'],
            'name' => 'required|unique:users,name,' . $user_parent->user_id,
            // 'password' => 'confirmed',
            'captcha' => 'required|captcha',

        ], [
            'full_name.required' => Lang::get('links.fullname_required'),
            'phone.unique' => Lang::get('links.phone_unique'),
            'phone.required' => Lang::get('links.phone_required'),
            'phone.max' => Lang::get('links.phone_max'),
            'phone.min' => Lang::get('links.phone_regex'),
            'child_no.required' => Lang::get('links.childNo_required'),
            'total_cost.required' => Lang::get('links.fees_required'),
            // 'other_schools.required_without' => Lang::get('links.school_message'),
            'schools.required_without' => Lang::get('links.school_message'),
            'name.required' => Lang::get('links.name_required'),
            'name.unique' => Lang::get('links.name_unique'),
            'password.regex' => Lang::get('links.password_regex'),
            'password.confirmed' => Lang::get('links.password_same'),
            'password.min' => Lang::get('links.password_min'),
            'captcha.required' => Lang::get('links.captcha_required'),
            'captcha.captcha' => Lang::get('links.captcha_captcha'),

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

            $input = [
                'name' => $request->get('name'),
                // 'email'=>$request->get('email'),
                'phone' => $request->get('phone'),
            ];
            if (!empty($request->get('password'))) {
                $input['password'] = Hash::make($request->get('password'));
            }
            // else{
            //     $input = Arr::except($input,array('password'));
            // }

            $user = User::find($user_parent->user_id);
            //check if no schools choose
            if (empty($request->get('other_schools')) && empty($request->get('schools'))) {
                return redirect()->back()->withInput()->withErrors('links.school_message');

            }
//end check
            $user->update($input);
            // dd($user);
            $parent = [
                'user_id' => $user->id,
                'full_name' => $request->full_name,
                'child_no' => $request->child_no,
                'total_cost' => $request->total_cost,
                'gender' => $request->gender,
                'other_schools' => $request->other_schools,

            ];

            // $user_parent = User_parent::find($user_parent);
            // dd($user_parent);

            $user_parent->update($parent);
            if (!empty($request->get('schools'))) {
                if ($request->get('schools')[0] != 0) {
                    $user_parent->schools()->sync($request->schools);
                }
            }
            if (!empty($request->get('other_schools'))) {
                //remove all old schools
                $oldschool = Other_schools_parent::where('user_parent_id', $user_parent->id)->get();
                if ($oldschool) {
                    foreach ($oldschool as $old) {
                        $old->delete();
                    }
                }
//save new data
                foreach ($request->get('other_schools') as $scol) {

                    $other_parent_school = new Other_schools_parent();
                    $other_parent_school->user_parent_id = $user_parent->id;
                    $other_parent_school->school = $scol;
                    $other_parent_school->save();
                }

            }

            Auth::login($user);
            DB::commit();
            // Enable foreign key checks!
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            session()->flash('message', Lang::get('links.update_message'));

            // return view('web.success')->with('flash_success', Lang::get('links.update_message'));
            return redirect()->back()->with('message', Lang::get('links.update_message'));

        } catch (\Throwable$e) {
            // throw $th;
            DB::rollback();
            return redirect()->back()->withInput()->withErrors($e->getMessage());
            // return redirect()->back()->withInput()->withErrors('حدث خطأ فى ادخال البيانات قم بمراجعتها مرة اخرى');
        }

    }
}
