<?php

use Illuminate\Support\Facades\Route;

// =======================
// CLIENT LIVEWIRE
// =======================
use App\Livewire\Client\{
    HomeComponent,
    ClubComponent,
    TeamComponent,
    MediaComponent,
    ContactComponent,
    TicketPurchaseComponent,
    MatchComponent,
    NewsDetailComponent
};

// =======================
// ADMIN LIVEWIRE
// =======================
use App\Livewire\Admin\{
    DashboardComponent,
    ManajemenTimComponent,
    PengaturanComponent,
};

use App\Livewire\Admin\Tickets\{
    TicketIndexComponent,
    TicketCreateComponent,
    TicketEditComponent
};

use App\Livewire\Admin\News\Index as AdminNewsIndex;
use App\Livewire\Admin\News\Create as AdminNewsCreate;
use App\Livewire\Admin\News\Edit as AdminNewsEdit;

use App\Livewire\Client\Gallery\Index as ClientGalleryIndex;
use App\Livewire\Client\Gallery\Show as ClientGalleryShow;

use App\Livewire\Admin\Galleries\GalleryIndex as AdminGalleryIndex;
use App\Livewire\Admin\Galleries\GalleryCreate;
use App\Livewire\Admin\Galleries\GalleryEdit;

use App\Livewire\Admin\Videos\VideoSyncComponent;
// =======================
// AUTH
// =======================
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleMiddleware;

use App\Livewire\Admin\Matches\Index as AdminMatchIndex;
use App\Livewire\Admin\Matches\Create as AdminMatchCreate;
use App\Livewire\Admin\Matches\Edit as AdminMatchEdit;

use App\Livewire\Admin\Clubs\Index;
use App\Livewire\Admin\Clubs\Create;

use App\Livewire\Client\LiveMatch;
use App\Livewire\Admin\Matches\LiveControl;
use App\Models\MatchGame;


/*
|--------------------------------------------------------------------------
| PUBLIC CLIENT ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', HomeComponent::class)->name('home');
Route::get('/club', ClubComponent::class)->name('club');
Route::get('/team', TeamComponent::class)->name('team');
Route::get('/media', MediaComponent::class)->name('media');
Route::get('/contact', ContactComponent::class)->name('contact');
Route::get('/media/news/{news:slug}', NewsDetailComponent::class)->name('media.news.detail');
Route::get('/media/news/{news:slug}', NewsDetailComponent::class)
    ->name('media.news.detail');

/* ✅ CLIENT GALLERY */
Route::get('/gallery', ClientGalleryIndex::class)
    ->name('galleries.index');

Route::get('/gallery/{gallery:slug}', ClientGalleryShow::class)
    ->name('galleries.show');

Route::get('/pertandingan', MatchComponent::class)
    ->name('matches');


/*
|--------------------------------------------------------------------------
| USER ROUTES (AUTH + USER ROLE)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', RoleMiddleware::class . ':user'])
    ->group(function () {
        // List / landing tiket (opsional kalau ada)
        Route::get('/tickets', TicketPurchaseComponent::class)
            ->name('tickets.purchase');

        // Detail & beli tiket (INI YANG DIPAKAI HERO)
        Route::get('/tickets/{ticket}', TicketPurchaseComponent::class)
            ->name('tickets.detail');
    });


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (AUTH + ADMIN ROLE)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth', RoleMiddleware::class . ':admin'])
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', DashboardComponent::class)->name('dashboard');
        Route::get('/team', ManajemenTimComponent::class)->name('team');
        Route::get('/settings', PengaturanComponent::class)->name('settings');

        // TICKET MANAGEMENT (SATU-SATUNYA MATCH SOURCE)
        Route::get('/tickets', TicketIndexComponent::class)->name('tickets.index');
        Route::get('/tickets/create', TicketCreateComponent::class)->name('tickets.create');
        Route::get('/tickets/{ticket}/edit', TicketEditComponent::class)->name('tickets.edit');

        // 🔥 ADMIN NEWS (INI WAJIB ADA)
        Route::get('/news', AdminNewsIndex::class)->name('news.index');
        Route::get('/news/create', AdminNewsCreate::class)->name('news.create');
        Route::get('/news/{news}/edit', AdminNewsEdit::class)->name('news.edit');

        Route::get('/videos/sync', VideoSyncComponent::class)
            ->name('videos.sync');

        Route::get('/galleries', AdminGalleryIndex::class)->name('gallery.index');
        Route::get('/galleries/create', GalleryCreate::class)->name('gallery.create');
        Route::get('/galleries/{id}/edit', GalleryEdit::class)->name('gallery.edit');
        Route::prefix('matches')->name('matches.')->group(function () {
            Route::get('/', AdminMatchIndex::class)->name('index');
            Route::get('/create', AdminMatchCreate::class)->name('create');
            Route::get('/{match}/edit', AdminMatchEdit::class)->name('edit');
        });

        Route::get('/clubs', Index::class)->name('clubs.index');
        Route::get('/clubs/create', Create::class)->name('clubs.create');

        Route::get('/pertandingan/live', LiveMatch::class);
        Route::get('/matches/{matchId}/live', LiveControl::class)
            ->name('matches.live');

        Route::get('/matches/live', function () {
            $match = MatchGame::where('status', 'live')->first();

            if (!$match) {
                return redirect()->route('admin.matches.index')
                    ->with('error', 'Tidak ada pertandingan yang sedang live');
            }

            return redirect()->route('admin.matches.live', $match->id);
        })->name('matches.live.active');

        Route::get('/pertandingan/live', LiveMatch::class)->name('client.live');
        Route::get('/pertandingan', MatchComponent::class)->name('matches');
        Route::get('/pertandingan', MatchComponent::class)
            ->name('matches.page');



    });


/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', fn() => view('auth.login'))->name('login.page');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', fn() => view('auth.register'))->name('register.page');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
