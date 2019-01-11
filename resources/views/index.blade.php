<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OWM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-image: url(images/bg.jpg);
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 80vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .content {
            text-align: center;
        }

        .title {
            font-family: 'Times New Roman', Times, serif;
            color: #ffffff;
            font-size: 50px;
        }
        .white-box {
            width: 500px;
            height: 100px;
            margin-top: 50px;
            margin-left: auto;
            margin-right: auto;
            /*display: block;*/
            background: rgba(255,255,255,0.9);
            /*padding: 30px;*/
            box-shadow: 0 1px 2px rgba(0,0,0,0.15);
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        <p class="title">
            Pogoda na dzisiaj!!!
        </p>
            {{ Form::open(array('url' => '/', 'method' => 'post')) }}
                <div class="form-group">
                    {{ Form::text('city',null, ['class' => 'form-control','required'=>'required'])}}
                </div>
        <div class="form-group">
                {{ Form::submit('Get Weather',['class' => 'btn btn-success']) }}
        </div>
            {{ Form::close() }}
        <div>
            @if (isset($res))
                @include('partials.weather_item')
            @endif
        </div>

    </div>
</div>
</body>
</html>
