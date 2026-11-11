<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Home
    |--------------------------------------------------------------------------
    */

    // public function index()
    // {
    //     $businesses = Business::where('status', true)
    //         ->latest()
    //         ->get();

    //     return view('home', compact('businesses'));
    // }



    public function index()
{
    $businesses = Business::where('status', true)
        ->inRandomOrder()
        ->get();

    return view('home', compact('businesses'));
}




public function dashboard()
{
    return view('dashboard', [
        'savedIdeasCount' => 4,
        'compareCount' => 2,
        'totalViews' => 12,
    ]);
}


    /*
    |--------------------------------------------------------------------------
    | Find Your Business Page
    |--------------------------------------------------------------------------
    */

    public function findBusiness(Request $request)
    {
        return view('find-business');
    }


    /*
    |--------------------------------------------------------------------------
    | Business Ideas
    |--------------------------------------------------------------------------
    */

    public function businesses(Request $request)
    {
        $query = Business::where('status', true);


        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = trim($request->search);

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('category', 'like', '%' . $search . '%')
                    ->orWhere('business_type', 'like', '%' . $search . '%');
            });
        }


        /*
        |--------------------------------------------------------------------------
        | BUDGET
        |--------------------------------------------------------------------------
        */

        if ($request->filled('budget') && $request->budget !== 'all') {

            $budget = (int) $request->budget;

            $query->where('investment_min', '<=', $budget);
        }


        /*
        |--------------------------------------------------------------------------
        | BUSINESS TYPE
        |--------------------------------------------------------------------------
        |
        | Different database formats को support करेगा.
        |
        */

        if ($request->filled('type') && $request->type !== 'all') {

            $type = strtolower(trim($request->type));

            $typeMap = [

                'food-restaurant' => [
                    'food',
                    'food & restaurant',
                    'food-restaurant',
                    'food restaurant',
                    'restaurant'
                ],

                'retail' => [
                    'retail',
                    'retail business'
                ],

                'online' => [
                    'online',
                    'online business'
                ],

                'service' => [
                    'service',
                    'services',
                    'service business'
                ],

                'agriculture' => [
                    'agriculture',
                    'agriculture business'
                ],

                'manufacturing' => [
                    'manufacturing',
                    'manufacturing business'
                ],

                'health-wellness' => [
                    'health',
                    'health & wellness',
                    'health-wellness',
                    'wellness'
                ],

                'real-estate' => [
                    'real estate',
                    'real-estate'
                ],

                'education' => [
                    'education',
                    'education business'
                ],

                'technology' => [
                    'technology',
                    'tech',
                    'technology business'
                ],

                'franchise' => [
                    'franchise'
                ],

                'home-business' => [
                    'home business',
                    'home-business'
                ],

                'beauty-salon' => [
                    'beauty',
                    'beauty & salon',
                    'beauty salon',
                    'salon'
                ],

                'others' => [
                    'others',
                    'other'
                ],
            ];


            if (isset($typeMap[$type])) {

                $types = $typeMap[$type];

                $query->where(function ($q) use ($types) {

                    foreach ($types as $value) {

                        $q->orWhereRaw(
                            'LOWER(business_type) = ?',
                            [strtolower($value)]
                        );

                        $q->orWhereRaw(
                            'LOWER(category) = ?',
                            [strtolower($value)]
                        );
                    }
                });

            } else {

                $query->where(function ($q) use ($type) {

                    $q->whereRaw(
                        'LOWER(business_type) LIKE ?',
                        ['%' . $type . '%']
                    )
                    ->orWhereRaw(
                        'LOWER(category) LIKE ?',
                        ['%' . $type . '%']
                    );
                });
            }
        }


        /*
        |--------------------------------------------------------------------------
        | CATEGORY
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category') && $request->category !== 'all') {

            $category = trim($request->category);

            $query->whereRaw(
                'LOWER(category) LIKE ?',
                ['%' . strtolower($category) . '%']
            );
        }


        /*
        |--------------------------------------------------------------------------
        | LOCATION
        |--------------------------------------------------------------------------
        |
        | IMPORTANT:
        | Website के सभी business ideas INDIA के हैं.
        |
        | User ने Bihar / Rajasthan / Assam आदि select किया हो,
        | फिर भी result India के सभी ideas में से आएगा.
        |
        | इसलिए location filter intentionally नहीं लगाया गया.
        |
        */


        /*
        |--------------------------------------------------------------------------
        | EXPERIENCE
        |--------------------------------------------------------------------------
        |
        | अभी database filtering नहीं करेंगे.
        |
        */


        /*
        |--------------------------------------------------------------------------
        | TIME
        |--------------------------------------------------------------------------
        |
        | Time mismatch की वजह से results zero नहीं होने देंगे.
        |
        */


        /*
        |--------------------------------------------------------------------------
        | EXPECTED INCOME
        |--------------------------------------------------------------------------
        |
        | अभी optional रखा गया है.
        |
        */


        /*
        |--------------------------------------------------------------------------
        | NUMBER OF PEOPLE
        |--------------------------------------------------------------------------
        |
        | अभी optional रखा गया है.
        |
        */


        /*
        |--------------------------------------------------------------------------
        | SORT
        |--------------------------------------------------------------------------
        */

        if ($request->sort === 'oldest') {

            $query->oldest();

        } elseif ($request->sort === 'name') {

            $query->orderBy('name');

        } elseif ($request->sort === 'investment_low') {

            $query->orderBy('investment_min');

        } elseif ($request->sort === 'investment_high') {

            $query->orderByDesc('investment_max');

        } else {

            $query->latest();
        }


        /*
        |--------------------------------------------------------------------------
        | PAGINATION
        |--------------------------------------------------------------------------
        */

        $businesses = $query
            ->paginate(24)
            ->withQueryString();


        return view(
            'businesses',
            compact('businesses')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Business Detail
    |--------------------------------------------------------------------------
    */

/*
|--------------------------------------------------------------------------
| Business Detail
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Business Detail
|--------------------------------------------------------------------------
*/

public function show($id)
{
    $business = Business::where('status', true)
        ->findOrFail($id);

    // Total views count
    $business->increment('views');

    return view('business-detail', [
        'business' => $business
    ]);
}

}