<?php

namespace App\Http\Controllers;
use App\Registry;
use App\Company;
use App\Applications;
use App\Jobs;
use App\News;
use App\Category;
use App\Trainings;


use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class IndexController extends Controller{

public function main()
{
    session_start();
    
    $jobs = DB::table('jobs')
        ->where('status', 1)
        ->orderByDesc('promotion') // Ensures promoted jobs come first
        ->orderByDesc('created_at') // Sorts by newest jobs after promotions
        ->paginate(10);
    $testimonials = DB::select("select * from testimonials");
    $sponsors = DB::select("select * from partners");
    $sponsors2 = DB::select("select * from sponsors");
    $category = DB::select("select * from category");
    $news = array_reverse(DB::select("select * from news ORDER BY created_at DESC LIMIT 3"));
  $countjobs = DB::table('jobs')->where('status', 1)->count();
 
    $categoryJobCounts = [];

    foreach ($category as $cat) {
        $catjobs = DB::select("select * from jobs where cat_id = ?", [$cat->id]);
        $categoryJobCounts[$cat->id] = count($catjobs);  // Store the job count for this category
    }

    // Pass all data to the view
    return view("pages.index", compact('jobs', 'testimonials', 'category', 'categoryJobCounts', 'news','countjobs','sponsors','sponsors2'));
}public function jobs(Request $request)
{
    session_start();
    
    $countjobs = DB::table('jobs')->where('status', 1)->count();
    $query = DB::table('jobs')->where('status', 1);

    // Apply filters if they exist
    if ($request->location) {
        $query->where('location', $request->location);
    }

    if ($request->category) {
        $query->where('cat_id', $request->category);
    }

    if ($request->job_type) {
        $query->where('type', $request->job_type);
    }

    if ($request->search) {
        $searchTerm = '%' . $request->search . '%';
        $query->where(function ($q) use ($searchTerm) {
            $q->where('title', 'LIKE', $searchTerm)
              ->orWhere('info', 'LIKE', $searchTerm);
        });
    }

    // Order by promotion first, then by creation date
    $jobs = $query->orderByDesc('promotion')->orderByDesc('created_at')->paginate(10);

    $testimonials = DB::table('testimonials')->get();
    $category = DB::table('category')->get();

    $candidate_id = $_SESSION['candidate_id'] ?? null;
    $appliedJobs = [];

    if ($candidate_id) {
        $appliedJobs = DB::table('applications')
            ->where('candidate_id', $candidate_id)
            ->pluck('job_id')
            ->toArray();
    }

    return view("pages.jobs", compact('jobs', 'testimonials', 'category', 'countjobs', 'appliedJobs', 'candidate_id'));
}


public function about()
{
 
session_start();




    $testimonials = DB::select("select * from testimonials");
    $category = DB::select("select * from category");

    return view("pages.about", compact('testimonials', 'category'));
}

public function category($id)
{
 
session_start();
    $jobs = DB::table('jobs')->where('cat_id', $id)->paginate(10); // 10 jobs per page

    $testimonials = DB::select("select * from testimonials");
    $category = DB::select("select * from category");

     $catjobs = DB::select("select * from jobs where cat_id = $id");
        $counter = count($catjobs);  

    return view("pages.category", compact('jobs', 'testimonials', 'category','catjobs','counter'));
}

public function candidatedetail($id)
{
 
session_start();

     $info = DB::select("select * from job_candidates where id = $id");
      $category = DB::select("select * from category");


    return view("pages.candidate-detail", compact('info','category'));
}


 public function candidate()
{
    session_start();
    
    $jobs = DB::table("jobs")->where("status", 1)->get();
    $testimonials = DB::table("testimonials")->get();
    $category = DB::table("category")->get();
    
    // Use Eloquent with pagination (8 candidates per page)
    $candidates = Registry::paginate(16); 
    
    return view("pages.candidate", compact('jobs', 'testimonials', 'category', 'candidates'));
}public function trainings()
{
    session_start();
    
    $trainings = Trainings::paginate(14); 
    $testimonials = DB::table("testimonials")->get();
    $category = DB::table("category")->get();
    
    return view("pages.trainings", compact('trainings', 'testimonials', 'category'));
}

public function job_details($id)
{
    session_start();

    $job = DB::select("select * from jobs where id = ?", [$id]);
    $testimonials = DB::select("select * from testimonials");
    $category = DB::select("select * from category");

    $compactData = ['job', 'testimonials', 'category']; // Initialize compact data

    if (isset($_SESSION['candidate_id'])) {
        $check = DB::table('applications')
            ->where('job_id', $id)
            ->where('candidate_id', $_SESSION['candidate_id'])
            ->exists();

        $userid = $_SESSION['candidate_id'];

        $compactData[] = 'check';
        $compactData[] = 'userid';
    }

    return view("pages.job_details", compact(...$compactData));
}



  public function blogpost()
    {
     
session_start();
         $jobs = DB::select("select * from jobs where status = 1");
         $testimonials = DB::select("select * from testimonials");
         $category = DB::select("select * from news_category");
        $blog = DB::select("select * from news ORDER BY created_at DESC");

          $recentPosts = News::orderBy('created_at', 'desc')->take(4)->get();







        return view("pages.blog",compact('jobs','testimonials','category','blog','recentPosts'));
    }  public function newscategory($id)
    {
     
session_start();
         $jobs = DB::select("select * from jobs where status = 1");
         $testimonials = DB::select("select * from testimonials");
         $category = DB::select("select * from news_category");
      $blog = DB::select("select * from news where cat_id = ? ORDER BY created_at DESC", [$id]);

 $recentPosts = News::orderBy('created_at', 'desc')->take(4)->get();






        return view("pages.newscategory",compact('jobs','testimonials','category','blog','recentPosts'));
    }  public function singleblog($id)
    {
     
session_start();
         $jobs = DB::select("select * from jobs where status = 1");
         $testimonials = DB::select("select * from testimonials");
         $category = DB::select("select * from news_category");
         $blog = DB::select("select * from news where id = $id");
 $recentPosts = News::orderBy('created_at', 'desc')->take(4)->get();







        return view("pages.single-blog",compact('jobs','testimonials','category','blog','recentPosts'));
    } 

  public function contact()
    {
     
session_start();
         $jobs = DB::select("select * from jobs  where status = 1");
         $testimonials = DB::select("select * from testimonials");
         $category = DB::select("select * from category");







        return view("pages.contact",compact('jobs','testimonials','category'));
    } 

 public function submitContact(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Insert into database
        DB::table('contacts')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        // Redirect with success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }




  public function login(Request $request)
    {

session_start();
$category = DB::select("select * from category");






        if ($request->isMethod("post")) {

        
            $email = $request->input("email");
            $password = $request->input("password");
           
            $reg = Registry::where(['email' => $email, 'password' => $password])->first();

           $_SESSION['candidate_id'] = $reg['id'];

 return redirect()->route('cab');




      }

        return view("pages.login",compact('category'));
    }

  public function login2(Request $request)
    {

session_start();
$category = DB::select("select * from category");






        if ($request->isMethod("post")) {

        
            $email = $request->input("email");
            $password = $request->input("password");
           
            $reg = Company::where(['email' => $email, 'password' => $password])->first();

           $_SESSION['company_id'] = $reg['id'];

 return redirect()->route('company-profile');




      }

        return view("pages.login2",compact('category'));
    }public function filter(Request $request)
{
    session_start();

    $query = Jobs::query()->where('status', 1);

    if ($request->location) {
        $query->where('location', $request->location);
    }

    if ($request->category) {
        $query->where('cat_id', $request->category);
    }

    if ($request->job_type) {
        $query->where('type', $request->job_type);
    }

    // ✅ Search by title or description
    if ($request->search) {
        $searchTerm = '%' . $request->search . '%';
        $query->where(function ($q) use ($searchTerm) {
            $q->where('title', 'LIKE', $searchTerm)
              ->orWhere('info', 'LIKE', $searchTerm);
        });
    }

    // ✅ Order by promotion first, then by creation date
    $jobs = $query->orderByDesc('promotion')->orderByDesc('created_at')->paginate(10);

    // ✅ Check if user has applied to jobs
    $check = [];
    $userid = null;

    if (isset($_SESSION['candidate_id'])) {
        $userid = $_SESSION['candidate_id'];

        // Get all job IDs from filtered results
        $jobIds = $jobs->pluck('id')->toArray();

        // Check if user applied to any of the filtered jobs
        $applications = DB::table('applications')
            ->whereIn('job_id', $jobIds)
            ->where('candidate_id', $userid)
            ->pluck('job_id')
            ->toArray();

        // Store results in $check array
        foreach ($jobIds as $jobId) {
            $check[$jobId] = in_array($jobId, $applications);
        }
    }

    return view('pages.filter', compact('jobs', 'check', 'userid'))->render();
}



public function jobedit2($id, Request $request)
{

    session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 


$job = Jobs::find($id);


    // If the form is submitted with a POST request, handle the update
    if ($request->isMethod("post")) {
        // Update job details
        $job->title = $request->input("title");
      
        $job->location = $request->input("location");
        $job->type = $request->input("type");
        $job->info = $request->input("info");
        $job->responses = $request->input("responses");
        $job->quals = $request->input("quals");
        $job->benefits = $request->input("benefits");
        $job->salary = $request->input("salary");
       
       
        $job->cat_id = $request->input("cat_id"); // Assuming category ID is passed from the form

        $job->save();

        return redirect()->route("myapplications2")->with('success', 'Job updated successfully.');
    }

    // Fetch categories for the category dropdown
    $category = Category::all();

    // Return the view with job and categories data
    return view("pages.jobedit2", compact('job', 'category'));
}


public function jobdelete2($id)
    {
session_start();
  if (!isset($_SESSION['company_id'])){

            return redirect()->route("login2");

        } 




        $m = Jobs::where(['id' => $id])->delete();

        return redirect()->route("myapplications2");

    }


public function cab()
{
    session_start();
    
    $category = DB::select("select * from category");

    if (!isset($_SESSION['candidate_id'])) {
        return redirect()->route("login");
    } else {
        $id = $_SESSION['candidate_id'];
        
        $users = Registry::where(['id' => $id])->get();
        
        return view("pages.cab", compact('category', 'users'));
    }
}
public function myapplications()
{
    session_start();
    $id = $_SESSION['candidate_id'];  // Access candidate ID from the session
$category = DB::select("select * from category");
    // Get user details
    $users = Registry::where('id', $id)->first();

    // Check if user is found
    if (!$users) {
        return redirect()->route('login')->with('error', 'User not found. Please log in.');
    }

    // Get the applications for the logged-in candidate
    $apps = Applications::where('candidate_id', $id)->get();

    // Get job IDs from the applications
    $jobIds = $apps->pluck('job_id');  // Get all job_ids from the applications
    $appsjob = Applications::whereIn('job_id', $jobIds)->get();
    
    // Fetch jobs related to the applications
    $jobs = Jobs::whereIn('id', $jobIds)->get();  

    // Add formatted date to each application
    $apps->each(function ($app) {
        $app->formatted_date = $app->created_at->format('d M Y'); // Example: 03 Feb 2025
    });

    return view("pages.myapplications", compact('users', 'jobs', 'apps', 'appsjob','category'));
}


public function myapplications2()
{
    session_start();
    $category = DB::select("select * from category");
    $id = $_SESSION['company_id'];  // Get company ID from the session

    // Get jobs posted by the company
    $jobs = Jobs::where('comp_id', $id)->get();

    // Get applications for the company, matching job IDs to those posted by the company
    $apps = Applications
    ::whereIn('job_id', $jobs->pluck('id'))->get();

 
    $applicationsWithDates = $apps->map(function($application) {
        $application->formatted_date = \Carbon\Carbon::parse($application->date)->format('d M Y');
        return $application;
    });

    return view("pages.myapplications2", compact('jobs', 'apps', 'applicationsWithDates','category'));
}


public function viewCandidates($id)
{
   $category = DB::select("select * from category");
    $candidates = DB::table('job_candidates')
                    ->join('applications', 'job_candidates.id', '=', 'applications.candidate_id')
                    ->where('applications.job_id', $id)
                    ->select('job_candidates.*', 'applications.status') // Selecting both candidate details and status
                    ->get();

    // Return the data to the view
    return view('pages.view_candidates', compact('candidates','category'));
}

    public function approvecandidate($id)
    {
        // Find the candidate by ID in the job_candidates table
        $candidate = DB::table('job_candidates')->where('id', $id)->first();
        
        // Check if the candidate exists
        if ($candidate) {
            // Update the status to "approved" (1)
            DB::table('applications')->where('candidate_id', $id)->update(['status' => 1]);

            return redirect()->back()->with('success', 'Candidate approved!');
        }

        return redirect()->back()->with('error', 'Candidate not found.');
    }

    // Decline Candidate Method
    public function declinecandidate($id)
    {
        // Find the candidate by ID in the job_candidates table
        $candidate = DB::table('job_candidates')->where('id', $id)->first();

        // Check if the candidate exists
        if ($candidate) {
                      DB::table('applications')->where('candidate_id', $id)->update(['status' => 2]);


            return redirect()->back()->with('success', 'Candidate declined!');
        }

        return redirect()->back()->with('error', 'Candidate not found.');
    }


public function logup(Request $request)
{
    session_start();


    $category = DB::select("select * from category");

    if ($request->isMethod("post")) {
        // Check if the entered email already exists in the database
        $existingUser = Registry::where('email', $request->input("email"))->first();

        if ($existingUser) {
            // Redirect back with an error message if the email exists
            return redirect()->back()->with('error', 'This email already exists in our database. Please try another one or log in.');
        }

        // Create a new instance of Registry
        $logup = new Registry();

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
        return redirect()->route("login")->with('success', 'Account created successfully!');
    }

    // Render the logup view with categories (if required)
    return view("pages.logup", compact('category'));
}


public function postjob(Request $request)
{
    session_start();

    $category = DB::select("select * from category");

    if ($request->isMethod("post")) {
          $existingCompany = DB::table('company')->where('email', $request->input('email'))->first();

        if ($existingCompany) {
            // If the email exists, redirect back with an error message
            return redirect()->back()->with('error', 'Email already exists. Please use a different email address.');
        }

        $companyLogup = new Company();
      if ($request->hasFile('img') && $request->file('img')->isValid()) {
    $file = $request->file('img');

    // Generate a unique name for the file
    $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

    // Define the destination path
    $destinationPath = public_path('upl/logo/');  
    
    // Move the file to the specified location
    $file->move($destinationPath, $fileName);

    // Save the relative path to the database
    $companyLogup->img = 'upl/logo/' . $fileName;


       


      

      

    }
      if ($request->hasFile('cert') && $request->file('cert')->isValid()) {
            $file = $request->file('cert');

            // Generate a unique name for the file
            $fileName = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

            // Define the destination path
            $destinationPath = public_path('upl/certs/');  

            // Move the file to the specified location
            $file->move($destinationPath, $fileName);

            // Save the relative path to the database
            $companyLogup->file = 'upl/certs/' . $fileName;
        } else {
            // Redirect back with an error message if file upload fails
            return redirect()->back()->with('error', 'Invalid resume upload.');
        }
    $companyLogup->first_name = $request->input("first_name");
        $companyLogup->second_name = $request->input("second_name");
        $companyLogup->age = $request->input("age");
        $companyLogup->phone = $request->input("phone");
        $companyLogup->job_position = $request->input("job_position");
        $companyLogup->company_name = $request->input("company_name");
        $companyLogup->description = $request->input("description");
        $companyLogup->email = $request->input("email");
        $companyLogup->password = $request->input("password");
        $companyLogup->status = 0;
        
        $companyLogup->save();
        return redirect()->route("login2")->with('success', 'Account created successfully!');
    }

    return view("pages.postjob", compact('category'));
}public function addjob(Request $request)
{
    // Start the session
    session_start();

    // Get all categories for the dropdown
    $category = Category::all();

    // Retrieve the company_id from the session
    $company_id = $_SESSION['company_id']; 

    // Handle missing session data
    if (!$company_id) {
        return redirect()->route('login2')->with('error', 'You need to log in first.');
    }

    // Fetch company details from DB
    $company = DB::table('company')->where('id', $company_id)->first();
    
    if (!$company) {
        return redirect()->route('login2')->with('error', 'Company not found.');
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
            'salary_option' => 'required|string', // New field for selecting salary type
            'salary' => 'nullable|string|max:255', // Can be "Negotiable" or a number
            'cat_id' => 'required|exists:category,id', 
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        // Create a new Job entry
        $job = new Jobs();

        // Assign job details
        $job->title = $request->input('title');
        $job->location = $request->input('location');
        $job->type = $request->input('type');
        $job->info = $request->input('info');
        $job->responses = $request->input('responses');
        $job->quals = $request->input('quals');
        $job->benefits = $request->input('benefits');
        $job->cat_id = $request->input('cat_id');
        $job->comp_id = $company_id;
        $job->company = $company->company_name;
        $job->img = $company->img;
        $job->status = 0;
        $job->promotion = 0;

        // Handle salary field based on selection
        if ($request->input('salary_option') === 'negotiable') {
            $job->salary = "Negotiable";
        } else {
            $job->salary = $request->input('salary'); // Save the entered salary
        }

        $job->save();

        // Redirect with success message
        return redirect()->route('myapplications2')->with('success', 'Job added successfully!');
    }

    // Load the form view
    return view("pages.addjob", compact('category'));
}

 public function companyprofile()
{
    session_start();
    
    $category = DB::select("select * from category");

    if (!isset($_SESSION['company_id'])) {
        return redirect()->route("login2");
    } else {
        $id = $_SESSION['company_id'];
        
        $comp = Company::where(['id' => $id])->get();
        return view("pages.company-profile", compact('category', 'comp'));
    }
}

public function edit(Request $request)
{
    session_start();
    $candidateId = $_SESSION['candidate_id'];
  $category = DB::select("select * from category");
    // Fetch the candidate's details from the database
    $candidate = Registry::where(['id' => $candidateId])->first();

    if ($request->isMethod("post")) {
        // Update candidate details
        $candidate->first_name = $request->input("first_name");
        $candidate->last_name = $request->input("last_name");
        $candidate->age = $request->input("age");
        $candidate->email = $request->input("email");
        $candidate->phone = $request->input("phone");
        $candidate->job_position = $request->input("job_position");
        $candidate->skills = $request->input("skills");
        $candidate->experience_years = $request->input("experience");
        $candidate->address = $request->input("address");
        $candidate->expected_salary = $request->input("salary");

        // Handle image upload: delete old and save new
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            // Delete the old image if it exists
            if (!empty($candidate->img) && file_exists(public_path($candidate->img))) {
                unlink(public_path($candidate->img)); // Delete the old file
            }

            // Process the new image
            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Add a timestamp for unique naming
            $destinationPath = public_path('uploaded'); // Define the upload path
            $file->move($destinationPath, $fileName); // Save the file in the upload folder

            // Update the database with the new image path
            $candidate->img = 'uploaded/' . $fileName;
        }

        // Handle resume upload: delete old and save new
        if ($request->hasFile('resume') && $request->file('resume')->isValid()) {
            // Delete the old resume if it exists
            if (!empty($candidate->resume) && file_exists(public_path($candidate->resume))) {
                unlink(public_path($candidate->resume)); // Delete the old file
            }

            // Process the new resume
            $file = $request->file('resume');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Add a timestamp for unique naming
            $destinationPath = public_path('uploaded/resumes'); // Define the upload path
            $file->move($destinationPath, $fileName); // Save the file in the upload folder

            // Update the database with the new resume path
            $candidate->resume = 'uploaded/resumes/' . $fileName;
        }

        // Save the updated candidate details
        $candidate->save();

        return redirect()->route("cab")->with('success', 'Profile updated successfully.');
    }

    return view("pages.edit", compact('candidate','category'));
}

public function editcomp(Request $request)
{
    session_start();
    $companyId = $_SESSION['company_id'];
    $category = DB::select("select * from category");

    // Fetch the company's details from the database
    $company = Company::where(['id' => $companyId])->first();

    if ($request->isMethod("post")) {
        // Update company details
        $company->first_name = $request->input("first_name");
        $company->second_name = $request->input("second_name");
        $company->age = $request->input("age");
        $company->phone = $request->input("phone");
        $company->job_position = $request->input("job_position");
        $company->company_name = $request->input("company_name");
        $company->description = $request->input("description"); // Save company description

        // Handle profile image upload: delete old and save new
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            if (!empty($company->img) && file_exists(public_path($company->img))) {
                unlink(public_path($company->img));
            }

            $file = $request->file('img');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('uploaded');
            $file->move($destinationPath, $fileName);

            $company->img = 'uploaded/' . $fileName;
        }

        // Handle certificate file upload: delete old and save new
        if ($request->hasFile('certificate') && $request->file('certificate')->isValid()) {
            if (!empty($company->file) && file_exists(public_path($company->file))) {
                unlink(public_path($company->file));
            }

            $certFile = $request->file('certificate');
            $certFileName = time() . '_' . $certFile->getClientOriginalName();
            $certDestinationPath = public_path('upl/certs');
            $certFile->move($certDestinationPath, $certFileName);

            $company->file = 'upl/certs/' . $certFileName;
        }

        // Save the updated company details
        $company->save();

        return redirect()->route("company-profile")->with('success', 'Profile updated successfully.');
    }

    return view("pages.editcomp", compact('company', 'category'));
}

   public function exit()
{
    $category = DB::select("select * from category");

    session_start();

    if (isset($_SESSION['candidate_id'])) {
        unset($_SESSION['candidate_id']); 
    return redirect()->route("login");

    }

    if (isset($_SESSION['company_id'])) {
        unset($_SESSION['company_id']); 
    return redirect()->route("login2");

    }
}
public function apply($id)
{

    session_start();

$jobid = $id;
$userid = $_SESSION['candidate_id'];

$a = new Applications();

        $a->candidate_id = $userid;
        $a->job_id = $jobid;
        $a->status = 0;
        
$a->save();

 return redirect()->route("successfully");
  }public function successfully()
{
    session_start();
$category = DB::select("select * from category");

 return view("pages.succesfully",compact('category'));
}

}