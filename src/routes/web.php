<?php
// Facility.phpで定義したクラスを参照
use App\Facility;
// Illuminateにあるものを参照
use Illuminate\Http\Request;
use App\Reservation;



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
    $facilities = Facility::orderBy('created_at', 'asc')->get();
    // facilities.blade.phpに$facilitiesを渡して処理をし(facilities.blade.php)、ブラウザに返す
    return view('facilities', [
        'facilities' => $facilities
    ]);
});

// データを登録する
Route::post('/reservations', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    // タスク作成
    $reservation = new Reservation();
    $reservation->name = $request->name;
    $reservation->save();

    return redirect('/');
});


// 削除ボタン
Route::delete('/reservation/{id}', function ($id) {
    Reservation::findOrFail($id)->delete();

    return redirect('/');
});

