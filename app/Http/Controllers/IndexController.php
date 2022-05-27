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

    public function sendMessage(Request $request){
        Message::create($request->except('_token'));
        session()->flash('success', Lang::get('links.controller_message'));
        return view($this->viewName . 'success')->with('flash_success', Lang::get('links.controller_message'));
        // return redirect()->back()->with('flash_success', Lang::get('links.controller_message'));
    }

    public function faq(){
        $faqs = Faq::get();

        $partenters=Partner::all();


        return view($this->viewName . 'faq', compact('faqs','partenters'));

    }
}
