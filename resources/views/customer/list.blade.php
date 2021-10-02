<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-5">
        <h1>Danh sách khách hàng</h1>

        <br>
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <td><b>Họ và đệm</b></td>
                <td><b>Tên</b></td>
                <td class="text-end"><b>Thao tác</b></td>
            </tr>
            </thead>
            <tbody>
            @if ($customers)
                @foreach ($customers as $key => $customer)
                    <tr id="row-{{ $key }}">
                        <td>
                            <span class="input-info" id="first_name_info">{{ $customer->first_name }}</span>
                            <input type="hidden" value="{{ $customer->id }}" id="customer_id" class="form-control">
                            <input type="text" value="{{ $customer->first_name }}" id="first_name" class="input-edit form-control" style="display: none">
                        </td>
                        <td>
                            <span class="input-info" id="last_name_info">{{ $customer->last_name }}</span>
                            <input type="text" value="{{ $customer->last_name }}" id="last_name" class="input-edit form-control" style="display: none">
                        </td>

                        <td class="text-end">
                            <a href="javascript:;" class="btn-edit" data-index="{{ $key }}"><i class="fa fa-2x fa-edit"></i></a>
                            <a href="javascript:;" class="btn-update" data-id="{{ $customer->id }}" data-index="{{ $key }}" style="display: none"><i class="fa fa-2x fa-save"></i></a>
                        </td>
                    </tr>

                    @php($key++)
                @endforeach
            @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end">
                        <a href="javascript:;" class="btn-add"><i class="fa fa-2x fa-plus-circle"></i></a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

<script>
    action();

    var index = '{{ $key }}';

    $('.btn-add').click(function (){
        var html = `<tr id='row-${index}'>
            <td>
                <span class="input-info" id="first_name_info"></span>
                <input type="hidden" value="" id="customer_id" class="form-control">
                <input type="text" value="" id="first_name" class="input-edit form-control">
            </td>
            <td>
                <span class="input-info" id="last_name_info"></span>
                <input type="text" value="" id="last_name" class="input-edit form-control">
            </td>
            <td class="text-end">
                <a href="javascript:;" class="btn-edit" data-index="${ index }" style="display: none"><i class="fa fa-2x fa-edit"></i></a>
                <a href="javascript:;" class="btn-update" data-index="${ index }" style="display: none"><i class="fa fa-2x fa-save"></i></a>
                <a href="javascript:;" class="btn-create" data-index='${ index }'><i class="fa fa-2x fa-save"></i></a>
            </td>
        </tr>`

        $('tbody').append(html)

        index++;
        action();
    });

    function action() {
        $('.btn-edit').click(function () {
            var index = $(this).data('index');

            $(this).hide();
            $(this).siblings('.btn-update').show();
            $(this).parents('#row-'+index).find('.input-info').hide();
            $(this).parents('#row-'+index).find('.input-edit').show();
        });

        $('.btn-update').click(function () {
            var index = $(this).data('index');

            $(this).hide();
            $(this).siblings('.btn-edit').show();
            $('#row-'+index).find('.input-info').show();
            $('#row-'+index).find('.input-edit').hide();

            var id = $('#row-'+index).find('#customer_id').val();
            var first_name = $('#row-'+index).find('#first_name').val();
            var last_name = $('#row-'+index).find('#last_name').val();

            $.ajax({
                url: '{{ route('customers.update') }}',
                type: 'put',
                dataType: 'json',
                data: {
                    "_token": '{{ csrf_token() }}',
                    id: id,
                    first_name: first_name,
                    last_name: last_name,
                },
                success: function (json) {
                    if (json == 500) {
                        alert('that bai')
                        return;
                    }

                    $('#row-'+index).find('#first_name_info').text(first_name);
                    $('#row-'+index).find('#last_name_info').text(last_name);

                    alert('thanh cong')
                },
                error: function () {
                    alert('that bai')
                }
            })
        });

        $('.btn-create').click(function () {
            var index = $(this).data('index');
            $(this).hide();
            $(this).siblings('.btn-edit').show();
            $('#row-'+index).find('.input-info').show();
            $('#row-'+index).find('.input-edit').hide();

            var first_name = $('#row-'+index).find('#first_name').val();
            var last_name = $('#row-'+index).find('#last_name').val();

            $.ajax({
                url: '{{ route('customers.store') }}',
                type: 'post',
                dataType: 'json',
                data: {
                    "_token": '{{ csrf_token() }}',
                    first_name: first_name,
                    last_name: last_name,
                },
                success: function (json) {
                    if (json.status == 500) {
                        alert('that bai')
                        return;
                    }

                    $('#row-'+index).find('#first_name_info').text(first_name);
                    $('#row-'+index).find('#last_name_info').text(last_name);
                    $('#row-'+index).find('#customer_id').val(json.customer_id);

                    alert('thanh cong')
                },
                error: function () {
                    alert('that bai')
                }
            })
        });
    }
</script>
