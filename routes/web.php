<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;



// Route For Front End

// Index Page

Route::get("/",[IndexController::class,'index'])->name('index');

// Contact Querry Save
Route::post("/contact-querry",[IndexController::class, "contactSaved"])->name("contact.save");

// Subscribe Newsletter
Route::post("/subscribe-newsletter",[IndexController::class, "subscribe"])->name("newsletter.subscribe");


// Service Details
Route::get("/service-details/{id}",[IndexController::class,"details"])->name("service.details");

// End



// Route For Admin Panel

Route::prefix("admin")->group(function(){


// Auth
Route::prefix("auth")->group(function(){

    // Auth Page
    Route::get("/login",[AdminController::class, 'login'])->name("login");

    // Login Check
    Route::post("/login-check",[AdminController::class, 'loginCheck'])->name("login.check");

    // logout
    Route::get("/logout",[AdminController::class, "logout"])->name("logout");
});

Route::middleware([AdminMiddleware::class])->group(function(){

// Dashboard
Route::get("/dashboard",[AdminController::class,'dashboard'])->name("admin.dashboard");
// End

// Service Management
Route::prefix("service-managment")->group(function(){

        // Index Page
        Route::get('/services',[AdminController::class, 'services'])->name('service.management');

        // Add Index Page
        Route::get("/add-service",[AdminController::class, 'addService'])->name("add.service");

        // Store Service
        Route::post("/store-service",[AdminController::class, 'storeService'])->name("store.service");

        // Edit Index Page
        Route::get('/edit-service/{id}',[AdminController::class, 'editService'])->name("edit.service");

        // Edit Store
        Route::post('/edit-store/{id}',[AdminController::class, 'editStore'])->name("edit.store");

        // Update Status
        Route::get('/update-service/{id}',[AdminController::class, 'updateService'])->name("update.service");

        // Delete Service
        Route::get('/delete-service/{id}',[AdminController::class, 'deleteService'])->name('delete.service');

});

// Portfolio Management
Route::prefix("portfolio-management")->group(function(){
    // Index Page
    Route::get("/projects",[AdminController::class, 'projects'])->name("projects.management");

    // Add Project
    Route::get("/add-project",[AdminController::class, 'addProject'])->name("add.projects");

    // Store Project
    Route::post("/store-project",[AdminController::class, 'storeProject'])->name("store.project");

    // Edit Project
    Route::get("/edit-project/{id}",[AdminController::class, 'editProject'])->name('edit.project');

    // Edit Store
    Route::post("/edit-store/{id}",[AdminController::class,'editProjectStore'])->name("edit.project.store");

    // Delete Project
    Route::get("/delete-project/{id}",[AdminController::class, 'deleteProject'])->name("delete.project");

    // Update Project
    Route::get('update-project/{id}',[AdminController::class, 'updateProject'])->name("update.project");

});

// Niche Management
Route::prefix("niche-management")->group(function(){
    // Index Page
    Route::get("/niches",[AdminController::class, 'niches'])->name("niches.management");

    // Add Niche
    Route::get('/add-niche',[AdminController::class, 'addNiche'])->name("add.niches");

    // Store Niche
    Route::post("/store-niche",[AdminController::class, 'storeNiche'])->name("store.niche");

    // Delete Niche
    Route::get("/delete-niche/{id}",[AdminController::class, 'deleteNiche'])->name("delete.niche");

    // Update Niche
    Route::get('/update-niche/{id}',[AdminController::class, 'updateNiche'])->name("update.niche");

    // Edit Niche
    Route::get('/edit-niche/{id}',[AdminController::class, 'editNiche'])->name("edit.niche");

    // Edit Store
    Route::post("/edit-store-niche/{id}",[AdminController::class, 'editStoreNiche'])->name("edit.store.niche");
});

// Web Settings
Route::prefix("web-settings")->group(function(){

    //  Querries Page
    Route::get("/web-settings",[AdminController::class, 'webSettings'])->name("web.settings");

    // Settings
    Route::get("/contact-settings",[AdminController::class, 'contactSettings'])->name("contact.settings");

    // Edit Contact Settings
    Route::post("/edit-contact-settings/{id}",[AdminController::class, 'editContactSettings'])->name("edit-contact-settings");
});

// Profile Settings

Route::prefix("admin-profile")->group(function () {


    // Profile
    Route::get("/profile", [AdminController::class, 'adminProfile'])->name("admin.profile");

    // Admin Password
    Route::post("/admin-password-update", [AdminController::class, 'adminPasswordUpdate'])->name("admin.password.update");

    //  Profile Edit
    Route::post("/admin-profile-edit", [AdminController::class, 'adminProfileEdit'])->name("admin.profile.edit");
});



});


});



// End
