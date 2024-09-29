use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/hello', function () {
    return view('hello');
});

// Hava durumu rotası
Route::get('/weather', [WeatherController::class, 'show']);
