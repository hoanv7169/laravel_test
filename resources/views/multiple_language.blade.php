<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>
<body>

<div class="container text-center">
    <h4>{{ __('choose language') }}</h4>

    <br>
    <a href="{{ route('lang', ['vi']) }}" class="btn btn-danger">VI</a>

    <a href="{{ route('lang', ['en']) }}" class="btn btn-success">EN</a>

    <hr>

    <h3>{{ __('Welcome to Website!') }}</h3>
    <br>

    <h3>
        {{ __("Your name: $username") }}
        {{ __(
        '`:username`, Age `:age`',
        ['username' => $username, 'age' => $age]
    ) }}
    </h3>
</div>

</body>
</html>
