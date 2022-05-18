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
                        <a href="/otchetAuto">Отчёт заявок на въезд      |</a>
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
                <button id="btnAdd1" type="button" class="btn btn-default pull-right">Создать нового пользователя</button>
                <input value = "+ * users" type="button" id="btnUpdateUsers" class="btn btn-default"/>
                <table id="grid2" class="table table-sortable"></table> 
            </div>
        </div>  
        <footer>
            © AVTOBOTS PRODUCTION 2022
        </footer>  

        <script type="text/javascript">
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
                if (confirm('Вы уверены')) {
                    $.ajax({ url: '/reg_cars/delete', data: { id: e.data.id }, method: 'POST' })
                        .done(function () {
                            alert('Выполнено.');
                            grid.reload();
                        })
                        .fail(function () {
                            alert('Отказ в удалении.');
                        });
                }
            }

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
                    { field: 'owner', width: 140, title: 'Собственность', sortable: true},
                    { field: 'comment', title: 'Коментарий'},
                    { field: 'approved', width: 115, title: 'Одобрение', sortable: true},
                    { title: '', field: '', width: 35, type: 'icon', icon: 'glyphicon-plus', tooltip: 'Одобрить', events: { 'click': Dob} },
                    { title: '', field: '', width: 35, type: 'icon', icon: 'glyphicon-minus', tooltip: 'Отклонить', events: { 'click': Del } },
                    { title: '', field: 'Edit', width: 35, type: 'icon', icon: 'glyphicon-pencil', tooltip: 'Редактировать', events: { 'click': Dob } },
                    { title: '', field: 'Delete', width: 35, type: 'icon', icon: 'glyphicon-remove', tooltip: 'удалить', events: { 'click': Deleete } }
                  
                ],
                dataSource: '/reg_cars/',
                sort: true,
                pager: { limit: 5, sizes: [2, 5, 10, 20] }
            });
            $('#btnSearch').on('click', function () {
                grid.reload({ page: 1, num_car: $('#txtNumCar').val(), dateTime_order: $('#txtdateTime').val()});
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
                $('#owner').val('');
                grid.reload({ id_reg_car: '', num_car: '', model: '', add_info: '', dateTime_order: '', comment: '', approved: '', id_user: '', owner: '' });
            });
        });
    </script>
    </body>
</html>