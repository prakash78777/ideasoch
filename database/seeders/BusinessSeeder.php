<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Business;

class BusinessSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Budget Ranges
        |--------------------------------------------------------------------------
        */

        $budgets = [

            [
                'label' => 'Under ₹10K',
                'min'   => 5000,
                'max'   => 10000,
            ],

            [
                'label' => '₹10K - ₹50K',
                'min'   => 10000,
                'max'   => 50000,
            ],

            [
                'label' => '₹50K - ₹1L',
                'min'   => 50000,
                'max'   => 100000,
            ],

            [
                'label' => '₹1L - ₹5L',
                'min'   => 100000,
                'max'   => 500000,
            ],

            [
                'label' => '₹5L - ₹10L',
                'min'   => 500000,
                'max'   => 1000000,
            ],

            [
                'label' => '₹10L - ₹50L',
                'min'   => 1000000,
                'max'   => 5000000,
            ],

            [
                'label' => '₹50L - ₹1Cr',
                'min'   => 5000000,
                'max'   => 10000000,
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | Business Categories & Ideas
        |--------------------------------------------------------------------------
        */

        $types = [

            'food' => [
                'category' => 'Food & Restaurant',

                'ideas' => [
                    'Home Tiffin Service',
                    'Cloud Kitchen',
                    'Fast Food Corner',
                    'Bakery & Cake Business',
                ],
            ],


            'retail' => [
                'category' => 'Retail Business',

                'ideas' => [
                    'Grocery Store',
                    'Mobile Accessories Shop',
                    'Clothing Store',
                    'General Store',
                ],
            ],


            'online' => [
                'category' => 'Online Business',

                'ideas' => [
                    'Digital Marketing Agency',
                    'Online Product Store',
                    'Affiliate Marketing Business',
                    'Online Course Business',
                ],
            ],


            'service' => [
                'category' => 'Service Business',

                'ideas' => [
                    'Cleaning Service',
                    'Virtual Assistant Service',
                    'Home Repair Service',
                    'Car Washing Service',
                ],
            ],


            'agriculture' => [
                'category' => 'Agriculture',

                'ideas' => [
                    'Organic Farming',
                    'Mushroom Farming',
                    'Dairy Farming',
                    'Vegetable Farming',
                ],
            ],


            'manufacturing' => [
                'category' => 'Manufacturing',

                'ideas' => [
                    'Paper Product Manufacturing',
                    'Food Processing Unit',
                    'Soap Manufacturing',
                    'Furniture Manufacturing',
                ],
            ],


            'health-wellness' => [
                'category' => 'Health & Wellness',

                'ideas' => [
                    'Fitness Training Business',
                    'Wellness Service',
                    'Yoga Center',
                    'Health & Nutrition Consultancy',
                ],
            ],


            'real-estate' => [
                'category' => 'Real Estate',

                'ideas' => [
                    'Real Estate Service',
                    'Property Consulting',
                    'Property Management',
                    'Real Estate Brokerage',
                ],
            ],


            'education' => [
                'category' => 'Education',

                'ideas' => [
                    'Home Tuition Service',
                    'Computer Training Center',
                    'Coaching Institute',
                    'Skill Development Center',
                ],
            ],


            'technology' => [
                'category' => 'Technology',

                'ideas' => [
                    'Web Development Agency',
                    'Software Development Service',
                    'Mobile App Development',
                    'IT Support Service',
                ],
            ],


            'franchise' => [
                'category' => 'Franchise',

                'ideas' => [
                    'Food Franchise',
                    'Retail Franchise',
                    'Education Franchise',
                    'Service Franchise',
                ],
            ],


            'home-business' => [
                'category' => 'Home Business',

                'ideas' => [
                    'Home Bakery',
                    'Handmade Products Business',
                    'Home Catering Business',
                    'Handicraft Business',
                ],
            ],


            'beauty-salon' => [
                'category' => 'Beauty & Salon',

                'ideas' => [
                    'Beauty Salon',
                    'Home Beauty Service',
                    'Barber Shop',
                    'Beauty Products Store',
                ],
            ],


            'others' => [
                'category' => 'Others',

                'ideas' => [
                    'Event Management Service',
                    'Photography Service',
                    'Printing Service',
                    'Courier & Delivery Service',
                ],
            ],
        ];


        /*
        |--------------------------------------------------------------------------
        | Image Prefix Mapping
        |--------------------------------------------------------------------------
        |
        | Example:
        |
        | Home Tiffin Service + Under ₹10K
        | = home-tiffin-servicea.jpg
        |
        | Home Tiffin Service + ₹10K - ₹50K
        | = home-tiffin-serviceb.jpg
        |
        | Home Tiffin Service + ₹50L - ₹1Cr
        | = home-tiffin-serviceg.jpg
        |
        */

        $imagePrefixes = [

            // Food
            'Home Tiffin Service'      => 'home-tiffin-service',
            'Cloud Kitchen'            => 'cloud-kitchen',
            'Fast Food Corner'         => 'fast-food',
            'Bakery & Cake Business'   => 'bakery',

            // Retail
            'Grocery Store'            => 'grocery',
            'Mobile Accessories Shop'  => 'mobile',
            'Clothing Store'           => 'clothing',
            'General Store'            => 'general',

            // Online
            'Digital Marketing Agency' => 'digital',
            'Online Product Store'     => 'online',
            'Affiliate Marketing Business' => 'online',
            'Online Course Business'   => 'online-education',

            // Service
            'Cleaning Service'         => 'cleaning',
            'Virtual Assistant Service'=> 'virtual',
            'Home Repair Service'      => 'plumbing',
            'Car Washing Service'      => 'cleaning',

            // Agriculture
            'Organic Farming'          => 'organic',
            'Mushroom Farming'         => 'mushroom',
            'Dairy Farming'            => 'dairy',
            'Vegetable Farming'        => 'vegetable',

            // Manufacturing
            'Paper Product Manufacturing' => 'paper',
            'Food Processing Unit'        => 'food-processing',
            'Soap Manufacturing'          => 'health-food',
            'Furniture Manufacturing'     => 'furniture',

            // Health & Wellness
            'Fitness Training Business'   => 'fitness',
            'Wellness Service'            => 'wellness',
            'Yoga Center'                 => 'yoga',
            'Health & Nutrition Consultancy' => 'wellness',

            // Real Estate
            'Real Estate Service'       => 'real-estate',
            'Property Consulting'       => 'property-consulting',
            'Property Management'       => 'property-management',
            'Real Estate Brokerage'     => 'real-estate',

            // Education
            'Home Tuition Service'      => 'home-tuition',
            'Computer Training Center'  => 'computer-training',
            'Coaching Institute'        => 'coaching-center',
            'Skill Development Center' => 'coaching-center',

            // Technology
            'Web Development Agency'      => 'web-development',
            'Software Development Service'=> 'software-development',
            'Mobile App Development'      => 'mobile-app',
            'IT Support Service'          => 'it-support',

            // Franchise
            'Food Franchise'            => 'retail-franchise',
            'Retail Franchise'          => 'retail-franchise',
            'Education Franchise'       => 'education-franchise',
            'Service Franchise'         => 'service-franchise',

            // Home Business
            'Home Bakery'               => 'home-bakery',
            'Handmade Products Business' => 'handmade-products',
            'Home Catering Business'    => 'home-bakery',
            'Handicraft Business'       => 'home-craft',

            // Beauty
            'Beauty Salon'              => 'beauty-salon',
            'Home Beauty Service'       => 'home-beauty',
            'Barber Shop'               => 'hair-salon',
            'Beauty Products Store'     => 'beauty-salon',

            // Others
            'Event Management Service'  => 'event-management',
            'Photography Service'      => 'photography',
            'Printing Service'         => 'paper',
            'Courier & Delivery Service'=> 'travel-agency',
        ];


        /*
        |--------------------------------------------------------------------------
        | Delete Old Business Ideas
        |--------------------------------------------------------------------------
        */

        Business::query()->delete();


        /*
        |--------------------------------------------------------------------------
        | Create Business Ideas
        |--------------------------------------------------------------------------
        */

        $businesses = [];


        foreach ($types as $type => $data) {

            foreach ($budgets as $budgetIndex => $budget) {

                foreach ($data['ideas'] as $idea) {

                    /*
                    |--------------------------------------------------------------------------
                    | Business Name
                    |--------------------------------------------------------------------------
                    */

                    $name = $idea . ' - ' . $budget['label'];


                    /*
                    |--------------------------------------------------------------------------
                    | Profit
                    |--------------------------------------------------------------------------
                    */

                    $profit = match ($budgetIndex) {

                        0 => '₹5K+',

                        1 => '₹15K+',

                        2 => '₹30K+',

                        3 => '₹60K+',

                        4 => '₹1.5L+',

                        5 => '₹4L+',

                        6 => '₹10L+',

                        default => '₹20K+',
                    };


                    /*
                    |--------------------------------------------------------------------------
                    | Description
                    |--------------------------------------------------------------------------
                    */

                    $description =
                        'Start a ' .
                        strtolower($idea) .
                        ' with an estimated investment of ' .
                        $budget['label'] .
                        '. Build customers, manage operating costs and grow the business according to demand across India.';


                    /*
                    |--------------------------------------------------------------------------
                    | Image Letter
                    |--------------------------------------------------------------------------
                    |
                    | a = Under ₹10K
                    | b = ₹10K - ₹50K
                    | c = ₹50K - ₹1L
                    | d = ₹1L - ₹5L
                    | e = ₹5L - ₹10L
                    | f = ₹10L - ₹50L
                    | g = ₹50L - ₹1Cr
                    |
                    */

                    $imageLetter = match ($budgetIndex) {

                        0 => 'a',

                        1 => 'b',

                        2 => 'c',

                        3 => 'd',

                        4 => 'e',

                        5 => 'f',

                        6 => 'g',

                        default => 'a',
                    };


                    /*
                    |--------------------------------------------------------------------------
                    | Get Image Prefix
                    |--------------------------------------------------------------------------
                    */

                    $imagePrefix = $imagePrefixes[$idea] ?? 'general';


                    /*
                    |--------------------------------------------------------------------------
                    | Final Image Filename
                    |--------------------------------------------------------------------------
                    */

                    $image = $imagePrefix . $imageLetter . '.jpg';


                    /*
                    |--------------------------------------------------------------------------
                    | Business Data
                    |--------------------------------------------------------------------------
                    */

                    $businesses[] = [

                        'name' => $name,

                        'category' => $data['category'],

                        'location' => 'India',

                        'business_type' => $type,

                        'time' => $budgetIndex <= 2
                            ? 'part_time'
                            : 'full_time',

                        'investment_min' => $budget['min'],

                        'investment_max' => $budget['max'],

                        'profit' => $profit,

                        'description' => $description,

                        /*
                        |--------------------------------------------------------------------------
                        | IMAGE
                        |--------------------------------------------------------------------------
                        |
                        | Only filename is saved in database.
                        |
                        */

                        'image' => $image,

                        'status' => true,

                        'created_at' => now(),

                        'updated_at' => now(),
                    ];
                }
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Insert All Business Ideas
        |--------------------------------------------------------------------------
        */

        Business::insert($businesses);


        /*
        |--------------------------------------------------------------------------
        | Success Message
        |--------------------------------------------------------------------------
        */

        $this->command->info(
            count($businesses) .
            ' business ideas created successfully with images.'
        );
    }
}