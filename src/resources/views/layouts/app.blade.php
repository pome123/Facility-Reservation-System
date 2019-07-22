<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charaset="uft-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laravel Quickstart - Basic</title>

        <!-- CSSとJavaScript -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <style>
            .top_text {
                text-align: center;
                margin: 70px 0 100px 0;
            }

            .add_facility_form {
                margin: 0 0 50px 0;
            }
        </style>
    </head>

    <body>
        <div>
            <h1 class="top_text">教室予約システム</h1>
            {{-- <nav>
                <!-- ナビバーの内容 -->
            </nav> --}}
        </div>

        @yield('content')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>
