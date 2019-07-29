@extends('layouts.app')

@section('content')

    <!-- Bootstrapの定形コード… -->

    <div class="panel-body add_facility_form">
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')

        <!-- 新施設フォーム -->
        {{-- <form action="/facilities" method="POST" class="form-horizontal"> --}}
            {{ csrf_field() }}

            <!-- 施設名 -->
            <div class="form-group">
                <label for="fasility" class="col-sm-3 control-label">施設名</label>

                <div class="col-sm-6">
                    <select type="facility" name="name" id="facility-name" class="form-control">
                        @foreach ($facilities as $facility)
                            <option>{{ $facility->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- 予約追加ボタン(Modal呼び出しボタン)-->
                <div class="form-group">
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#addReservationModal">
                            <i class="fa fa-plus"></i>
                        </button>

                        {{-- モーダル・ダイアログ  --}}
                        <div class="modal fade" id="addReservationModal" tabindex="-1">
                            <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                        <h4>予約内容</h4>
                                    </div>
                                    <div class="modal-body">
                                        {{-- TODO:FORM --}}
                                        <form action="/reservations" method="POST" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <h4 class="col-sm-3">日時</h4>
                                                <div class="form-inline col-sm-5">
                                                    <input type="date" name="date">
                                                </div>
                                                <div class="col-sm-4">
                                                    <select name="period" class="form-control">
                                                        <option>1限目</option>
                                                        <option>2限目</option>
                                                        <option>3限目</option>
                                                        <option>4限目</option>
                                                        <option>5限目</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div>
                                                <h4 class="">担当者</h4>
                                                <div>
                                                    <input type="text" class="form-control" name="reservation_user" size="10">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="reservation_button" type="submit" class="btn btn-default">予約する</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        {{-- </form> --}}
    </div>

    <!-- 予約一覧 -->
    <div class="col-sm-offset-3 col-sm-6">
        @if (count($facilities) > 0)
            <div class="panel panel-default panel-info">
                <div class="panel-heading">
                    予約一覧
                </div>
                <div>
                    <table class="table facility-table">

                        <!-- テーブルヘッダー -->
                        <thead>
                            <th>日にち</th>
                            <th>時間</th>
                            <th>施設名</th>
                            <th>名前</th>
                            <th></th>
                        </thead>

                        <!-- テーブルボディー -->
                        <tbody>
                            @foreach ($reservations as $reservation)
                                <tr>
                                    {{-- 日にち --}}
                                    <td class="table-text text-center">
                                        <div>{{ $reservation->date }}</div>
                                    </td>

                                     {{-- 時限目 --}}
                                     <td class="table-text text-center">
                                        <div>{{ $reservation->period }}</div>
                                    </td>

                                    {{-- 教室名 --}}
                                    <td class="table-text text-center">
                                        <div>{{ $facility->name }}</div>
                                    </td>

                                    {{-- 名前 --}}
                                    <td class="table-text text-center">
                                        <div>{{ $reservation->reservation_user }}</div>
                                    </td>

                                    {{-- 削除ボタン --}}
                                    <td>
                                        <form action="/reservation/{{ $reservation->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger center-block">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>


@endsection

