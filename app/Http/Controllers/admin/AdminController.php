<?php

namespace App\Http\Controllers\admin;

use app\models\Category;

use app\models\Menu;
use App\news;

use App\Http\Controllers\Controller;
use App\Tovari;
use App\User;
use App\Zakaz;
use App\Company;
use App\Jobs;
use App\Orders;
use App\Trainings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function admin()
    {

 


session_start();
        if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");
echo '<script language="javascript">';
echo 'alert("You are not admin")';
echo '</script>';
        }else {



            return redirect()->route("site");
        }

$a = \App\Company::all();
$b = \App\Jobs::all();
$c = \App\Applications::all();
$d = \App\Registry::all();

$com = $a->count();
$jobs = $b->count();
$apps = $c->count();
$cands = $d->count();



        return view("admin.pages.index",compact('tov','ord','com','jobs',' apps',' cands'));
    } 

     public function checkeradmin()
    {

 session_start();
     

$id = $_SESSION['company_id'];
        $aa = DB::select("select * from company where id = $id");

        if ($aa[0]->status == 1) {

  return redirect()->route("site");
        }
        elseif ($aa[0]->status == 0) {
            
            return redirect()->route("company-profile");

                    }


        





       
    }  public function site()
    {
session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
        else {

$id = $_SESSION['company_id'];
        $aa = DB::select("select * from company where id = $id");



        }



 $a = \App\Company::all();
$b = \App\Jobs::all();
$c = \App\Applications::all();
$d = \App\Registry::all();

$com = $a->count();
$jobs = $b->count();
$apps = $c->count();
$cands = $d->count();



        return view("admin.pages.site",compact('com','jobs','apps','cands'));
    }



     public function addcat(Request $request){
    session_start();
    if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
    $cat = \App\Category::all();
    if ($request->isMethod("post")) {

        $cat = new \App\Category();



        $cat->title = $request->input("title");


        $cat->save();

        return redirect()->route("admincategory");
    }

    return view("admin.pages.addcat",compact('cat'));


}
     public function addtrainings(Request $request){
    session_start();
    if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
    $cat = \App\Trainings::all();
    if ($request->isMethod("post")) {

        $cat = new \App\Trainings();



        $cat->title = $request->input("title");
        $cat->youtube = $request->input("youtube");


        $cat->save();

        return redirect()->route("admintrainings")->with('success', 'Training added successfully!');;
    }

    return view("admin.pages.addtrainings",compact('cat'));


}

   public function addnewscat(Request $request){
    session_start();
    if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
    $cat = \App\Newscategory::all();
    if ($request->isMethod("post")) {

        $cat = new \App\Newscategory();



        $cat->title = $request->input("title");


        $cat->save();

        return redirect()->route("newscat");
    }

    return view("admin.pages.addnewscat",compact('cat'));


}
   public function addnews(Request $request)
{
 session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 

    // Start the session (if needed)
   

    // Get all categories
    $cat = \App\Newscategory::all();

    // Handle POST request
    if ($request->isMethod("post")) {
        // Create a new news object
        $news = new \App\News();

        // Set the news details
        $news->title = $request->input('title');
        $news->about = $request->input('about');
        $news->info = $request->input('info');

        // Handle image upload
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $file = $request->file('img');

            // Generate a unique name for the file
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            // Define the destination path
            $destinationPath = public_path('upl/blog/');



            // Move the file to the specified location
            $file->move($destinationPath, $fileName);

            // Save the relative path to the database
            $news->img = 'upl/blog/' . $fileName;
        } else {

 

            return redirect()->back()->with('error', 'Image upload failed. Please try again.');
        }

        // Set the category ID
        $news->cat_id = $request->input('cat_id');

        // Handle optional YouTube link (default to '0' if not provided)
        $news->youtube = $request->input('youtube') ?: '0';

        // Save the news to the database
        $news->save();

        // Redirect to the news admin page with a success message
        return redirect()->route('adminnews')->with('success', 'Job added successfully!');
    }

    // Return the view with the categories
    return view("admin.pages.addnews", compact('cat'));
}



  public function category()
{
  session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 

  
        $category = DB::select("select * from category");






    return view("admin.pages.category",compact('category','a'));
}public function left()
{
session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 




    return view("admin.inc.left");
}public function editcat($id,Request $request)
{
session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 

    $cat = \App\Category::where(['id' => $id])->get();
    if ($request->isMethod("post")) {


        $cat[0]->title = $request->input("title");


        $cat[0]->save();
        return redirect()->route("admincategory");


    }

    return view("admin.pages.editcat",compact('cat'));
}public function editnewscat($id,Request $request)
{
session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 

    $cat = \App\Newscategory::where(['id' => $id])->get();
    if ($request->isMethod("post")) {


        $cat[0]->title = $request->input("title");


        $cat[0]->save();
        return redirect()->route("newscat");


    }

    return view("admin.pages.editnewscat",compact('cat'));
}
public function editnews($id,Request $request)
{
session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 

    $news = \App\News::findOrFail($id);
    $cat = \App\Newscategory::all(); 
  if ($request->isMethod("post")) {
    $news = News::findOrFail($id);
    $news->title = $request->title;
    $news->about = $request->about;
    $news->info = $request->info;
    $news->cat_id = $request->cat_id;

    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upl/blog/'), $imageName);
        $news->img = 'upl/blog/' . $imageName;
    }



    $news->save();

    return redirect()->route('adminnews')->with('success', 'News updated successfully');
}
    return view('admin.pages.editnews', compact('news', 'cat'));
}public function edittrainings($id,Request $request)
{
session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 

    $news = \App\Trainings::findOrFail($id);
  if ($request->isMethod("post")) {
    $news = Trainings::findOrFail($id);
    $news->title = $request->title;
    $news->youtube = $request->youtube;

   



    $news->save();

    return redirect()->route('admintrainings')->with('success', 'Training updated successfully');
}
    return view('admin.pages.edittrainings', compact('news'));
}public function dellnews($id)
{
session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 

    try {
        $news = \App\News::findOrFail($id);

        // If the image exists and has a full path stored in the database
        if ($news->img) {
            // Directly use the full path stored in the database
            $imagePath = $news->img;
            
            // Check if the file exists and delete it
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }
        }


        // Delete the news entry from the database
        $news->delete();

        return redirect()->route('adminnews')->with('success', 'News deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->route('adminnews')->with('error', 'Failed to delete news. Error: ' . $e->getMessage());
    }
}
public function delltrainings($id)
{
session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 

    try {
        $news = \App\Trainings::findOrFail($id);

       
        $news->delete();

        return redirect()->route('admintrainings')->with('success', 'Training deleted successfully!');
    } catch (\Exception $e) {
        return redirect()->route('admintrainings')->with('error', 'Failed to delete news. Error: ' . $e->getMessage());
    }
}


