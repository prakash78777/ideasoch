
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAiQuestionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| PUBLIC WEBSITE
|--------------------------------------------------------------------------
*/




Route::view('/privacy-policy', 'privacy-policy')
    ->name('privacy-policy');

    Route::view('/terms-and-conditions', 'terms-conditions')
    ->name('terms.conditions');



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/find-business', [HomeController::class, 'findBusiness'])
    ->name('find.business');

Route::get('/businesses', [HomeController::class, 'businesses'])
    ->name('businesses');

Route::get('/business/{business}', [HomeController::class, 'show'])
    ->name('business.show');

Route::get('/categories', [CategoriesController::class, 'index'])
    ->name('categories');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/reviews', [ReviewController::class, 'index'])
    ->name('reviews.index');

Route::post('/reviews', [ReviewController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('reviews.store');

Route::get('/ai-chat', [AIController::class, 'index'])
    ->name('ai.chat');

Route::post('/ai-chat/message', [AIController::class, 'chat'])
    ->name('ai.chat.message');

Route::get('/compare', [CompareController::class, 'index'])
    ->name('compare');

Route::get('/calculator', [CalculatorController::class, 'index'])
    ->name('calculator');

Route::post('/calculator/calculate', [CalculatorController::class, 'calculate'])
    ->name('calculator.calculate');

/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

Route::get('/Contact', function () {
    return view('Contact');
})->name('contact');

Route::post('/contact-submit', [ContactController::class, 'submit'])
    ->name('contact.submit');

/*
|--------------------------------------------------------------------------
| ADMIN LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->middleware('throttle:5,1')
    ->name('admin.login.submit');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');

/*
|--------------------------------------------------------------------------
| USER AUTHENTICATION
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showAuth'])
    ->name('login');

Route::get('/register', [AuthController::class, 'showAuth'])
    ->name('register');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');


    Route::get('/login-to-save', function (\Illuminate\Http\Request $request) {
    session(['url.intended' => url('/businesses')]);

    return redirect()->route('login');
})->name('login.to.save');

/*
|--------------------------------------------------------------------------
| GOOGLE LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])
    ->name('google.redirect');

Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])
    ->name('google.callback');

/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/my-ideas', function () {
        $savedIdeas = \App\Models\SavedIdea::with('business')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('my-ideas', compact('savedIdeas'));
    })->name('my.ideas');

    Route::post('/saved-ideas/{business}', [
        AdminController::class,
        'saveIdea',
    ])->name('saved-ideas.store');

    Route::delete('/saved-ideas/{business}', [
        AdminController::class,
        'removeSavedIdea',
    ])->name('saved-ideas.remove');

    Route::get('/profile', [AuthController::class, 'profile'])
        ->name('profile');

    Route::put('/profile', [AuthController::class, 'updateProfile'])
        ->name('profile.update');

    Route::get('/settings', [AuthController::class, 'settings'])
        ->name('settings');

    Route::put('/settings/password', [AuthController::class, 'updatePassword'])
        ->name('settings.password');
});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->middleware(['auth', AdminMiddleware::class])
    ->group(function () {

        // Dashboard
        Route::get('/', [AdminController::class, 'dashboard'])
            ->name('admin.dashboard');

        // Business ideas
        Route::get('/businesses', [AdminController::class, 'businesses'])
            ->name('admin.businesses');

        Route::get('/businesses/create', [AdminController::class, 'createBusiness'])
            ->name('admin.businesses.create');

        Route::post('/businesses', [AdminController::class, 'storeBusiness'])
            ->name('admin.businesses.store');

        Route::get('/businesses/{business}/edit', [AdminController::class, 'editBusiness'])
            ->name('admin.businesses.edit');

        Route::put('/businesses/{business}', [AdminController::class, 'updateBusiness'])
            ->name('admin.businesses.update');

        Route::patch('/businesses/{business}/toggle', [AdminController::class, 'toggleBusiness'])
            ->name('admin.businesses.toggle');

        Route::delete('/businesses/{business}', [AdminController::class, 'deleteBusiness'])
            ->name('admin.businesses.delete');

        // Categories
        Route::get('/categories', [AdminController::class, 'categories'])
            ->name('admin.categories');

        Route::get('/categories/create', [AdminController::class, 'createCategory'])
            ->name('admin.categories.create');

        Route::post('/categories', [AdminController::class, 'storeCategory'])
            ->name('admin.categories.store');

        Route::get('/categories/{category}/edit', [AdminController::class, 'editCategory'])
            ->name('admin.categories.edit');

        Route::put('/categories/{category}', [AdminController::class, 'updateCategory'])
            ->name('admin.categories.update');

        Route::patch('/categories/{category}/toggle', [AdminController::class, 'toggleCategory'])
            ->name('admin.categories.toggle');

        Route::delete('/categories/{category}', [AdminController::class, 'deleteCategory'])
            ->name('admin.categories.delete');

        // Locations and budgets
        Route::get('/locations', [AdminController::class, 'locations'])
            ->name('admin.locations');

        Route::get('/budgets', [AdminController::class, 'budgets'])
            ->name('admin.budgets');

        // Users
        Route::get('/users', [AdminController::class, 'users'])
            ->name('admin.users');

        // Saved ideas
        Route::get('/saved-ideas', [AdminController::class, 'savedIdeas'])
            ->name('admin.saved-ideas');

        Route::delete('/saved-ideas/{savedIdea}', [
            AdminController::class,
            'destroySavedIdea',
        ])->name('admin.saved-ideas.destroy');

        // Contact leads
        Route::get('/leads', [AdminController::class, 'leads'])
            ->name('admin.leads');

        Route::delete('/leads/{lead}', [AdminController::class, 'deleteLead'])
            ->name('admin.leads.delete');

        // AI questions
        Route::get('/ai-questions', [AdminAiQuestionController::class, 'index'])
            ->name('admin.ai.questions');

        Route::get('/ai-questions/create', [AdminAiQuestionController::class, 'create'])
            ->name('admin.ai.questions.create');

        Route::post('/ai-questions', [AdminAiQuestionController::class, 'store'])
            ->name('admin.ai.questions.store');

        Route::get('/ai-questions/{aiQuestion}/edit', [AdminAiQuestionController::class, 'edit'])
            ->name('admin.ai.questions.edit');

        Route::put('/ai-questions/{aiQuestion}', [AdminAiQuestionController::class, 'update'])
            ->name('admin.ai.questions.update');

        Route::patch('/ai-questions/{aiQuestion}/toggle', [AdminAiQuestionController::class, 'toggle'])
            ->name('admin.ai.questions.toggle');

        Route::delete('/ai-questions/{aiQuestion}', [AdminAiQuestionController::class, 'destroy'])
            ->name('admin.ai.questions.destroy');

        // Review moderation — admin only
        Route::get('/reviews', [AdminReviewController::class, 'index'])
            ->name('admin.reviews.index');

        Route::patch('/reviews/{review}/approve', [AdminReviewController::class, 'approve'])
            ->name('admin.reviews.approve');

        Route::patch('/reviews/{review}/reject', [AdminReviewController::class, 'reject'])
            ->name('admin.reviews.reject');

        Route::delete('/reviews/{review}', [AdminReviewController::class, 'destroy'])
            ->name('admin.reviews.destroy');
    });
