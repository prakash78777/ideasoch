<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

use App\Models\SavedIdea;

class AdminController extends Controller



{
    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $totalBusinesses = Business::count();

        $activeBusinesses = Business::where('status', true)->count();

        $inactiveBusinesses = Business::where('status', false)->count();

        $totalUsers = User::count();

        $totalCategories = Business::whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->count('category');

        $recentBusinesses = Business::latest()
            ->take(8)
            ->get();

        $recentUsers = User::latest()
            ->take(8)
            ->get();

        return view('admin.dashboard', compact(
            'totalBusinesses',
            'activeBusinesses',
            'inactiveBusinesses',
            'totalUsers',
            'totalCategories',
            'recentBusinesses',
            'recentUsers'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Business Ideas
    |--------------------------------------------------------------------------
    */

    public function businesses(Request $request)
    {
        $query = Business::query();

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('business_type', 'like', "%{$search}%");

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Category
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {

            $query->where('category', $request->category);

        }


        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            $query->where('status', $request->status);

        }


        /*
        |--------------------------------------------------------------------------
        | Business List
        |--------------------------------------------------------------------------
        */

        $businesses = $query
            ->latest()
            ->paginate(20)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Categories Dropdown
        |--------------------------------------------------------------------------
        */

        $categories = Business::whereNotNull('category')
            ->where('category', '!=', '')
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');


        return view('admin.businesses.index', compact(
            'businesses',
            'categories'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Create Business
    |--------------------------------------------------------------------------
    */

    public function createBusiness()
    {
        $categories = $this->categoryOptions();

        return view('admin.businesses.create', compact(
            'categories'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Store Business
    |--------------------------------------------------------------------------
    */



    



    public function storeBusiness(Request $request)
    {
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'category' => [
                'required',
                'string',
                'max:100'
            ],

            'business_type' => [
                'nullable',
                'string',
                'max:100'
            ],

            'location' => [
                'nullable',
                'string',
                'max:100'
            ],

            'time' => [
                'nullable',
                'string',
                'max:100'
            ],

            'investment_min' => [
                'required',
                'integer',
                'min:0'
            ],

            'investment_max' => [
                'required',
                'integer',
                'gte:investment_min'
            ],

            'profit' => [
                'nullable',
                'string',
                'max:100'
            ],

            'description' => [
                'required',
                'string'
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096'
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        $validated['status'] = $request->boolean('status');


        /*
        |--------------------------------------------------------------------------
        | Image Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            $validated['image'] = $request
                ->file('image')
                ->store('businesses', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Create Business
        |--------------------------------------------------------------------------
        */

        Business::create($validated);


        return redirect()
            ->route('admin.businesses')
            ->with(
                'success',
                'Business Idea successfully added.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Business
    |--------------------------------------------------------------------------
    */

    public function editBusiness(Business $business)
    {
        $categories = $this->categoryOptions();

        return view('admin.businesses.edit', compact(
            'business',
            'categories'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Update Business
    |--------------------------------------------------------------------------
    */

    public function updateBusiness(
        Request $request,
        Business $business
    ) {
        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255'
            ],

            'category' => [
                'required',
                'string',
                'max:100'
            ],

            'business_type' => [
                'nullable',
                'string',
                'max:100'
            ],

            'location' => [
                'nullable',
                'string',
                'max:100'
            ],

            'time' => [
                'nullable',
                'string',
                'max:100'
            ],

            'investment_min' => [
                'required',
                'integer',
                'min:0'
            ],

            'investment_max' => [
                'required',
                'integer',
                'gte:investment_min'
            ],

            'profit' => [
                'nullable',
                'string',
                'max:100'
            ],

            'description' => [
                'required',
                'string'
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096'
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Status
        |--------------------------------------------------------------------------
        */

        $validated['status'] = $request->boolean('status');


        /*
        |--------------------------------------------------------------------------
        | New Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            /*
            |--------------------------------------------------------------------------
            | Delete Old Image
            |--------------------------------------------------------------------------
            */

            if (
                $business->image &&
                Storage::disk('public')->exists($business->image)
            ) {
                Storage::disk('public')->delete(
                    $business->image
                );
            }


            /*
            |--------------------------------------------------------------------------
            | Store New Image
            |--------------------------------------------------------------------------
            */

            $validated['image'] = $request
                ->file('image')
                ->store('businesses', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Update Business
        |--------------------------------------------------------------------------
        */

        $business->update($validated);


        return redirect()
            ->route('admin.businesses')
            ->with(
                'success',
                'Business Idea successfully updated.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Business
    |--------------------------------------------------------------------------
    */

    public function deleteBusiness(Business $business)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Image
        |--------------------------------------------------------------------------
        */

        if (
            $business->image &&
            Storage::disk('public')->exists($business->image)
        ) {
            Storage::disk('public')->delete(
                $business->image
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Business
        |--------------------------------------------------------------------------
        */

        $business->delete();


        return redirect()
            ->route('admin.businesses')
            ->with(
                'success',
                'Business Idea deleted successfully.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Toggle Business Status
    |--------------------------------------------------------------------------
    */

    public function toggleBusiness(Business $business)
    {
        $business->status = ! $business->status;

        $business->save();


        return back()->with(
            'success',
            $business->status
                ? 'Business Idea activated.'
                : 'Business Idea deactivated.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */

    public function users()
    {
        $users = User::latest()
            ->paginate(20);

        return view(
            'admin.users',
            compact('users')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Categories
    |--------------------------------------------------------------------------
    */

 public function categories()
{
    $categories = Category::orderBy('name')->get();

    return view('admin.categories', compact('categories'));
}


public function createCategory()
{
    return view('admin.categories-create');
}


public function storeCategory(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100|unique:categories,name',
    ]);

    Category::create([
        'name' => trim($validated['name']),
        'status' => true,
    ]);

    return redirect()
        ->route('admin.categories')
        ->with('success', 'Category successfully added.');
}


public function editCategory(Category $category)
{
    return view('admin.categories-edit', compact('category'));
}


public function updateCategory(Request $request, Category $category)
{
    $validated = $request->validate([
        'name' => 'required|string|max:100|unique:categories,name,' . $category->id,
    ]);

    $oldName = $category->name;
    $newName = trim($validated['name']);

    /*
    |--------------------------------------------------------------------------
    | Update category name
    |--------------------------------------------------------------------------
    */

    $category->update([
        'name' => $newName,
    ]);

    /*
    |--------------------------------------------------------------------------
    | Update existing Business records
    |--------------------------------------------------------------------------
    */

    Business::where('category', $oldName)
        ->update([
            'category' => $newName,
        ]);

    return redirect()
        ->route('admin.categories')
        ->with('success', 'Category successfully updated.');
}


public function deleteCategory(Category $category)
{
    $businessCount = Business::where('category', $category->name)->count();

    if ($businessCount > 0) {
        return redirect()
            ->route('admin.categories')
            ->with('error', 'This category cannot be deleted because it has ' . $businessCount . ' business ideas.');
    }

    $category->delete();

    return redirect()
        ->route('admin.categories')
        ->with('success', 'Category successfully deleted.');
}


public function toggleCategory(Category $category)
{
    $category->update([
        'status' => !$category->status,
    ]);

    return redirect()
        ->route('admin.categories')
        ->with('success', 'Category status updated.');
}






public function saveIdea(\App\Models\Business $business)
{
    $userId = auth()->id();

    $savedIdea = \App\Models\SavedIdea::where('user_id', $userId)
        ->where('business_id', $business->id)
        ->first();

    if ($savedIdea) {
        $savedIdea->delete();

        return response()->json([
            'success' => true,
            'saved' => false,
            'message' => 'Idea removed from saved list.'
        ]);
    }

    \App\Models\SavedIdea::create([
        'user_id' => $userId,
        'business_id' => $business->id,
    ]);

    return response()->json([
        'success' => true,
        'saved' => true,
        'message' => 'Business idea saved successfully.'
    ]);
}






public function destroySavedIdea(\App\Models\SavedIdea $savedIdea)
{
    $savedIdea->delete();

    return redirect()
        ->route('admin.saved-ideas')
        ->with('success', 'Saved idea deleted successfully.');
}



public function removeSavedIdea(\App\Models\Business $business)
{
    $savedIdea = \App\Models\SavedIdea::where('user_id', auth()->id())
        ->where('business_id', $business->id)
        ->first();

    if (!$savedIdea) {
        return redirect()->route('my.ideas')
            ->with('error', 'Saved idea not found.');
    }

    $savedIdea->delete();

    return redirect()->route('my.ideas')
        ->with('success', 'Saved idea removed successfully.');
}






public function deleteLead(\App\Models\ContactLead $lead)
{
    $lead->delete();

    return redirect()
        ->route('admin.leads')
        ->with('success', 'Enquiry deleted successfully.');
}



    /*
    |--------------------------------------------------------------------------
    | Locations
    |--------------------------------------------------------------------------
    */

    public function locations()
    {
        $locations = Business::select('location')
            ->selectRaw('COUNT(*) as total')
            ->whereNotNull('location')
            ->where('location', '!=', '')
            ->groupBy('location')
            ->orderBy('location')
            ->get();

        return view(
            'admin.locations',
            compact('locations')
        );
    }



    public function savedIdeas(\Illuminate\Http\Request $request)
{
    $query = \App\Models\SavedIdea::with(['user', 'business'])
        ->latest();

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->whereHas('user', function ($userQuery) use ($search) {
                $userQuery->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })->orWhereHas('business', function ($businessQuery) use ($search) {
                $businessQuery->where('name', 'like', "%{$search}%");
            });
        });
    }

    $savedIdeas = $query->paginate(20)->withQueryString();

    return view('admin.saved-ideas', compact('savedIdeas'));
}



    /*
    |--------------------------------------------------------------------------
    | Budgets
    |--------------------------------------------------------------------------
    */

    public function budgets()
    {
        $budgets = Business::selectRaw('
            CASE

                WHEN investment_max < 10000
                    THEN "Under ₹10K"

                WHEN investment_max < 50000
                    THEN "₹10K - ₹50K"

                WHEN investment_max < 100000
                    THEN "₹50K - ₹1L"

                WHEN investment_max < 500000
                    THEN "₹1L - ₹5L"

                WHEN investment_max < 1000000
                    THEN "₹5L - ₹10L"

                WHEN investment_max < 5000000
                    THEN "₹10L - ₹50L"

                WHEN investment_max < 10000000
                    THEN "₹50L - ₹1Cr"

                ELSE "₹1Cr+"

            END as budget_range,

            COUNT(*) as total
        ')
            ->groupBy('budget_range')
            ->orderBy('budget_range')
            ->get();

        return view(
            'admin.budgets',
            compact('budgets')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Category Options Helper
    |--------------------------------------------------------------------------
    |
    | IMPORTANT:
    | This method is named categoryOptions()
    | because categories() is already used above
    | for the Categories admin page.
    |
    |--------------------------------------------------------------------------
    */

    private function categoryOptions()
    {
        return [

            'Food & Restaurant',

            'Retail Business',

            'Online Business',

            'Service Business',

            'Agriculture',

            'Manufacturing',

            'Health & Wellness',

            'Real Estate',

            'Education',

            'Technology',

            'Franchise',

            'Home Business',

            'Beauty & Salon',

            'Others',

        ];
    }






public function leads(\Illuminate\Http\Request $request)
{
    $query = \App\Models\ContactLead::query()->latest();

    // Search by name, email, phone, subject or message
    if ($request->filled('search')) {
        $search = $request->input('search');

        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('phone', 'like', "%{$search}%")
                ->orWhere('subject', 'like', "%{$search}%")
                ->orWhere('message', 'like', "%{$search}%");
        });
    }

    // Filter by enquiry status
    if ($request->filled('status')) {
        $query->where('status', $request->input('status'));
    }

    $leads = $query->paginate(15)->withQueryString();

    $totalLeads = \App\Models\ContactLead::count();
    $newLeads = \App\Models\ContactLead::where('status', 'new')->count();

    return view('admin.leads.index', compact(
        'leads',
        'totalLeads',
        'newLeads'
    ));
}



}