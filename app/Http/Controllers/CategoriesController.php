<?php

namespace App\Http\Controllers;

use App\Models\Business;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = [
            [
                'name' => 'Food & Restaurant',
                'icon' => '🍔',
                'color' => '#fff0e8',
                'icon_color' => '#ff6b00',
            ],
            [
                'name' => 'Retail Business',
                'icon' => '🏪',
                'color' => '#eaf3ff',
                'icon_color' => '#2878e8',
            ],
            [
                'name' => 'Online Business',
                'icon' => '💻',
                'color' => '#e8fff4',
                'icon_color' => '#00a86b',
            ],
            [
                'name' => 'Service Business',
                'icon' => '🛠️',
                'color' => '#f5eaff',
                'icon_color' => '#8b42d8',
            ],
            [
                'name' => 'Agriculture',
                'icon' => '🌱',
                'color' => '#eaffef',
                'icon_color' => '#28a745',
            ],
            [
                'name' => 'Manufacturing',
                'icon' => '🏭',
                'color' => '#e8f7ff',
                'icon_color' => '#1687bd',
            ],
            [
                'name' => 'Health & Wellness',
                'icon' => '⚕️',
                'color' => '#fff5df',
                'icon_color' => '#e58a00',
            ],
            [
                'name' => 'Real Estate',
                'icon' => '🏢',
                'color' => '#f1eaff',
                'icon_color' => '#7546d8',
            ],
            [
                'name' => 'Education',
                'icon' => '🎓',
                'color' => '#ffe9ed',
                'icon_color' => '#e13b52',
            ],
            [
                'name' => 'Technology',
                'icon' => '💡',
                'color' => '#e9f5ff',
                'icon_color' => '#2676d9',
            ],
            [
                'name' => 'Franchise',
                'icon' => '🏬',
                'color' => '#f6ebff',
                'icon_color' => '#8140cf',
            ],
            [
                'name' => 'Home Business',
                'icon' => '🏠',
                'color' => '#eaffee',
                'icon_color' => '#27a34a',
            ],
            [
                'name' => 'Beauty & Salon',
                'icon' => '💇',
                'color' => '#ffeaf4',
                'icon_color' => '#e62e7b',
            ],
            [
                'name' => 'Others',
                'icon' => '👥',
                'color' => '#e9f5ff',
                'icon_color' => '#2d82c7',
            ],
        ];

        foreach ($categories as &$category) {
            $category['count'] = Business::where('status', true)
                ->where('category', $category['name'])
                ->count();
        }

        unset($category);

        return view('categories', compact('categories'));
    }
}