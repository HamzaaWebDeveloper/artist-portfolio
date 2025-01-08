<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactQuerry;
use App\Models\contact;
use App\Models\newsletter;
use App\Models\niches;
use App\Models\project;
use App\Models\services;
use App\Models\websetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index(){
        $title = "Technoz";
        $websetting = websetting::find(1);
        $niches = niches::orderBy('created_at','desc')->take(5)->get();
        $portfolio = project::with("projectImages","niche")->get();
        $services = services::all();
        $data = compact("title","websetting","niches","portfolio","services");

        return view("frontend.index")->with($data);
    }

    public function contactSaved(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required",
            "subject" => "required",
            "message" => "required",
        ]);

        $contactSaved = new contact();

        $contactSaved->name = $request->name;
        $contactSaved->email = $request->email;
        $contactSaved->subject = $request->subject;
        $contactSaved->message = $request->message;

        $contactSaved->save();
        $mailData = [
            "title" => "Contact Form Querry Submission",
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->email,
            "message" => $request->email,
        ];

        Mail::to("techease.bussiness@gmail.com")->send(new ContactQuerry($mailData));

        return redirect()->back()->with("success","Querry has been submitted successfully");
    }

    public function subscribe(Request $request){
        $request->validate([
            "email" => "required"
        ]);

        $subscribe  = new newsletter();

        $subscribe->email = $request->email;

        $subscribe->save();

        return redirect()->back()->with("success","Newsletter has been subscribed successfully");
    }

    public function details($id){
        $title = "Service Details";
        $websetting = websetting::find(1);
        $niches = niches::orderBy('created_at','desc')->take(5)->get();
        $services = services::find($id);

        $data = compact("title","websetting","niches","services");


        return view("frontend.details")->with($data);
    }
}