public function edittov($id,Request $request)
{
  session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 

  
    $tov = \App\Tovari::where(['id' => $id])->get();
    if ($request->isMethod("post")) {


     


        if ($request->file('img') != "") {
            $img = $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('upl', $img);
            $tov[0]->img = $img;

          
                      

     $tov[0]->title = $request->input("title");
        $tov[0]->description = $request->input("description");
       
        $tov[0]->price = $request->input("price");
        
            $tov[0]->stdate = $request->input("stdate");
            $tov[0]->endate = $request->input("endate");
            $tov[0]->location = $request->input("location");


            $tov[0]->save();

        }  
        else{
$tov[0]->title = $request->input("title");
        $tov[0]->description = $request->input("description");
       
        $tov[0]->price = $request->input("price");
      
      
  $tov[0]->stdate = $request->input("stdate");
            $tov[0]->endate = $request->input("endate");
            $tov[0]->location = $request->input("location");


            $tov[0]->save();

        }
    

   $userid = $_SESSION['id'];

  
        return redirect()->route("tovari");
    }

        return view("admin.pages.edittov", compact('tov'));


}public function edituser($id,Request $request)
{
 session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 

   

    $users = \App\Registry::where(['id' => $id])->get();
    if ($request->isMethod("post")) {


     


        if ($request->file('img') != "") {
            $img = $request->file('img')->getClientOriginalName();
            $request->file('img')->storeAs('upl', $img);
            $users[0]->img = $img;

          
                      

     $users[0]->name = $request->input("name");
        $users[0]->surname = $request->input("surname");
       
        $users[0]->phone = $request->input("phone");
        $users[0]->status = $request->input("status");
        
          


            $users[0]->save();

        }  
        else{
$users[0]->name = $request->input("name");
        $users[0]->surname = $request->input("surname");
       
        $users[0]->phone = $request->input("phone");
        $users[0]->status = $request->input("status");
      
      
  

            $users[0]->save();

        }
    

   $userid = $_SESSION['id'];

  
        return redirect()->route("users");
    }

        return view("admin.pages.edit", compact('users'));


}


