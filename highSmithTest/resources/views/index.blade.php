<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Тестовое задание HighSmith</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<style>
    .active {
        display: block !important;
    }

    #authors, #books {
        display: none;
    }
</style>


<div class="container" style="margin-top:50px">
    <a href="#" id="authors_btn" class="btn btn-success">Авторы</a>
    <a href="#" id="books_btn" class="btn btn-success">Книги</a>
</div>

<div class="container" id="content-area">
    <div id="authors" class="active">
        <table class="table">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Количество книг</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @if(isset($authors))
                    @foreach($authors as $a)
                        <tr>
                            <td>{{$a->firstname}}</td>
                            <td>{{$a->lastname}}</td>
                            <td>{{$a->middlename}}</td>
                            <td>{{count($a->books)}}</td>
                            <td><a href="#" data-id="{{$a->id}}" class="author_id" data-toggle="modal" data-target="#edit_author">Редактировать</a></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <button style="border-radius: 50%; width:50px; height: 50px; outline: none !important;" class="btn btn-info"
                data-toggle="modal" data-target="#create_author"><span class="glyphicon glyphicon-plus"></span>
        </button>

        <div class="modal fade" id="create_author" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Создание автора</h4>
                    </div>
                    <div class="modal-body">
                        <div class="logic-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Имя:</label>
                                    <input id="author_firstname" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Отчество:</label>
                                    <input id="author_middlename" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Фамилия:</label>
                                    <input id="author_lastname" type="text" class="form-control">
                                    </input>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                            <button type="button" id="create_author_btn" class="btn btn-success">Создать
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_author" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Изменение автора</h4>
                </div>
                <input type="hidden" class="author_id_area"/>
                <div class="modal-body">
                    <div class="logic-block">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Имя:</label>
                                <input id="author_firstname_edit" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Отчество:</label>
                                <input id="author_middlename_edit" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Фамилия:</label>
                                <input id="author_lastname_edit" type="text" class="form-control">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="button" id="edit_author_btn" class="btn btn-warning">Изменить
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_book" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Изменение книги</h4>
                </div>
                <input type="hidden" class="book_id_area"/>
                <div class="modal-body">
                    <div class="logic-block">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Наименование книги:</label>
                                <input id="book-name-edit" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Цена:</label>
                                <input id="book_price-edit" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Автор:</label>
                                <select id="book_author-edit" type="text" class="form-control">
                                    @if(isset($authors))
                                        @foreach($authors as $a)
                                            <option value="{{$a->id}}">{{$a->firstname." ".$a->middlename." ".$a->lastname}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="button" id="edit_book_btn" class="btn btn-warning">Изменить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="books">
        <table class="table">
            <thead>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Автор</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @if(isset($books))
                    @foreach($books as $b)
                        <tr>
                            <td>{{$b->name}}</td>
                            <td>{{$b->price}}</td>
                            <td data-id="{{$b->author->id}}">{{$b->author->firstname." ".$b->author->middlename." ".$b->author->lastname}}</td>
                            <td><a href="#" class="book_id" data-id="{{$b->id}}" data-toggle="modal" data-target="#edit_book">Редактировать</a></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

        <button style="border-radius: 50%; width:50px; height: 50px; outline: none !important;"
                class="btn btn-info"
                data-toggle="modal" data-target="#create_book"><span
                    class="glyphicon glyphicon-plus"></span>
        </button>

        <div class="modal fade" id="create_book" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Создание книги</h4>
                    </div>
                    <div class="modal-body">
                        <div class="logic-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Наименование книги:</label>
                                    <input id="book-name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Цена:</label>
                                    <input id="book_price" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>Автор:</label>
                                    <select id="book_author" type="text" class="form-control">
                                        @if(isset($authors))
                                            @foreach($authors as $a)
                                                <option value="{{$a->id}}">{{$a->firstname." ".$a->middlename." ".$a->lastname}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                            <button type="button" id="create_book_btn" class="btn btn-success">Создать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<script>
    $('#authors_btn, #books_btn').on('click', function (e) {
        e.preventDefault();
        $('.active').removeClass('active');
        if ($(this).attr('id') == "authors_btn") {
            $('#authors').addClass('active');
        }
        else if ($(this).attr('id') == "books_btn") {
            $('#books').addClass('active');
        }
    });

    $('#create_author_btn').on('click', function (e) {

        var firstname = $('#author_firstname').val();
        var middlename = $('#author_middlename').val();
        var lastname = $('#author_lastname').val();

        $.ajax({
            url: "/author/create",
            method: "post",
            data: {
                firstname: firstname,
                middlename: middlename,
                lastname: lastname,
                _token: "{{csrf_token()}}"
            },
            success: function (e) {
                $('#create_author .close').click();
                $('#create_author input').prop('value', '');
                var element = "<tr>" +
                        "<td>" + e.firstname + "</td>" +
                        "<td>" + e.lastname + "</td>" +
                        "<td>" + e.middlename + "</td>" +
                        "<td>0</td>" +
                        "<td><a href='#' data-id='"+ e.id+"' class='author_id' data-toggle='modal' data-target='#edit_author'>Редактировать</a></td>" +

                "</tr>";
                $('#authors table tbody tr:last').after(element);
                $('select#book_author').append('<option value="'+ e.id+'">'+ e.firstname + ' ' +e.middlename + ' ' + e.lastname +'</option>');
            }
        })
    });

    $('#create_book_btn').on('click', function (e) {

        var name = $('#book-name').val();
        var price = parseInt($('#book_price').val());
        var author = parseInt($('select#book_author option:selected').val());

        $.ajax({
            url: "/book/create",
            method: "post",
            data: {
                name: name,
                price: price,
                author: author,
                _token: "{{csrf_token()}}"
            },
            success: function (e) {
                $('#create_book .close').click();
                $('#create_book input').prop('value', '');
                $('#create_book select option:first-child').prop('selected', 'selected');
                var element = "<tr>" +
                        "<td>" + e.name + "</td>" +
                        "<td>" + e.price + "</td>" +
                        "<td>" + e.author.firstname + " " + e.author.middlename + " " + e.author.lastname + "</td>" +
                        '<td><a href="#" class="book_id" data-id="'+ e.id+'" data-toggle="modal" data-target="#edit_book">Редактировать</a></td>'+
                        "</tr>";
                $('#books table tbody tr:last').after(element);

                var count = parseInt($('.author_id[data-id='+ e.author.id+']').parents('tr').find('td:nth-child(4)').text()) + 1;
                $('.author_id[data-id='+ e.author.id+']').parents('tr').find('td:nth-child(4)').text(count);
            }
        })
    });

    $('body').on('click', '.author_id', function(e)
    {
        var firstname = $(this).parents('tr').find('td:nth-child(1)').html();
        var middlename = $(this).parents('tr').find('td:nth-child(3)').html();
        var lastname = $(this).parents('tr').find('td:nth-child(2)').html();
        var id = $(this).data('id');
        $('#author_firstname_edit').prop('value', firstname);
        $('#author_middlename_edit').prop('value', middlename);
        $('#author_lastname_edit').prop('value', lastname);
        $('.author_id_area').prop('value', id);
    });

    $('body').on('click', '.book_id', function(e)
    {
        var name = $(this).parents('tr').find('td:nth-child(1)').html();
        var price = $(this).parents('tr').find('td:nth-child(2)').html();
        var author_id = $(this).parents('tr').find('td:nth-child(3)').data('id');
        var id = $(this).data('id');
        $('#book-name-edit').prop('value', name);
        $('#book_price-edit').prop('value', price);
        $('#book_author-edit option[value='+author_id+']').prop('selected', 'selected');
        $('.book_id_area').prop('value', id);
    });

    $('#edit_author_btn').on('click', function()
    {
        var firstname =  $('#author_firstname_edit').val();
        var middlename =  $('#author_middlename_edit').val();
        var lastname =  $('#author_lastname_edit').val();
        var id =  $('.author_id_area').val();

        $.ajax({
            url:'/author/update',
            method: 'post',
            data: {id: id, firstname: firstname, middlename: middlename, lastname: lastname, _token: "{{csrf_token()}}"},
            success: function(e)
            {
                $('#edit_author .close').click();

                $('.author_id[data-id='+ e.id+']').parents('tr').find('td:nth-child(1)').text(e.firstname);
                $('.author_id[data-id='+ e.id+']').parents('tr').find('td:nth-child(2)').text(e.lastname);
                $('.author_id[data-id='+ e.id+']').parents('tr').find('td:nth-child(2)').text(e.middlename);
            }
        })
    });

    $('#edit_book_btn').on('click', function()
    {
        var firstname =  $('#author_firstname_edit').val();
        var middlename =  $('#author_middlename_edit').val();
        var lastname =  $('#author_lastname_edit').val();
        var id =  $('.author_id_area').val();

        var name = $('#book-name-edit').val();
        var price = parseInt($('#book_price-edit').val());
        var author_id = parseInt($('#book_author-edit option:selected').val());
        var id = $('.book_id_area').val();

        $.ajax({
            url:'/book/update',
            method: 'post',
            data: {id: id, name: name, price: price, author_id: author_id, _token: "{{csrf_token()}}"},
            success: function(e)
            {
                $('#edit_book .close').click();

                $('.book_id[data-id='+ e.id+']').parents('tr').find('td:nth-child(1)').text(e.name);
                $('.book_id[data-id='+ e.id+']').parents('tr').find('td:nth-child(2)').text(e.price);
                $('.book_id[data-id='+ e.id+']').parents('tr').find('td:nth-child(3)').text(e.author.firstname + ' ' + e.author.middlename + ' ' + e.author.lastname);
            }
        })
    });

</script>
</body>
</html>