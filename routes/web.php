<?php



use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\EmailTemplatesController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SentQuotesController;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/bubble/quote/{id}', [QuoteController::class, 'showQuotePage'])->name('quotes.page');
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    //quote Data
    Route::get('/bubble/show_quote_data', [QuoteController::class, 'showQuoteData'])->name('show.quotedata');
    Route::post('/bubble/all_quote_data', [QuoteController::class, 'allQuoteData'])->name('all.quote.data');
    Route::get('/bubble/get_single_quote_data/{id}', [QuoteController::class, 'getSingleQuoteData'])->name('get.single.quote.data');
    Route::post('/bubble/save_sent_quote', [SentQuotesController::class, 'saveSentquotes'])->name('save.sent.quote');

    Route::get('/bubble/get_quote_ref_data/{id}', [QuoteController::class, 'getQuoteRefData'])->name('get.quote.ref.data');
    Route::post('/bubble/send_quote_mail', [QuoteController::class, 'sendQuoteMail'])->name('send.quote.mail');

    //email tempaltes
    Route::get('/bubble/show_email_templates', [EmailTemplatesController::class, 'showEmailTemplates'])->name('email.templates');
    Route::get('/bubble/create_email_templates', [EmailTemplatesController::class, 'showCreateEmailForm'])->name('email.create.templates');
    Route::post('/bubble/show_templates', [EmailTemplatesController::class, 'showTemplates'])->name('email.show.templates');
    Route::post('/bubble/save_templates', [EmailTemplatesController::class, 'saveTemplates'])->name('email.save.templates');
    Route::get('/bubble/show_edit_templates', [EmailTemplatesController::class, 'showEditTemplates'])->name('show.edit.templates');

    Route::post('/bubble/update_email_templates', [EmailTemplatesController::class, 'updateTemplates'])->name('email.update.templates');

    //contact form
    Route::get('/bubble/show_contact_form_data', [ContactFormController::class, 'showContactData'])->name('contact.form.data');

    //game crud
    Route::get('/bubble/show_games_list', [GamesController::class, 'showGamesList'])->name('games.list');
    Route::get('/bubble/show_games_form', [GamesController::class, 'showGamesForm'])->name('games.add');
    Route::post('/bubble/save_games', [GamesController::class, 'saveGames'])->name('games.save');
    Route::post('/bubble/show_games_data', [GamesController::class, 'showGamesData'])->name('games.show.data');
    Route::get('/bubble/show_edit_games', [GamesController::class, 'showEditForm'])->name('show.edit.games');
    Route::post('/bubble/update_game', [GamesController::class, 'updateGame'])->name('game.update');
    Route::get('/bubble/delete', [GamesController::class, 'deleteGame'])->name('game.delete');

});
Route::get('/reset-app', function () {
    $exitCode = " ";
    $exitCode .= Artisan::call('clear-compiled') . "|";
    $exitCode .= Artisan::call('cache:clear') . "|";
    $exitCode .= Artisan::call('config:clear') . "|";
    $exitCode .= Artisan::call('optimize:clear') . "|";
    $exitCode .= Artisan::call('route:clear') . "|";
    $exitCode .= Artisan::call('view:clear') . "|";
    return $exitCode;
});
// Route::get('/reset-db', function () {
//     $exitCode = " ";
//     $exitCode .= Artisan::call('db:wipe') . "|";
//     $exitCode .= Artisan::call('migrate') . "|";
//     $exitCode .= Artisan::call('db:seed') . "|";
//     return $exitCode;
// });
// Route::get('/seed', function () {
//     $exitCode = "";
//     // Truncate the email_templates table
//     DB::table('email_templates')->truncate();
//     $exitCode .= Artisan::call('db:seed', ['--class' => 'templatesSeeder']) . "|";

//     return $exitCode;
// });

// Route::get('/mig', function () {
//     $exitCode = "";

//     $exitCode .= Artisan::call('migrate') . "|";

//     return $exitCode;
// });
// Route::get('/mig', function () {
//     $exitCode = "";

//     // Run a specific migration by passing its name as an argument
//     $exitCode .= Artisan::call('migrate', ['--path' => 'database/migrations/2024_02_20_074448_sent_quotes.php']) . "|";

//     return $exitCode;
// });