public function compedit($id,Request $request)
{


    session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 

    $company = Company::where(['id' => $id])->first();

    if ($request->isMethod("post")) {
        // Update company details
        $company->first_name = $request->input("first_name");
        $company->second_name = $request->input("second_name");
        $company->age = $request->input("age");
        $company->phone = $request->input("phone");
        $company->job_position = $request->input("job_position");
        $company->company_name = $request->input("company_name");

             if ($request->file('img') != "") { 
            if (!empty($company->img) && file_exists(public_path($company->img))) {
                unlink(public_path($company->img)); 
            }




            // Process the new image
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Add a timestamp for unique naming
            $destinationPath = public_path('upl/logo'); // Define the upload path
            $file->move($destinationPath, $fileName); // Save the file in the upload folder

            // Update the database with the new image path
            $company->img = 'upl/logo/' . $fileName;
            }

        // Save the updated company details
        $company->save();

        return redirect()->route("admincompany")->with('success', 'Profile updated successfully.');
}

    return view("admin.pages.compedit", compact('company'));
}
public function adminapplications()
{
    session_start();
    if (!isset($_SESSION['company_id'])) {
        return redirect()->route("login2");
    }

    $applications = DB::select("SELECT * FROM applications");

    $jobDetails = [];
    $candidateDetails = [];

    foreach ($applications as $item) {
        // Fetch job and candidate details
        $job = \App\Jobs::find($item->job_id);
        $cand = \App\Registry::find($item->candidate_id);

        // If either job or candidate does not exist, skip this application
        if (!$job || !$cand) {
            continue;
        }

        // Store valid details
        $jobDetails[$item->id] = $job;
        $candidateDetails[$item->id] = $cand;
    }

    return view('admin.pages.adminapplications', compact('applications', 'jobDetails', 'candidateDetails'));
}


public function jobedit($id, Request $request)
{
    session_start();
    if (!isset($_SESSION['company_id'])) {
        return redirect()->route("login2");
    }

    // Fetch the job from the database by ID
    $job = \App\Jobs::where(['id' => $id])->first();

    // Fetch categories for the category dropdown
    $categories = \App\Category::all();

    // If the form is submitted with a POST request, handle the update
    if ($request->isMethod("post")) {
        // Update job details
        $job->title = $request->input("title");
        $job->company = $request->input("company");
        $job->location = $request->input("location");
        $job->type = $request->input("type");
        $job->info = $request->input("info");
        $job->responses = $request->input("responses");
        $job->quals = $request->input("quals");
        $job->benefits = $request->input("benefits");
        $job->promotion = $request->input("promotion");
       

        // Handle salary correctly
        $salaryOption = $request->input("salary_option"); // Get the selected salary type
        if ($salaryOption === "negotiable") {
            $job->salary = "Negotiable"; // Save "Negotiable" in database
        } else {
            $salaryValue = str_replace(' ', '', $request->input("salary")); // Remove spaces
            $job->salary = is_numeric($salaryValue) ? $salaryValue : 0; // Ensure numeric value
        }

        // Handle image upload (if new image is provided)
        if ($request->hasFile('img')) {
            // Delete the old image if it exists
            if (!empty($job->img) && file_exists(public_path($job->img))) {
                unlink(public_path($job->img));
            }

            // Save new image
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('upl/logo');
            $file->move($destinationPath, $fileName);

            // Update database with new image path
            $job->img = 'upl/logo/' . $fileName;
        }

        // Save the updated job details
        $job->save();

        return redirect()->route("adminjobs")->with('success', 'Job updated successfully.');
    }

    return view("admin.pages.jobedit", compact('job', 'categories'));
}

public function candedit($id, Request $request)
{

    session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 


    $candidate = \App\Registry::where(['id' => $id])->first();

    // Handle form submission
    if ($request->isMethod("post")) {
        $candidate->first_name = $request->input("first_name");
        $candidate->last_name = $request->input("last_name");
        $candidate->age = $request->input("age");
        $candidate->email = $request->input("email");
        $candidate->phone = $request->input("phone");
        $candidate->job_position = $request->input("job_position");
        $candidate->skills = $request->input("skills");
        $candidate->experience_years = $request->input("experience_years");
        $candidate->address = $request->input("address");
        $candidate->expected_salary = $request->input("expected_salary");

        // Update profile image if a new one is uploaded
        if ($request->file('img')) { 
            // Delete the old image if it exists
            if (!empty($candidate->img) && file_exists(public_path($candidate->img))) {
                unlink(public_path($candidate->img)); 
            }

  


            // Upload the new image
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Add timestamp for unique naming
            $destinationPath = public_path('upl/candidates'); // Define upload path
            $file->move($destinationPath, $fileName); // Move the uploaded file to the upload folder

            // Save the new image path in the database
            $candidate->img = 'upl/candidates/' . $fileName;
        }




    

        // Save the updated candidate details
        $candidate->save();

        return redirect()->route("admincandidates")->with('success', 'Candidate profile updated successfully.');
    }

    // Return the edit view with the candidate data
    return view("admin.pages.candedit", compact('candidate'));
}


