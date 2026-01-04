<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\{
    AboutController,
    AnalyticController,
    ArticleController,
    BannerController,
    BlogController,
    CategoryCollectionController,
    CategoryController,
    HomeController,
    ProfileController,
    DashboardController,
    LookbookController,
    StoryController,
    CollectionController,
    EventController,
    FaqController,
    SocialAuthController,
    PartnershipController,
    FeaturedDesignController,
    FeedbackController,
    HomeCollectionController,
    HomeContactController,
    HomeEventController,
    HomeFaqController,
    HomeLookbookController,
    HomeStoryController,
    HomeTestimoniController,
    HomeVoteController,
    MartController,
    LanguageController,
    PrivacyController,
    SupportController,
    TermsController,
    TestimoniController,
    TutorialController,
    VoteController,
};

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [
        // 'mobile.only',
        'localeSessionRedirect',
        'localizationRedirect'
    ]
], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');


    Route::get('google', [SocialAuthController::class, 'redirectToGoogle'])->name('google');
    Route::get('google/callback', [SocialAuthController::class, 'handleGoogleCallback'])->name('google.callback');

    Route::get('facebook', [SocialAuthController::class, 'redirectToFacebook'])->name('facebook');
    Route::get('facebook/callback', [SocialAuthController::class, 'handleFacebookCallback'])->name('facebook.callback');

    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

    Route::get('/stories', [HomeStoryController::class, 'index'])->name('stories.index');
    Route::get('/stories/{id}', [HomeStoryController::class, 'show'])->name('stories.show');

    Route::get('/collections', [HomeCollectionController::class, 'index'])->name('collections.index');
    Route::get('/lookbooks', [HomeLookbookController::class, 'index'])->name('lookbooks.index');
    Route::get('/events', [HomeEventController::class, 'index'])->name('events.index');
    Route::get('/testimonis', [HomeTestimoniController::class, 'index'])->name('testimonis.index');
    Route::get('/faqs', [HomeFaqController::class, 'index'])->name('faqs.index');
    Route::get('/contacts', [HomeContactController::class, 'index'])->name('contacts.index');

    Route::get('/marts', [MartController::class, 'shop'])->name('marts.index');
    Route::get('/marts/{mart}', [MartController::class, 'show'])->name('marts.show');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::get('/voting', [HomeVoteController::class, 'index'])->name('voting.index');
        Route::get('/voting/{vote}', [HomeVoteController::class, 'show'])->name('voting.show');
        Route::post('/voting/{vote}', [HomeVoteController::class, 'voteUser'])->name('voting.user');

        Route::resource('dashboard', DashboardController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('analytic', AnalyticController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('banner', BannerController::class)->only(['index', 'update']);
        Route::resource('feedback', FeedbackController::class)->only(['index', 'store', 'destroy']);

        Route::resource('collection', CollectionController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('category-collection', CategoryCollectionController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('lookbook', LookbookController::class)->only(['index', 'create', 'store', 'destroy']);
        Route::resource('story', StoryController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('article', ArticleController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('event', EventController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('featured-design', FeaturedDesignController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('mart', MartController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('vote', VoteController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::post('/vote/{vote}/close', [VoteController::class, 'closeVote'])->name('vote.close');
        Route::put('/lookbook/{lookbook}/update-cover', [LookbookController::class, 'updateCover'])->name('lookbook.updateCover');
        Route::post('lookbook/generate-quarterly', [LookbookController::class, 'generateQuarterlyLookbooks'])
            ->name('lookbook.generateQuarterly');

        Route::resource('faq', FaqController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('partnership', PartnershipController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('testimoni', TestimoniController::class)->only(['index', 'store']);
        Route::resource('tutorial', TutorialController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::patch('/testimoni/{id}/toggle', [TestimoniController::class, 'toggle'])->name('testimoni.toggle');

        Route::resource('support', SupportController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('privacy', PrivacyController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('terms', TermsController::class)->only(['index', 'create', 'store', 'update', 'destroy']);
        Route::resource('about', AboutController::class)->only(['index', 'create', 'store', 'update', 'destroy']);

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/language', [LanguageController::class, 'index'])->name('language.index');
    });


    require __DIR__ . '/auth.php';
});
