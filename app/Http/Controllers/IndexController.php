<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\How_register;
use App\Models\Message;
use App\Models\Partner;
use App\Models\Sender_type;
use App\Models\Why_us;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang as Lang;
use Validator;
class IndexController extends Controller
{
    protected $viewName = 'web.';

    public function index()
    {

        $whyRows = Why_us::limit(4)->get();
        $howRegister = How_register::limit(4)->get();
        $partenters=Partner::all();
        $senderTypes=Sender_type::all();

        return view($this->viewName . 'index', compact('whyRows','howRegister','partenters','senderTypes'));
    }
    public function success()
    {

        session()->flash('success', Lang::get('links.controller_message'));

        return view($this->viewName . 'success')->with('flash_success', Lang::get('links.controller_message'));
    }


    public function sendMessage(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => ['required', 'min:11', 'max:11', 'regex:/(01)[0-2,5]{1}[0-9]{8}/'],

            'message' => 'required',
            'email' => 'required',

        ], [

            'name.required' => Lang::get('links.fullname_required'),

            'mobile.required' => Lang::get('links.phone_required'),
            'mobile.regex' => Lang::get('links.phone_regex'),
            'mobile.max' => Lang::get('links.phone_max'),
            'mobile.min' => Lang::get('links.phone_regex'),
            'message.required' => Lang::get('links.message_required'),
            'email.required' => Lang::get('links.email_required'),

        ]);
        if ($validator->fails()) {

            return redirect()->back()->withInput()
                ->withErrors($validator->messages());

        }
        Message::create($request->except('_token'));
        // session()->flash('success', Lang::get('links.controller_message'));

        // return view($this->viewName . 'success')->with('flash_success', Lang::get('links.controller_message'));
        // return redirect()->back()->with('flash_success', Lang::get('links.controller_message'));
        return \Redirect::route('success')->with('message', 'State saved correctly!!!');
    }

    public function faq(){
        $faqs = Faq::get();

        $partenters=Partner::all();


        return view($this->viewName . 'faq', compact('faqs','partenters'));

    }
}