public function canddelete($id)
    {
session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 




        $m = \App\Registry::where(['id' => $id])->delete();

        return redirect()->route("admincandidates");

    }public function applicationdelete($id)
    {
session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 




        $m = \App\Applications::where(['id' => $id])->delete();

        return redirect()->route("adminapplications");

    }

public function jobdelete($id)
    {
session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 




        $m = \App\Jobs::where(['id' => $id])->delete();

        return redirect()->route("adminjobs");

    }




    public function permitcom($id,Request $request)
{
session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 

    $com = \App\Comm::where(['id' => $id])->get();
  


       
        $com[0]->comment_id = 1;


        $com[0]->save();
        return redirect()->route("commentary");


    

   
}public function dpermitcom($id,Request $request)
{

session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 

    $com = \App\Comm::where(['id' => $id])->get();


       
        $com[0]->comment_id = 2;


        $com[0]->save();
        return redirect()->route("commentary");


    }
        public function dellcat($id)
    {

session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 




        $m = \App\Category::where(['id' => $id])->delete();

        return redirect()->route("admincategory");

    }   public function dellnewscat($id)
    {

session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 




        $m = \App\Newscategory::where(['id' => $id])->delete();

        return redirect()->route("newscat");

    }  public function dellcom($id)
{

session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 




    $m = \App\Comm::where(['id' => $id])->delete();

    return redirect()->route("commentary");

} public function dellcomp($id)
{

session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 




    $m = \App\Company::where(['id' => $id])->delete();

    return redirect()->route("admincompany");

} public function finishord($id)
{

session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 





    $m = Zakaz::find($id);
    $m->status = 1;
    $m->save();



    return redirect()->route("orders");

}  public function cancelord($id)
{

session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 


    $m = Zakaz::find($id);
    $m->status = 2;
    $m->save();




    $m->save();
    return redirect()->route("orders");

}   public function news() {
    session_start();
    if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
    $news  = \App\news::all();

    return view("admin.pages.news",compact('news'));
} public function commentary() {
    
session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
    $commentary = \App\Comm::all();


    return view("admin.pages.commentary",compact('commentary'));
}public function admincompany() {
    
    session_start();

  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
    $company = \App\Company::all();


    return view("admin.pages.admincompany",compact('company'));
}public function adminnews() {
    session_start();
     if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
    $news = \App\News::all();
    $category = \App\Newscategory::all();


    return view("admin.pages.adminnews",compact('news','category'));
}public function admintrainings() {
    session_start();
     if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
    $trainings = \App\Trainings::all();
  


    return view("admin.pages.admintrainings",compact('trainings'));
}public function admincategory() {
  session_start();
     if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
 $category = \App\Category::all();


    return view("admin.pages.admincategory",compact('category'));
}
public function newscat() {
  session_start();
     if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
 $category = \App\Newscategory::all();


    return view("admin.pages.newscat",compact('category'));
}public function admincandidates() {
     session_start();
     if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
    $company = \App\Registry::all();


    return view("admin.pages.admincandidates",compact('company'));
}public function adminjobs() {
    session_start();
    if (!isset($_SESSION['company_id'])) {
        return redirect()->route("login2");
    } 

    // Fetch jobs and order them: promoted jobs first
    $jobs = \App\Jobs::orderBy('promotion', 'desc')->get();
    $category = \App\Category::all();

    return view("admin.pages.adminjobs", compact('jobs', 'category'));
}
public function ordersuser($id) {
   session_start();
     if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
    $tovari = Zakaz::where(['user_id' => $id])->get();



    return view("admin.pages.ordersuser",compact('tovari'));
}public function orders() {
     session_start();
     if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
    $orders = Zakaz::all();



    return view("admin.pages.orders",compact('orders'));
}public function users() {
     session_start();
     if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
    $users = \App\Registry::all();


    return view("admin.pages.users",compact('users'));
}


