<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\contact;
use App\Models\niches;
use App\Models\project;
use App\Models\projectimages;
use App\Models\services;
use App\Models\websetting;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function dashboard(){
        $title = "Admin Dashboard";

        $service = services::count();
        $niche = niches::count();
        $project = project::count();
        $websettings = websetting::find(1);

        $data = compact("title","service","niche","project","websettings");

        return view("Admin.dashboard")->with($data);
    }

    public function services(){
        $title = "Service Management";

        $services = services::all();
        $websettings = websetting::find(1);

        $data = compact("title","services","websettings");

        return view("Admin.service-management.index")->with($data);
    }

    public function addService(){
        $title = "Add Service";
        $websettings = websetting::find(1);
        $data = compact("title","websettings");

        return view("Admin.service-management.add")->with($data);
    }

    public function editService($id){
        $title = "Edit Service";

        $services = services::find($id);
        $websettings = websetting::find(1);
        $data = compact("title","services","websettings");

        return view("Admin.service-management.edit")->with($data);
    }

    public function storeService(Request $request){
        $request->validate([
            "name" => "required",
            "thumbnail_image" => "required|image|mimes:jpeg,png,jpg|max:2048",
            "icon_image" => "required|image|mimes:jpeg,png,jpg|max:2048",
            "service_description" => "required",
            "long_description" => "required",
        ]);

        $saveService = new services();

        if($request->file("thumbnail_image")){
            $imageName = Str::random(16) . '_' .$request->thumbnail_image->getClientOriginalExtension();
            $request->thumbnail_image->move(public_path('Service/thumbnails'),$imageName);
            $saveService->image = $imageName;
        }

        if($request->file("icon_image")){
            $imageName = Str::random(16) . '_' .$request->icon_image->getClientOriginalExtension();
            $request->icon_image->move(public_path('Service/icons'),$imageName);
            $saveService->icon = $imageName;
        }

        $saveService->name = $request->name;
        $saveService->description = $request->service_description;
        $saveService->long_description = $request->long_description;

        $saveService->save();

        return redirect()->route("service.management")->with("success","Service Has Been Added Successfully");

    }

    public function editStore(Request $request,$id){

        $request->validate([
            "name" => "required",
            "thumbnail_image" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
            "icon_image" => "nullable|image|mimes:jpeg,png,jpg|max:2048",
            "description" => "required",
            "long_description" => "required",
        ]);

        $editService = services::find($id);

        if($request->file("thumbnail_image")){
            $imageName = Str::random(16) . '_' .$request->thumbnail_image->getClientOriginalExtension();
            $request->thumbnail_image->move(public_path('Service/thumbnails'),$imageName);
            $editService->image = $imageName;
        }

        if($request->file("icon_image")){
            $imageName = Str::random(16) . '_' .$request->icon_image->getClientOriginalExtension();
            $request->icon_image->move(public_path('Service/icons'),$imageName);
            $editService->icon = $imageName;
        }

        $editService->name = $request->name;
        $editService->description = $request->description;
        $editService->long_description = $request->long_description;

        $editService->save();

        return redirect()->route("service.management")->with("success","Service Has Been Edited Successfully");
    }

    public function updateService($id){

        $service = services::find($id);

        if ($service) {
            $service->update([
                "status" => $service->status == 1 ? 0 : 1,
            ]);
        }

        return redirect()->back()->with("success","Service Status Has Been Updated Successfully");
    }

    public function deleteService($id){
        $service = services::find($id);

        $service->delete();

        return redirect()->back()->with("success","Service Has Been Deleted Successfully");
    }


    public function niches(){
        $title ='Niche Management';
        $niche = niches::all();
        $websettings = websetting::find(1);
        $data = compact('title',"niche","websettings");

        return view("Admin.portfolio-management.niche-management.index")->with($data);
    }

    public function addNiche(){
        $title = "Add Niche";
        $websettings = websetting::find(1);
        $data = compact("title","websettings");

        return  view("Admin.portfolio-management.niche-management.add-niche")->with($data);
    }

    public function storeNiche(Request $request){
        $request->validate([
            "name" => "required",
        ]);

        $storeNiche = new niches();

        $storeNiche->name = $request->name;
        $storeNiche->save();

        return redirect()->route("niches.management")->with("success","Niche Has Been Added Successfully");
    }

    public function deleteNiche($id){
        $niche = niches::find($id);

        $niche->delete();

        return redirect()->back()->with("success","Niche Has Been Deleted Successfully");
    }

    public function updateNiche($id){
        $niche = niches::find($id);

        $projectupdate = project::where("niche_id",$id)->get();

        // dd($projectupdate);
        if ($niche) {
            $niche->update([
                "status" => $niche->status == 1 ? 0 : 1,
            ]);

            $projectupdate = project::where("niche_id", $id)->get();
            foreach ($projectupdate as $project) {
                $project->update([
                    "status" => $niche->status,
                ]);
            }
        }




        return redirect()->back()->with("success","Niche Status Has Been Updated Successfully");
    }

    public function editNiche($id){
        $title = "Edit Niche";
        $niche = niches::find($id);
        $websettings = websetting::find(1);
        $data = compact('title','niche',"websettings");

        return view("Admin.portfolio-management.niche-management.edit-niche")->with($data);
    }

    public function editStoreNiche(Request $request,$id){
        $request->validate([
            "name" => "required",
        ]);

        $editNiche =  niches::find($id);

        $editNiche->name = $request->name;
        $editNiche->save();

        return redirect()->route("niches.management")->with("success","Niche Has Been Edited Successfully");
    }

    public function projects(){
        $title = "Portfolio Management";
        $project= project::with("projectImages","niche")->get();
        $websettings = websetting::find(1);
        $data = compact("title","project","websettings");

        return view("Admin.portfolio-management.project-management.index")->with($data);
    }

    public function addProject(){
        $title = "Add Project";
        $niche = niches::all();
        $websettings = websetting::find(1);
        $data = compact('title','niche',"websettings");

        return view ("Admin.portfolio-management.project-management.add-project")->with($data);
    }

    public function storeProject(Request $request){
        // dd($request->all());
        $request->validate([
            "name" => "required",
            "description" => "required",
        ]);


        $storeProject = new project();
        $storeProject->niche_id = $request->niche_id;
        $storeProject->name = $request->name;
        $storeProject->description = $request->description;
        $storeProject->save();

        $request->validate([
            "project_images*" => "required",
        ]);



        if($request->hasFile("project_images")){

            foreach($request->file("project_images") as $images){
                $storeImage = new projectimages();
                $imageName = Str::random(16) . '_' .$images->getClientOriginalExtension();
                $images->move(public_path("/project/projectImages"),$imageName);

                $storeImage->project_images = $imageName;
                $storeImage->project_id = $storeProject->id;
                $storeImage->save();
            }
        }

        return redirect()->route("projects.management")->with("success","Project has been added successfully");
    }

    public function editProject($id){
        $title = "Edit Project";
        $websettings = websetting::find(1);
        $project= project::with("projectImages","niche","websettings")->find($id);
        $niche = niches::all();
        $data = compact("title","project","niche");

        return view("Admin.portfolio-management.project-management.edit-project")->with($data);
    }

    public function editProjectStore(Request $request,$id){
        $request->validate([
            "name" => "required",
            "description" => "required",
        ]);


        $storeProject = project::find($id);
        $storeProject->niche_id = $request->niche_id;
        $storeProject->name = $request->name;
        $storeProject->description = $request->description;
        $storeProject->save();

        $request->validate([
            "project_images*" => "required",
        ]);



        if($request->hasFile("project_images")){

             projectimages::where('project_id',$id)->delete();

            foreach($request->file("project_images") as $images){
                $storeImage = new projectimages();
                $imageName = Str::random(16) . '_' .$images->getClientOriginalExtension();
                $images->move(public_path("/project/projectImages"),$imageName);

                $storeImage->project_images = $imageName;
                $storeImage->project_id = $storeProject->id;
                $storeImage->save();
            }
        }

        return redirect()->route("projects.management")->with("success","Project has been Edited successfully");
    }

    public function deleteProject($id){
        $delete = project::find($id);
        projectimages::where("project_id",$id)->delete();
        $delete->delete();

        return redirect()->back()->with("success","Project has been deleted successfully");
    }

    public function updateProject($id){
        $project = project::find($id);

        if($project){
            project::where('id',$project->id)->update([
                "status" => $project->status == 1 ? 0 : 1,
            ]);
        }

        return redirect()->back()->with("success","Project status has been updated successfully");
    }

    public function webSettings(){
        $title = "Contact Querries";
        $querries = contact::all();
        $websettings = websetting::find(1);
        $data = compact("title","querries","websettings");

        return view("Admin.web-settings.contact")->with($data);

    }

    public function contactSettings(){
        $title = "Contact Settings";
        $contactSettings = websetting::find(1);
        $websettings = websetting::find(1);
        $data = compact("title","contactSettings","websettings");

        return view("Admin.web-settings.querries")->with($data);
    }

    public function editContactSettings($id,Request $request){
        $request->validate([
            "company_name" => "required",
            "address" => "required",
            "tagline" => "required",
            "phone_number" => "required",
            "email" => "required",
            "instagram" => "required",
            "linkedin" => "required",
            "facebook" => "required",
            "story" => "required",
        ]);

        $contactSettings = websetting::find($id);

        $contactSettings->company_name = $request->company_name;
        $contactSettings->address = $request->address;
        $contactSettings->tagline = $request->tagline;
        $contactSettings->phone_number = $request->phone_number;
        $contactSettings->email = $request->email;
        $contactSettings->instagram = $request->instagram;
        $contactSettings->linkedin = $request->linkedin;
        $contactSettings->facebook = $request->facebook;
        $contactSettings->Story = $request->story;

        $contactSettings->save();

        return redirect()->back()->with("success","Contact info has been updated successfully");
    }

    public function login(){
        $title = "Login";
        $websettings = websetting::find(1);
        $data = compact("title","websettings");
      return view("Admin.Auth.login")->with($data);
    }

    public function loginCheck(Request $request)  {

        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        $email = $request->email;
        $password = $request->password;

        // Find user by email
        $user = Admin::where("email", $email)->first();

        if ($user) {

            if (Hash::check($password, $user->password)) {

                session()->put("admin_id", $user->id);


                return redirect()->route("admin.dashboard")->with("success", "Logged in successfully");
            } else {

                return redirect()->back()->with("error", "Invalid email or password");
            }
        } else {

            return redirect()->back()->with("error", "Invalid email or password");
        }
    }

    public function logout(){
        session()->forget('admin_id');

        return redirect()->route("login")->with("success","Logged out successfully");
    }

    public function adminProfile()
    {
        $title = "Profile";
        $websettings = websetting::find(1);
        $adminDetails = admin::find(1);

        $data = compact("title", 'adminDetails',"websettings");

        return view("Admin.Profile.profile")->with($data);
    }

    public function adminPasswordUpdate(Request $request)
    {
        $request->validate([
            "password" => "required|min:9",
            "confirm_password" => "required|same:password",
        ]);

        try {
            $admin = admin::find(1);

            $admin->password = $request->password;

            $admin->save();

            return redirect()->back()->with("success", "Password Updated Successfully");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something Went Wrong!");
        }
    }

    public function adminProfileEdit(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required"
        ]);

        try {
            $adminEdit = admin::find(1);

            $adminEdit->name = $request->name;
            $adminEdit->email = $request->email;

            $adminEdit->save();

            return redirect()->back()->with("success", "Profile Updated Successfully");
        } catch (\Throwable $th) {
            return redirect()->back()->with("error", "Something Went Wrong!");
        }
    }
}
