@extends('layouts.app')

@section('content')

    <!-- Bootstrapの定形コード… -->

    <div class="panel-body add_facility_form">
        <!-- バリデーションエラーの表示 -->
        @include('common.errors')

        <!-- 新施設フォーム -->
        <form action="/facility" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- 施設名 -->
            <div class="form-group">
                <label for="fasility" class="col-sm-3 control-label">施設名</label>

                <div class="col-sm-6">
                    <select type="facility" name="name" id="facility-name" class="form-control">
                        <option>会議室</option>
                        <option>理科室</option>
                        <option>家庭科室</option>
                        <option>体育館</option>
                        <option>視聴覚室</option>
                    </select>
                </div>

                <!-- 予約追加ボタン -->
                <div class="form-group">
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-default">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- 予約一覧 -->
    @if (count($facilities) > 0)
    <div class="panel panel-default panel-info col-offset-sm-3">
        <div class="panel-heading">
            予約一覧
        </div>

        <div class="panel-body">
            <table class="table table-hover facility-table">

                <!-- テーブルヘッダー -->
                <thead>
                    <th>施設名</th>
                    <th>&nbsp;</th>
                </thead>

                <!-- テーブルボディー -->
                <tbody>
                    @foreach ($facilities as $facility)
                        <tr>
                            <!-- タスク名 -->
                            <td class="table-text">
                                <div>{{ $facility->name }}</div>
                            </td>

                            <td>
                                <!-- TODO: 削除ボタン -->
                                <form action="/facility/{{ $facility->id }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-default">
                                        削除
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
@endsection

