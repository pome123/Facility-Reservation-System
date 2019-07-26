@extends('layouts.app')

@section('content')

    <!-- Bootstrapの定形コード… -->

    <div class="panel-body add_facility_form">
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')

        <!-- 新施設フォーム -->
        <form action="/facilities" method="POST" class="form-horizontal">
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

                        {{-- モーダル・ダイアログ --}}
                        <div class="modal fade" id="addReservationModal" tabindex="-1">
                            <div class="modal-dialog">
                                 <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                                        <h4>予約内容</h4>
                                    </div>
                                    <div class="modal-body">
                                        {{-- TODO:FORM --}}
                                        <form action="/period" method="POST" class="form-horizontal">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <h4 class="col-sm-3">日時</h4>
                                                <div class="form-inline col-sm-5">
                                                    <input type="date" value="">
                                                </div>
                                                <div class="col-sm-4">
                                                    <select type="period" name="name" class="form-control">
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
                                                    <input type="text" class="form-control" name="month" size="10">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default">予約する</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
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
                            <th>日時</th>
                            <th>施設名</th>
                            <th>名前</th>
                            <th></th>
                        </thead>

                        <!-- テーブルボディー -->
                        <tbody>
                            {{-- @foreach ($facilities as $facility) --}}
                            @foreach ($reservations as $reservation)
                                <tr>
                                    <td>abc</td>
                                    <td>wer</td>
                                    <td>sdf</td>
                                    <td>xcv</td>
                                    {{-- 日にち
                                    <td class="table-text text-center">
                                        <div>{{ $reservation->date }}</div>
                                    </td>

                                     時限目
                                     <td class="table-text text-center">
                                        <div>{{ $reservation->period }}</div>
                                    </td>


                                    <td class="table-text text-center">
                                        <div>{{ $reservation->facility_id }}</div>
                                    </td>

                                    名前
                                    <td class="table-text text-center">
                                        <div>{{ $reservation->reservation_user }}</div>
                                    </td>

                                    <td>

                                        <form action="/facility/{{ $facility->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger center-block">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </button>
                                        </form>
                                    </td> --}}
                                </tr>
                            @endforeach
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>


@endsection

