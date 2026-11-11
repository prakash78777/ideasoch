<?php

namespace App\Http\Controllers;

use App\Models\AiQuestion;
use App\Models\Business;
use Illuminate\Http\Request;

class AIController extends Controller
{
    /**
     * Display AI Chat and active questions from Admin Panel.
     */
    public function index()
    {
        $aiQuestions = AiQuestion::where('status', true)
            ->latest()
            ->get(['id', 'question', 'category']);

        return view('ai-chat', compact('aiQuestions'));
    }

    /**
     * Find business ideas based on the user's message.
     */
    public function chat(Request $request)
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $message = trim($validated['message']);
        $text = mb_strtolower($message);

        $budgetMax = $this->detectBudget($text);
        $category = $this->detectCategory($text);

        $query = Business::where('status', true);

        if ($budgetMax !== null) {
            $query->where('investment_min', '<=', $budgetMax);
        }

        if ($category !== null) {
            $query->where('category', $category);
        }

        $businesses = $query
            ->orderBy('investment_min')
            ->limit(5)
            ->get();

        if ($businesses->isEmpty()) {
            $intro = 'आपके सवाल के अनुसार कोई exact business idea नहीं मिला। नीचे कुछ दूसरे Active business ideas देख सकते हैं:';

            $businesses = Business::where('status', true)
                ->when(
                    $budgetMax !== null,
                    fn ($q) => $q->where('investment_min', '<=', $budgetMax)
                )
                ->orderBy('investment_min')
                ->limit(5)
                ->get();
        } else {
            if ($budgetMax !== null && $category !== null) {
                $intro = 'आपके budget और category के अनुसार ये business ideas मिले हैं:';
            } elseif ($budgetMax !== null) {
                $intro = 'आपके budget के अनुसार ये business ideas मिले हैं:';
            } elseif ($category !== null) {
                $intro = 'आपकी category के अनुसार ये business ideas मिले हैं:';
            } else {
                $intro = 'IdeaSoch के Business Ideas database से आपके लिए कुछ ideas:';
            }
        }

        $ideas = $businesses->map(function ($business) {
            return [
                'id' => $business->id,
                'name' => $business->name,
                'category' => $business->category,
                'investment_min' => (int) $business->investment_min,
                'investment_max' => (int) $business->investment_max,
                'profit' => $business->profit,
                'url' => route('business.show', $business->id),
            ];
        })->values();

        return response()->json([
            'success' => true,
            'message' => $intro,
            'ideas' => $ideas,
            'total' => $ideas->count(),
        ]);
    }

    /**
     * Detect common budget formats in English and Hindi.
     */
    private function detectBudget(string $text): ?int
    {
        $patterns = [
            '/(?:₹\s*)?(\d+(?:\.\d+)?)\s*(?:lakh|lac|लाख)\b?/iu' => 100000,
        ];

        if (
            str_contains($text, '5 lakh') ||
            str_contains($text, '5 lac') ||
            str_contains($text, '500000') ||
            str_contains($text, 'पांच लाख') ||
            str_contains($text, 'पाँच लाख')
        ) {
            return 500000;
        }

        if (
            str_contains($text, '1 lakh') ||
            str_contains($text, '1 lac') ||
            str_contains($text, '100000') ||
            str_contains($text, 'एक लाख')
        ) {
            return 100000;
        }

        if (
            str_contains($text, '50k') ||
            str_contains($text, '50 k') ||
            str_contains($text, '50000') ||
            str_contains($text, 'पचास हजार')
        ) {
            return 50000;
        }

        if (
            str_contains($text, '25k') ||
            str_contains($text, '25 k') ||
            str_contains($text, '25000') ||
            str_contains($text, 'पच्चीस हजार')
        ) {
            return 25000;
        }

        if (
            str_contains($text, '10k') ||
            str_contains($text, '10 k') ||
            str_contains($text, '10000') ||
            str_contains($text, 'दस हजार')
        ) {
            return 10000;
        }

        if (
            str_contains($text, '5k') ||
            str_contains($text, '5 k') ||
            str_contains($text, '5000') ||
            str_contains($text, 'पांच हजार') ||
            str_contains($text, 'पाँच हजार')
        ) {
            return 5000;
        }

        return null;
    }

    /**
     * Detect a business category from the message.
     */
    private function detectCategory(string $text): ?string
    {
        $categoryMap = [
            'Food & Restaurant' => [
                'food', 'restaurant', 'cloud kitchen', 'tiffin',
                'खाना', 'रेस्टोरेंट', 'टिफिन',
            ],
            'Retail Business' => [
                'retail', 'shop', 'store', 'mobile accessories',
                'दुकान', 'मोबाइल',
            ],
            'Online Business' => [
                'online', 'e-commerce', 'ecommerce', 'ऑनलाइन',
            ],
            'Service Business' => [
                'service', 'services', 'repair', 'सर्विस',
            ],
            'Agriculture' => [
                'agriculture', 'farming', 'farm', 'खेती',
            ],
            'Manufacturing' => [
                'manufacturing', 'factory', 'फैक्ट्री',
            ],
            'Health & Wellness' => [
                'health', 'wellness', 'fitness', 'gym', 'स्वास्थ्य',
            ],
            'Real Estate' => [
                'real estate', 'property', 'प्रॉपर्टी',
            ],
            'Education' => [
                'education', 'school', 'teaching', 'tuition', 'शिक्षा',
            ],
            'Technology' => [
                'technology', 'tech', 'software', 'website', 'web development',
                'technology business', 'तकनीक',
            ],
            'Franchise' => [
                'franchise', 'फ्रेंचाइजी',
            ],
            'Home Business' => [
                'home business', 'from home', 'घर से',
            ],
            'Beauty & Salon' => [
                'beauty', 'salon', 'beauty parlour', 'beauty parlor',
                'ब्यूटी', 'सैलून',
            ],
        ];

        foreach ($categoryMap as $category => $keywords) {
            foreach ($keywords as $keyword) {
                if (str_contains($text, mb_strtolower($keyword))) {
                    return $category;
                }
            }
        }

        return null;
    }
}