public function addcand(Request $request)
{
    session_start();

  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 
    $category = DB::select("select * from category");

    if ($request->isMethod("post")) {
        // Check if the entered email already exists in the database
        $existingUser = \App\Registry::where('email', $request->input("email"))->first();

        if ($existingUser) {
            // Redirect back with an error message if the email exists
            return redirect()->back()->with('error', 'This email already exists in our database. Please try another one or log in.');
        }

        // Create a new instance of Registry
        $logup = new \App\Registry();

        // Handle image upload
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $file = $request->file('img');

            // Generate a unique name for the file
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            // Define the destination path
            $destinationPath = public_path('upl/candidates/');  

            // Move the file to the specified location
            $file->move($destinationPath, $fileName);

            // Save the relative path to the database
            $logup->img = 'upl/candidates/' . $fileName;
        } else {
            return redirect()->back()->with('error', 'Image upload failed. Please try again.');
        }

        // Assign user inputs to the new user instance
        $logup->first_name = $request->input("first_name");
        $logup->last_name = $request->input("last_name");
        $logup->email = $request->input("email");
        $logup->password = $request->input("password");
        $logup->phone = $request->input("phone");
        $logup->job_position = $request->input("job_position");
        $logup->skills = $request->input("skills");
        $logup->experience_years = $request->input("experience");
        $logup->address = $request->input("address");
        $logup->age = $request->input("age");

        // Handle resume upload
        if ($request->hasFile('resume') && $request->file('resume')->isValid()) {
            $file = $request->file('resume');

            // Generate a unique name for the file
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            // Define the destination path
            $destinationPath = public_path('upl/resumes/');  

            // Move the file to the specified location
            $file->move($destinationPath, $fileName);

            // Save the relative path to the database
            $logup->resume = 'upl/resumes/' . $fileName;
        } else {
            // Redirect back with an error message if file upload fails
            return redirect()->back()->with('error', 'Invalid resume upload.');
        }

        // Assign additional fields
        $logup->expected_salary = $request->input("salary");
        

        // Save the new user to the database
        $logup->save();

        // Redirect to the login page with a success message
        return redirect()->route("admincandidates")->with('success', 'Account created successfully!');
    }

    // Render the logup view with categories (if required)
    return view("admin.pages.addcand", compact('category'));
}






public function approvejob($id)
    {
        // Find the candidate by ID in the job_candidates table
        $job = DB::table('jobs')->where('id', $id)->first();
        
        // Check if the candidate exists
        if ($job) {
            // Update the status to "approved" (1)
            DB::table('jobs')->where('id', $id)->update(['status' => 1]);

            return redirect()->back()->with('success', 'Candidate approved!');
        }

        return redirect()->back()->with('error', 'Job not found.');
    }

    // Decline Candidate Method
    public function declinejob($id)
    {
     
        $job = DB::table('jobs')->where('id', $id)->first();
        
        // Check if the candidate exists
        if ($job) {
            // Update the status to "approved" (1)
            DB::table('jobs')->where('id', $id)->update(['status' => 2]);

            return redirect()->back()->with('success', 'Job declined!');
        }

        return redirect()->back()->with('error', 'Job not found.');
    }



public function addjobs(Request $request)
{

session_start();
   if(!isset($_SESSION['company_id'])){
       
       
       return redirect()->route('login2')->with('error', 'You need to log in to your admin account');
       
       
       
       
       
   }else{
      


    $category = \App\Category::all();
 $company_id = $_SESSION['company_id'];

    // Handle missing session data
    if (!$company_id) {
        return redirect()->route('login2')->with('error', 'You need to log in first.');
    }

    // If form is submitted
    if ($request->isMethod("post")) {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'info' => 'required|string',
            'responses' => 'required|string',
            'quals' => 'required|string',
            'benefits' => 'required|string',
            'salary_option' => 'required|string',
            'salary' => 'nullable|string|max:255',
            'cat_id' => 'required|exists:category,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        // Create a new Job entry
        $job = new \App\Jobs();

        // Assign job details
        $job->title = $request->input('title');
        $job->location = $request->input('location');
        $job->type = $request->input('type');
        $job->info = $request->input('info');
        $job->responses = $request->input('responses');
        $job->quals = $request->input('quals');
        $job->benefits = $request->input('benefits');
        $job->cat_id = $request->input('cat_id');
        $job->comp_id = 0;
        $job->company = $request->input('company_name');

        // Handle image upload safely
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $file = $request->file('img');
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $destinationPath = public_path('upl/logo/');
            $file->move($destinationPath, $fileName);
            $job->img = 'upl/logo/' . $fileName;
        } else {
            $job->img = null; // Allow job insertion without an image
        }

        // Handle salary field based on selection
        $job->salary = ($request->input('salary_option') === 'negotiable') ? "Negotiable" : $request->input('salary');

        $job->status = 0;
        $job->promotion = 0;

      try {
    $job->save();
} catch (\Exception $e) {
    // Log the error or return a message
    return redirect()->back()->with('error', 'Failed to save job: ' . $e->getMessage());
}

    }

    // Load the form view
    return view("admin.pages.addjobs", compact('category'));
}}










}