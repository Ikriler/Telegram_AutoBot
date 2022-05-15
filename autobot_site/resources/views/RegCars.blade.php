<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <form action="{{ route('logout') }}" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button type="submit">Выйти</button>
    </form>

    <form action="{{ route('index') }}" method="GET">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <button type="submit">Назад</button>
    </form>

    <table id="grid"></table>
    <script type="text/javascript">
    var grid;


    var grid, dialog, dialogCreate;
        function Edit(e) {
            $('#id_reg_car').val(e.data.record.id_reg_car);
            $('#num_car').val(e.data.record.num_car);
            $('#model').val(e.data.record.model);
            $('#add_info').val(e.data.record.add_info);
            $('#comment').val(e.data.record.comment);
            $('#owner').val(e.data.record.owner);
            dialog.open('Изменение данных о машине');
        }
        function Save() {
            var record = {
                id_reg_car: $('#id_reg_car').val(),
                num_car: $('#num_car').val(),
                model: $('#model').val(),
                add_info: $('#add_info').val(),
                comment: $('#comment').val(),
                owner: $('#owner').val()
            };
            $.ajax({ url: '/reg_cars/update', data: record , method: 'POST' })
                .done(function () {
                    dialog.close();
                    grid.reload();
                })
                .fail(function () {
                    alert('Failed to save.');
                    dialog.close();
                });
        }
    function Dob(e) {
            $.ajaxSetup({
                headers : {
                    'X-CSRF-Token' : "{{ csrf_token() }}"
                }
                
            });
            if (confirm('Вы уверены?')) {
                var record = {
                    num_car: e.data.record.num_car,
                    model: e.data.record.model,
                    add_info: e.data.record.add_info,
                    dateTime_order: e.data.record.dateTime_order,
                    comment: e.data.record.comment,
                    id_reg_car: e.data.record.id_reg_car,
                    id_user: e.data.record.id_user,
                    approved: 1

                };
                $.ajax({ url: '/reg_cars/update', data: record, method: 'POST' })  
                .done(function () {
                    alert('Nice.');
                    grid.reload();
                })
                .fail(function () {
                    alert('Ошибка сохранения.');
                });
            }
        }

        
        function Del(e) {
            $.ajaxSetup({
                headers : {
                    'X-CSRF-Token' : "{{ csrf_token() }}"
                }
            });
            if (confirm('Вы уверены?')) {
                var record = {
                    num_car: e.data.record.num_car,
                    model: e.data.record.model,
                    add_info: e.data.record.add_info,
                    dateTime_order: e.data.record.dateTime_order,
                    comment: e.data.record.comment,
                    id_reg_car: e.data.record.id_reg_car,
                    id_user: e.data.record.id_user,
                    approved: 2
                };
                $.ajax({ url: '/reg_cars/update', data: record, method: 'POST' })  
                .done(function () {
                    alert('Nice.');
                    grid.reload();
                })
                .fail(function () {
                    alert('Ошибка сохранения.');
                });
            }
        }
        $(document).ready(function () {
            grid = $('#grid').grid({
                dataSource: '/reg_cars/',
                columns: [

                    { field: 'model', title: 'Марка', sortable: true},
                    { field: 'num_car', title: 'Номер машины'},
                    { field: 'dateTime_order', title: 'Дата'},
                    { field: 'add_info', title: 'Инфо'},
                    { field: 'comment', title: 'Коментарий'},
                    { field: 'id_reg_car', title: 'id машины', hidden: true},
                    { field: 'id_user', title: 'id пользователя', hidden: true},
                    { field: 'approved', title: 'Действия'},
                    { width: 124, tmpl: '<button>Одобрить</button>', align: 'center', events: { 'click': Dob } },
                    { width: 124, tmpl: '<button>Изменить</button>',  align: 'center', events: { 'click': Edit } },
                    { width: 124, tmpl: '<button>Отклонить</button>', align: 'center', events: { 'click': Del } }
                ],
                pager: { limit: 5 }
            });
            dialog = $('#dialog').dialog({
                uiLibrary: 'bootstrap',
                autoOpen: false,
                resizable: false,
                modal: true
            });
            $('#btnSave').on('click', Save);
            $('#btnCancel').on('click', function () {
                dialog.close();
            });
        });
    </script>


<div id="dialog" style="display: none">
        <form>
            <div>
                <label for="id_reg_car">ID машины</label>
                <input type="text" class="form-control" id="id_reg_car" name="id_reg_car" value="">
            </div>
            <div>
                <label for="num_car">Номер машины</label>
                <input type="text" class="form-control" id="num_car" name="num_car" value="">
            </div>
            <div>
                <label for="model">Марка машины</label>
                <input type="text" class="form-control" id="model" name="model"  value="">
            </div>
            <div>
                <label for="add_info">Инфо</label>
                <input type="text" class="form-control" id="add_info" name="add_info"  value="">
            </div>
            <div class="form-group">
                <label for="comment">Комент</label>
                <input type="text" class="form-control" id="comment" name="comment"  value="">
            </div>
            <div class="form-group">
                <label for="owner">Личная/Гостевая</label>
                <input type="text" class="form-control" id="owner" name="owner"  value="">
            </div>
            <button type="button" id="btnSave" class="btn btn-default">Save</button>
            <button type="button" id="btnCancel" class="btn btn-default">Cancel</button>
        </form>
    </div>



</body>
</html>
