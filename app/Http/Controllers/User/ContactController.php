<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Session;

class ContactController extends Controller
{
    public function index()
    {
        return view('user.contact');
    }
    public function store(Request $request)
    {
        $data=$this->validate($request, [
        'name'=>'required',
        'email'=>'required|email',
        'subject'=>'required',
        'message'=>'required'
      ]);
        Mail::to('anushaad@anushasblog.com')->send(new Contact($data));

        Session::flash('success', "Your message has been sent !");

        return view('user.contact');
    }
}
