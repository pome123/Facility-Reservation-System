<?php
// Facility.phpで定義したクラスを参照
use App\Reservation;
// Illuminateにあるものを参照
use Illuminate\Http\Request;

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

Route::get('/', function () {
    // データベースから値（facilities table）を持ってくる処理を$facilitiesに代入
    $reservations = Reservation::orderBy('created_at', 'asc')->get();
    // reservations.blade.phpに$facilitiesを渡して処理をし(reservations.blade.php)、ブラウザに返す
    return view('reservations', [
        'reservations' => $reservations
    ]);
});

// データを登録する
Route::post('/facility', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    // タスク作成
    $facility = new Facility();
    $facility->name = $request->name;
    $facility->save();

    return redirect('/');
    });


    // 削除ボタン
    Route::delete('/facility/{id}', function ($id) {
        Facility::findOrFail($id)->delete();

        return redirect('/');
    });

