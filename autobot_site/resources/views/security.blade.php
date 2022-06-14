<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Охранник</title>
        <link rel="stylesheet" href="css/security.css">
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        <div class="maincontainer">
            <header id="header" class="header">
                <div class="container d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a href="/">
                            <img src="img/Autobot.png" alt="logo" width="50" height="50">
                        </a>
                    </div>
                    <p class="text1">«Автобот»</p>
                    <nav class="header-nav">
                        <a href="/RegCarsFilter">Отчёт заявок на въезд      |</a>
                        <a href="/">  Выход</a>
                    </nav>
                </div>
            </header>
            <div>
                <form class="form-inline">
                    <div class="form-group">
                        <!-- <input id="txtNumCar" type="text" placeholder="Номер машины" class="form-control" /> -->
                        <!-- <input id="txtSurname" type="text" placeholder="Surname" class="form-control" /> -->
                        <!-- <input id="txtPatronymic" type="text" placeholder="Patronymic" class="form-control" />
                        <input id="txtPhone_number" type="text" placeholder="Phone number" class="form-control" />
                        <input id="txtTelegram_id" type="text" placeholder="Telegram ID" class="form-control" />
                        <input id="txtApproved" type="text" placeholder="Approved" class="form-control" /> -->
                        <!-- <input id="txtdateTime" type="text" placeholder="Дата" class="form-control" /> -->
                        <!-- <input id="txtPassword" type="text" placeholder="Password" class="form-control" />
                        <input id="txtRole" type="text" placeholder="Role" class="form-control" /> -->
                        <!-- <button id="btnSearch" type="button" class="btn btn-default">Поиск</button>
                        <button id="btnClear" type="button" class="btn btn-default">Очистить</button> -->
                    </div>
                    <!-- <button type="button" id="btnCreateTestUsers" class="btn btn-default">+5 </button> -->
                </form>
            </div>
            <div class=formtable>
                <p class="text3">ЗАЯВКИ НА ВЪЕЗД</p>
                <div>
                <input id="txtNumCar" type="text" placeholder="Номер машины" class="form-control" />
                <input id="txtdateTime" type="text" placeholder="Дата" class="form-control" />
                <button id="btnSearch" type="button" class="btn btn-default">Поиск</button>
                <button id="btnClear" type="button" class="btn btn-default">Очистить</button>
            </div>
                <button id="btnAdd" type="button">Новая заявка</button>
                <input value = "+ * users" type="button" id="btnUpdateUsers" class="btn btn-default"/>
                <table id="grid2" class="table table-sortable"></table> 
            </div>
        </div>  
        <footer>
            © AVTOBOTS PRODUCTION 2022
        </footer>  

        <div id="dialogCreate" style="display: none">
            <form>
                <div>
                    <label for="id_reg_car">ID машины</label>
                    <input type="text" class="form-control" id="id_reg_car" name="id_reg_car" value="" disabled>
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
                    <label for="add_info">Адрес</label>
                    <input type="text" class="form-control" id="add_info" name="add_info"  value="">
                </div>
                <div class="form-group">
                    <label for="comment">Коментарий</label>
                    <input type="text" class="form-control" id="comment" name="comment"  value="">
                </div>
                <div class="form-group">
                <label for="ownerC">Принадлежность</label>
                    <select class="form-control"  id="ownerC" name="owner">
                        <option value="1">Личная</option>
                        <option value="2">Гостевая</option>
                    </select>
                </div>
                <button type="button" id="btnCreateUser" class="btn btn-default">Сохранить</button>
                <button type="button" id="btnCreateCancel" class="btn btn-default">Отменить</button>
            </form>  
        </div>



    <div id="dialog" style="display: none">
        <form>
            <div>
                <label for="id_reg_car">ID машины</label>
                <input type="text" class="form-control" id="id_reg_car" name="id_reg_car" value="" disabled>
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
                <label for="add_info">Адрес</label>
                <input type="text" class="form-control" id="add_info" name="add_info"  value="">
            </div>
            <div class="form-group">
                <label for="comment">Коментарий</label>
                <input type="text" class="form-control" id="comment" name="comment"  value="">
            </div>
            <div class="form-group">
            <label for="ownerC">Принадлежность</label>
                <select class="form-control"  id="ownerC" name="owner">
                    <option value="1">Личная</option>
                    <option value="2">Гостевая</option>
                </select>
            </div>
            <button type="button" id="btnSave" class="btn btn-default">Сохранить</button>
            <button type="button" id="btnCancel" class="btn btn-default">Отменить</button>
        </form>


        <script type="text/javascript">
        $.ajaxSetup({
                headers : {
                    'X-CSRF-Token' : "{{ csrf_token() }}"
                }
            });
            var grid, dialog, dialogCreate;
            function CreateNew(e) {
                var record = {
                num_car: $('#num_carC').val(),
                model: $('#modelC').val(),
                add_info: $('#add_infoC').val(),
                comment: $('#commentC').val(),
                approved: $('#approved').val(),
                id_user: $('#id_userC').val(),
                owner: $('#ownerC').val()                
            };
            $.ajax({ url: '/reg_cars/create', data: record , method: 'POST' })
                .done(function () {
                    dialogCreate.close();
                    alert('Заявка успешно создана');
                    grid.reload();
                })
                .fail(function () {
                    alert('Ошибка сохранения.');
                    dialogCreate.close();
                }
            );
        }
        var grid;
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
                        owner: e.data.record.owner,
                        approved: 1

                    };
                    $.ajax({ url: '/reg_cars/update', data: record, method: 'POST' })  
                    .done(function () {
                        alert('Выполнено.');
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
                        owner: e.data.record.owner,
                        approved: 2
                    };
                    $.ajax({ url: '/reg_cars/update', data: record, method: 'POST' })  
                    .done(function () {
                        alert('Выполнено.');
                        grid.reload();
                    })
                    .fail(function () {
                        alert('Ошибка в отклонении.');
                    });
                }
            }

            function Deleete(e) {
                $.ajaxSetup({
                    headers : {
                        'X-CSRF-Token' : "{{ csrf_token() }}"
                    }
                });
                if (confirm('Вы уверены?')) {
                

                    $.ajax({url: '/reg_cars/delete', data: { id_reg_car: e.data.record.id_reg_car }, method: 'POST' })
                        .done(function () {
                            alert('Удалено.');
                            grid.reload();
                        })
                        .fail(function () {
                            alert('Ошибка удаления.');
                        });
                }
            }


            var grid, dialog;
        function Chg(e) {
       
           $('#id_reg_car').val(e.data.record.id_reg_car);
            $('#num_car').val(e.data.record.num_car);
            $('#model').val(e.data.record.model);
            $('#add_info').val(e.data.record.add_info);
            $('#comment').val(e.data.record.comment);
            $('#ownerC').val(e.data.record.owner);
            dialog.open('Изменение данных о машине');
        }

            function Save() {
            var record = {
                id_reg_car: $('#id_reg_car').val(),
                num_car: $('#num_car').val(),
                model: $('#model').val(),
                add_info: $('#add_info').val(),
                comment: $('#comment').val(),
                owner: $('#ownerC').val()
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

            let timerId1 = setInterval(() => {

            var xhr1 = new XMLHttpRequest()
            xhr1.open('GET', 'reg_cars/getCount', true)
            xhr1.send()

            xhr1.onreadystatechange = function() {
                if (xhr1.readyState != 4) {
                    return
            }

            var UsersCount1 = JSON.parse(xhr1.responseText)   
            var newUsersCount1 = UsersCount1.count - grid.count(true)
            $('#btnUpdateUsers1').val("+ " + newUsersCount1)
            if (xhr1.status === 200) {
                    console.log('result', xhr1.responseText)
                } else {
                    console.log('err', xhr1.responseText)
                }
            }            
            }, 2000);

            $('#btnUpdateUsers1').on('click', function () {
                grid.reload();
            });

            let timerId = setInterval(() => {

            var xhr = new XMLHttpRequest()
            xhr.open('GET', 'reg_cars/getCount', true)
            xhr.send()

            xhr.onreadystatechange = function() {
                if (xhr.readyState != 4) {
                    return
            }

            var UsersCount = JSON.parse(xhr.responseText)   
            var newUsersCount = UsersCount.count - grid.count(true)
            $('#btnUpdateUsers').val("+" + newUsersCount)
            if (xhr.status === 200) {
                    console.log('result', xhr.responseText)
                } else {
                    console.log('err', xhr.responseText)
                }
            }            
            }, 2000);

            $('#btnUpdateUsers').on('click', function () {
                grid.reload();
            });

        $(document).ready(function () {
            grid = $('#grid2').grid({
                primaryKey: 'id', 
                dataSource: '/reg_cars/', 
                uiLibrary: 'bootstrap',
                columns: [
                    { field: 'dateTime_order', width: 120, title: 'Дата', sortable: true},
                    { field: 'num_car', title: 'Номер машины', sortable: true},
                    { field: 'model', width: 80, title: 'Марка', sortable: true},
                    { field: 'add_info', title: 'Адрес', sortable: true},
                    { field: 'id_reg_car', title: 'id машины', hidden: true},
                    { field: 'id_user', title: 'id пользователя', hidden: true},
                    { field: 'owner',
                    renderer: (value) => {
                        switch (value) {
                            case 1:
                                return "Личная";
                                break;
                            case 2:
                                return "Гостевая";
                                break;
                        }
                    },  title: 'Собственность', sortable: true },
                    { field: 'comment', title: 'Коментарий'},
                    { field: 'approved',
                    renderer: (value) => {
                        switch (value) {
                            case 0:
                                return "Ожидает";
                                break;
                            case 1:
                                return "Одобрено";
                                break;
                            case 2:
                                return "Отклонено";
                                break;
                        }
                    },  title: 'Одобрение', sortable: true },
                    { title: '', field: '', width: 35, type: 'icon', icon: 'glyphicon-plus', tooltip: 'Одобрить', events: { 'click': Dob} },
                    { title: '', field: '', width: 35, type: 'icon', icon: 'glyphicon-minus', tooltip: 'Отклонить', events: { 'click': Del } },
                    { title: '', field: '', width: 35, type: 'icon', icon: 'glyphicon-remove', tooltip: 'Удалить', events: { 'click': Deleete } },
                    { title: '', field: '', width: 35, type: 'icon', icon: 'glyphicon-pencil', tooltip: 'Изменить', events: { 'click': Chg} }
                  
                ],
                dataSource: '/reg_cars/',
                sort: true,
                pager: { limit: 5, sizes: [2, 5, 10, 20] }
            });
            dialog = $('#dialog').dialog({
                uiLibrary: 'bootstrap',
                autoOpen: false,
                resizable: false,
                modal: true
                
            });
            dialogCreate = $('#dialogCreate').dialog({
                uiLibrary: 'bootstrap',
                autoOpen: false,
                resizable: true,
                modal: true,
                width:'720'
            });
            $('#btnAdd').on('click', function () {
                $('#nameC').val('');
                $('#surnameC').val('');
                $('#patronymicC').val('');
                $('#phone_numberC').val('');
                $('#addressC').val('');
                $('#telegram_idC').val('');
                $('#approvedC').val('');
                $('#roleC').val('');
                $('#emailC').val('');
                $('#passwordC').val('');
                $('#role_idC').val('');
                dialogCreate.open('Новая заявка');
            });
            $('#btnSave').on('click', Save);
            $('#btnCancel').on('click', function () {
                dialog.close();
            });
            $('#btnSearch').on('click', function () {
                grid.reload({ page: 1, num_car: $('#txtNumCar').val(), dateTime_order: $('#txtdateTime').val()});
            });
            $('#btnCreateUser').on('click', CreateNew);
            $('#btnCreateCancel').on('click', function(){
                dialogCreate.close();
            });
            $('#btnClear').on('click', function () {
                $('#id_reg_car').val('');
                $('#num_car').val('');
                $('#model').val('');
                $('#add_info').val('');
                $('#dateTime_order').val('');
                $('#comment').val('');
                $('#approved').val('');
                $('#id_user').val('');
                $('#ownerC').val('');
                grid.reload({ id_reg_car: '', num_car: '', model: '', add_info: '', dateTime_order: '', comment: '', approved: '', id_user: '', owner: '' });
            });
        });
    </script>
    </body>
</html>