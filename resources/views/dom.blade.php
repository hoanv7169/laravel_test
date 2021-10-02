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

    <div class="container mt-3">
        <h1 class="text-center">DOM IN JQUERY</h1>
        <hr>

        <div id="content">Đây là nội dung trang web</div>

        <hr>
        <h3>I. Thay đổi nội dung trang web</h3>
        <br>
        <button class="btn btn-primary btn-replace">Thay đổi</button>

        <hr>
        <h3>II. Thêm phần tử vào nội dung trang web</h3>
        <br>
        <button class="btn btn-primary btn-append">Thêm</button>

        <hr>
        <h3>III. Xóa phần tử vào nội dung trang web</h3>
        <br>
        <button class="btn btn-primary btn-remove">Xóa</button>

        <hr>
        <h3>IV. Thay đổi style</h3>
        <br>
        <button class="btn btn-primary btn-style">Đổi màu</button>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        // Thay đổi nội dung

        $('.btn-replace').click(function () {
            var content = 'Nội dung trang web được thay đổi thành dòng text này';
            $("#content").text( content );
        });

        // Thêm phần tử vào nội dung trang web
        var index = 1;

        $('.btn-append').click(function () {
            var content = `<div class='sub-content' id='sub-content${index}'>Nội dung con ${index}</div>`;

            $("#content").append(content);

            index++;
        });

        // Xóa phần tử vào nội dung trang web
        $('.btn-remove').click(function () {
            $(".sub-content").remove();
        });

        // Thay đổi style

        $('.btn-style').click(function () {
            $("#content").css('background-color', 'pink');
            $("#sub-content1").css({ 'background-color': 'darkgreen', 'color': 'white'});
            $("#sub-content2").css('background-color', 'yellow');
            $("#sub-content3").css('background-color', 'cyan');
        });
    });
</script>
