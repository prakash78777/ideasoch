<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index(Request $request)
    {
        $ids = $request->input('ids', []);

        if (!is_array($ids)) {
            $ids = [$ids];
        }

        $ids = array_values(array_filter($ids));

        $businesses = collect();

        if (!empty($ids)) {
            $businesses = Business::whereIn('id', $ids)
                ->where('status', true)
                ->get();
        }

        return view('compare', compact('businesses'));
    }
}