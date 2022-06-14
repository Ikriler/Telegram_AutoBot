<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Редактирование пользователя</title>
    <meta charset="utf-8" />
    

    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/user_editing.css">
</head>

<body>
    <header id="header" class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="http://127.0.0.1:8000/">
                    <img src="img/Autobot.png" alt="logo" width="50" height="50">
                </a>
            </div>
            <p class="text1">«Автобот»</p>
            <nav class="header-nav">
                <a href="http://127.0.0.1:8000/">  Выход</a>
            </nav>
        </div>
    </header>
    <button type="submit" class="back">
        <a href="http://127.0.0.1:8000/admin"> 🠔 </a>
    </button>
    <div class="container-full">
        
        <div class="row">
            <div class="col-xs-8">
                <form class="form-inline">
                    <div class="form-group">
                        <input id="txtName" type="text" placeholder="Имя" class="form-control" />
                        <!-- <input id="txtSurname" type="text" placeholder="Surname" class="form-control" />
                        <input id="txtPatronymic" type="text" placeholder="Patronymic" class="form-control" />
                        <input id="txtPhone_number" type="text" placeholder="Phone number" class="form-control" />
                        <input id="txtTelegram_id" type="text" placeholder="Telegram ID" class="form-control" />
                        <input id="txtApproved" type="text" placeholder="Approved" class="form-control" /> -->
                        <input id="txtEmail" type="text" placeholder="Почта" class="form-control" />
                        <!-- <input id="txtPassword" type="text" placeholder="Password" class="form-control" />
                        <input id="txtRole" type="text" placeholder="Role" class="form-control" /> -->
                    </div>
                    <button id="btnSearch" type="button" class="btn btn-default">Поиск</button>
                    <button id="btnClear" type="button" class="btn btn-default">Очистить</button>
                    <!-- <button type="button" id="btnCreateTestUsers" class="btn btn-default">+5 пользователей</button> -->
                    <input value = "+ *" type="button" id="btnUpdateUsers" class="btn btn-default"/>
                </form>
            </div>
            <div class="col-xs-4">
                <button id="btnAdd" type="button" class="btn btn-default pull-right">Создать нового пользователя</button>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-xs-12">
                <table id="grid"></table>
            </div>
        </div>
    </div>
    <div id="dialogCreate" style="display: none">
        <form>
            <div class="form-group2">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="nameC">
            </div>
            <div class="form-group2">
                <label for="surname">Фамилия</label>
                <input type="text" class="form-control" id="surnameC">
            </div>
            <div class="form-group2">
                <label for="patronymic">Отчество</label>
                <input type="text" class="form-control" id="patronymicC">
            </div>
            <div class="form-group2">
                <label for="phone_number">Номер телефона</label>
                <input type="text" class="form-control" id="phone_numberC">
            </div>
            <div class="form-group2">
                <label for="address">Адрес</label>
                <input type="text" class="form-control" id="addressC">
            </div>
            <div class="form-group2">
                <label for="telegram_id">Телеграм</label>
                <input type="text" class="form-control" id="telegram_idC">
            </div>
            <div class="form-group2">
                <label for="approved">Одобрение</label>
                <input type="text" class="form-control" id="approvedC" value="0" disabled>
            </div>

            <div class="form-group2">
                <label for="email">Почта</label>
                <input type="text" class="form-control" id="emailC" />
            </div>
            <div class="form-group2">
                <label for="password">Пароль</label>
                <input type="text" class="form-control" id="passwordC" />
            </div>
            <div class="form-group2">
                <label for="role_id">Роль</label>
                <input type="text" class="form-control" id="role_idC" />
            </div>
            <button type="button" id="btnCreateUser" class="btn btn-default">Сохранить</button>
            <button type="button" id="btnCreateCancel" class="btn btn-default">Отменить</button>
            
        </form>
    </div>

    <div id="dialog" style="display: none">
        <input type="hidden" id="id_user" />
        <form>
            <div class="form-group2">
                <label for="name">Имя</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group2">
                <label for="surname">Фамилия</label>
                <input type="text" class="form-control" id="surname">
            </div>
            <div class="form-group2">
                <label for="patronymic">Отчество</label>
                <input type="text" class="form-control" id="patronymic">
            </div>
            <div class="form-group2">
                <label for="phone_number">Номер телефона</label>
                <input type="text" class="form-control" id="phone_number">
            </div>
            <div class="form-group2">
                <label for="address">Адрес</label>
                <input type="text" class="form-control" id="address">
            </div>
            <div class="form-group2">
                <label for="telegram_id">Телеграм</label>
                <input type="text" class="form-control" id="telegram_id">
            </div>
            <div class="form-group2">
                <label for="approved">Одобрение</label>
                <input type="text" class="form-control" id="approved">
            </div>
            <div class="form-group2">
                <label for="email">Почта</label>
                <input type="text" class="form-control" id="email" />
            </div>
            <div class="form-group2">
                <label for="password">Пароль</label>
                <input type="text" class="form-control" id="password" />
            </div>
            <div class="form-group2">
                <label for="role">Роль</label>
                <input type="text" class="form-control" id="role" />
            </div>
            <div class="form-group2">
                <button type="button" id="btnSave" class="btn btn-default">Создать</button>
                <button type="button" id="btnCancel" class="btn btn-default">Отменить</button>
            </div>
            
           
        </form>
    </div>
    <div class="footer">
            <footer>
                © AVTOBOTS PRODUCTION 2022
            </footer>
        </div>
    

        <script type="text/javascript">
        $.ajaxSetup({
                headers : {
                    'X-CSRF-Token' : "{{ csrf_token() }}"
                }
            });
        var grid, dialog, dialogCreate;
        function Edit(e) {
            $('#id_user').val(e.data.record.id_user);
            $('#name').val(e.data.record.name);
            $('#surname').val(e.data.record.surname);
            $('#patronymic').val(e.data.record.patronymic);
            $('#phone_number').val(e.data.record.phone_number);
            $('#address').val(e.data.record.address);
            $('#telegram_id').val(e.data.record.telegram_id);
            $('#approved').val(e.data.record.approved);
            $('#role').val(e.data.record.id_role);

            $('#email').val(e.data.record.email);
            $('#password').val(e.data.record.password);
            dialog.open('Edit user');
        }
        function Create() {
            var record = {
                name: $('#nameC').val(),
                email: $('#emailC').val(),
                password: $('#passwordC').val(),
                surname: $('#surnameC').val(),
                patronymic: $('#patronymicC').val(),
                phone_number: $('#phone_numberC').val(),
                address: $('#addressC').val(),
                telegram_id: $('#telegram_idC').val(),
                approved: $('#approvedC').val(),
                id_role: $('#role_idC').val()
            };
            $.ajax({ url: '/users/create', data: record , method: 'POST' })
                .done(function () {
                    dialogCreate.close();
                    grid.reload();
                })
                .fail(function () {
                    alert('Ошибка сохранения');
                    dialogCreate.close();
                });
        }
        function Save() {
            var record = {
                id_user: $('#id_user').val(),
                name: $('#name').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                surname: $('#surname').val(),
                patronymic: $('#patronymic').val(),
                phone_number: $('#phone_number').val(),
                address: $('#address').val(),
                telegram_id: $('#telegram_id').val(),
                approved: $('#approved').val(),
                id_role: $('#role_id').val()
            };
            $.ajax({ url: '/users/update', data: record , method: 'POST' })
                .done(function () {
                    dialog.close();
                    grid.reload();
                })
                .fail(function () {
                    alert('Ошибка сохранения');
                    dialog.close();
                });
        }
        function Delete(e) {
            if (confirm('Вы уверены?')) {
                $.ajax({ url: '/users/delete', data: { id_user: e.data.record.id_user }, method: 'POST' })
                    .done(function () {
                        grid.reload();
                    })
                    .fail(function () {
                        alert('Ошибка удаления');
                    });
            }
        }

        let timerId = setInterval(() => {

            var xhr = new XMLHttpRequest()
            xhr.open('GET', 'users/getCount', true)
            xhr.send()

            xhr.onreadystatechange = function() {
                if (xhr.readyState != 4) {
                    return
            }

            var UsersCount = JSON.parse(xhr.responseText)   
            var newUsersCount = UsersCount.count - grid.count(true)
            $('#btnUpdateUsers').val("+ " + newUsersCount)

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
            grid = $('#grid').grid({
                primaryKey: 'id',
                dataSource: '/users/index',
                uiLibrary: 'bootstrap',
                columns: [
                    { field: 'id_user', hidden: true, width: 40 },
                    { field: 'name', title: 'Имя', sortable: true },
                    { field: 'surname', title: 'Фамилия', sortable: true },
                    { field: 'patronymic', title: 'Отчетство', sortable: true },
                    { field: 'phone_number', title: 'Номер телефона', sortable: true },
                    { field: 'address', title: 'Адрес', sortable: true },
                    { field: 'telegram_id', title: 'Телеграм', sortable: true },
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
                    { field: 'name_role', title: 'Роль', sortable: true },
                    { field: 'email', title: 'Почта', sortable: true },
                    { field: 'password', title: 'Пароль', sortable: true },
                    { title: '', field: 'Edit', width: 34, type: 'icon', icon: 'glyphicon-pencil', tooltip: 'Редактировать', events: { 'click': Edit } },
                    { title: '', field: 'Delete', width: 34, type: 'icon', icon: 'glyphicon-remove', tooltip: 'Удалить', events: { 'click': Delete } }
                ],
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
                resizable: false,
                modal: true
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
                dialogCreate.open('Add user');
            });
            $('#btnSave').on('click', Save);
            $('#btnCancel').on('click', function () {
                dialog.close();
            });
            $('#btnCreateUser').on('click', Create);
            $('#btnCreateCancel').on('click', function(){
                dialogCreate.close();
            });
            $('#btnCreateTestUsers').on('click', function(){
                var x = new XMLHttpRequest();
                x.open("GET", "/users/testData", true);
                x.send();
                grid.reload();
            });
            $('#btnSearch').on('click', function () {
                grid.reload({ page: 1, name: $('#txtName').val(), surname: $('#txtSurname').val(), patronymic: $('#txtPatronymic').val(), phone_number: $('#txtPhone_number').val(), telegram_id: $('#txtTelegram_id').val(), approved: $('#txtApproved').val(), email: $('#txtEmail').val(), role_id: $('#txtRole_id').val() });
            });
            $('#btnClear').on('click', function () {
                $('#id_user').val('');
                $('#name').val('');
                $('#surname').val('');
                $('#patronymic').val('');
                $('#phone_number').val('');
                $('#telegram_id').val('');
                $('#approved').val('');
                $('#role').val('');
                $('#email').val('');
                $('#password').val('');
                $('#role_id').val('');
                grid.reload({ name: '', surname: '', patronymic: '', phone_number: '', telegram_id: '', approved: '', email: '', password: '', role_id: '' });
            });
        });
    </script>
    
</body>
</html>