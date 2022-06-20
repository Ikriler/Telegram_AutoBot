<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Администратор</title>
        
        <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
        <script src="js/jquery.ui.autocomplete.scroll.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="css/admin.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
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
                    <!-- <p class="text1">«Автобот»</p> -->
                    <nav class="header-nav">
                        <a href="/user_editing">Редактирование пользователя      |</a>
                        <a href="/UserReportFilter">Отчёт заявок пользователей      |</a>
                        <a href="/RegCarsFilter">Отчёт заявок на въезд      |</a>
                        <a href="/">  Выход</a>
                    </nav>
                </div>
            </header>
            
            <!-- <form action="{{ route('userManage') }}" method="GET">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <button type="submit">Управление пользователями</button>
            </form>
            
               <form action="{{ route('newregcar') }}"  method="GET">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                 <button type="submit">Управление  машинами</button>
            </form> 
                <button type="submit">Управление машинами</button>
            </form> -->
            
            <form class=formtable>
                <!-- <div class="text2">
                    <p>ПО ФЕН-ШУЮ АДМИН ДОЛЖЕН<br/>СПАТЬ ГОЛОВОЙ<br/>НА СЕРВЕРЕ</p>
                </div> -->

                <input value = "+ *" type="button" id="btnUpdateUsers" class="btn btn-default"/>
                <div class="text3">
                    <p>ЗАЯВКИ НА РЕГИСТРАЦИЮ</p>
                </div>

                <table class="grid1" id="grid2"></table>

                <input value = "+ *" type="button" id="btnUpdateUsers1" class="btn btn-default"/>
                <div class="text4">
                <button id="btnAdd" type="button" class="btn btn-default pull-right">Новая заявка</button>
                    <p>ЗАЯВКИ НА ВЪЕЗД</p>
                    
                </div>
                
                <table class="grid3" id="grid4"></table>
            </form>

            <!-- <div class="container3">
                <button type="submit" class="gog">УДАЛИТЬ ПОЛЬЗОВАТЕЛЯ</button>
                <button type="submit" class="gog">УДАЛИТЬ ЗАЯВКУ</button>
                <button type="submit" class="gog">ЗАЯВКИ НА ВЪЕЗД</button>
            </div>  
            <div class="container4">
                <button type="submit" class="gog">ИЗМЕНИТЬ/ДОБАВИТЬ</button>
                <button type="submit" class="gog">ИЗМЕНИТЬ/ДОБАВИТЬ</button>
            </div>  -->

        </div>
       
        <div class="footer">
            <footer>
                © AVTOBOTS PRODUCTION 2022
            </footer>
        </div>

        <div id="dialogCreate" style="display: none" class="container">
        <form class="row">       
    <div class="col-xs-6">
            <div>
                <label for="num_carC">Номер машины</label>
                <input type="text" class="form-control" id="num_carC" name="num_car" value="">
            </div>
            <div>
                <label for="modelC">Марка машины</label>
                <input type="text" class="form-control" id="modelC" name="model"  value="">
            </div>
            <div>
                <label for="add_infoC">Адрес</label>
                <input type="text" class="form-control" id="add_infoC" name="add_info"  value="">
            </div>
            <div class="form-group">
                <label for="commentC">Коментарий</label>
                <input type="text" class="form-control" id="commentC" name="comment"  value="">
            </div>
            <!-- <div class="form-group">
                <label for="approved">Одобрение</label>
                <select name="approved" class="form-control" id="approved">
                    <option value="1">Одобрено</option>
                    <option value="2">Отклонено</option>
                    <option value="0">Ожидает</option>
                </select>
                <input type="text" class="form-control" id="approved" name="approved" value="0" disabled>
            </div> -->
            <div class="form-group">
                <label for="fio_userC">ФИО пользователя</label>
                <input type="text" class="form-control" id="fio_userC" name="fio_userC"  value="">
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
        </div>

        <div class="row">
          
           

        </div>    

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
                <label for="fio_user">ФИО пользователя</label>
                <input type="text" class="form-control" id="fio_user" name="fio_user"  value="">
            </div>
            <div class="form-group">
            <label for="ownerC">Принадлежность</label>
                <select class="form-control"  id="ownerC" name="owner">
                    <option value="1">Личная</option>
                    <option value="2">Гостевая</option>
                </select>
                <button type="button" id="btnSave" class="btn btn-default">Сохранить</button>
            <button type="button" id="btnCancel" class="btn btn-default">Отменить</button>
            </div>
            
        </form>
        </div>

        <div id="sendMessageDialog" style="display: none">
            <form>
                <div>
                    <input type="text" class="form-control" id="send-id_user" name="id_user" value="" disabled>
                </div>
                <div class="form-group">
                    <label for="fio_user">ФИО пользователя</label>
                    <input type="text" class="form-control" id="send-fio_user" name="fio_user"  value="">
                </div>
                <div class="form-group">
                    <label for="text_message">Текст сообщения</label>
                    <textarea id="text_message" name="text_message"></textarea>
                </div>
                    <button type="button" id="btnSendMessage" class="btn btn-default">Отправить</button>
                <button type="button" id="btnSendMessageCancel" class="btn btn-default">Отменить</button>
                </div>              
            </form>
        </div>


        <script type="text/javascript">
            var grids;
            function UpAdd(e) {
                    $.ajaxSetup({
                        headers : {
                            'X-CSRF-Token' : "{{ csrf_token() }}"
                        }
                    });
                    if (confirm('Вы уверены?')) {
                        var record = {
                            id_user: e.data.record.id_user,
                            name: e.data.record.name,
                            surname: e.data.record.surname,
                            patronymic: e.data.record.patronymic,
                            phone_number: e.data.record.phone_number,
                            address: e.data.record.address,
                            telegram_id: e.data.record.telegram_id,
                            approved: 1
                        };
                        $.ajax({ url: '/users/update', data: record, method: 'POST' })  
                        .done(function () {
                            alert('Выполнено');
                            grids.reload();
                        })
                        .fail(function () {
                            alert('Ошибка сохранения.');
                        });
                    }
                }
                function Update(e) {
                    $.ajaxSetup({
                        headers : {
                            'X-CSRF-Token' : "{{ csrf_token() }}"
                        }
                    });
                    if (confirm('Вы уверены?')) {
                        var record = {
                            id_user: e.data.record.id_user,
                            name: e.data.record.name,
                            surname: e.data.record.surname,
                            patronymic: e.data.record.patronymic,
                            phone_number: e.data.record.phone_number,
                            address: e.data.record.address,
                            telegram_id: e.data.record.telegram_id,
                            approved: 2
                        };
                        $.ajax({ url: '/users/update', data: record, method: 'POST' })  
                        .done(function () {
                            alert('Выполнено');
                            grids.reload();
                        })
                        .fail(function () {
                            alert('Ошибка сохранения!');
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
                var newUsersCount = UsersCount.count - grids.count(true)
                $('#btnUpdateUsers').val("+ " + newUsersCount)

                if (xhr.status === 200) {
                        console.log('result', xhr.responseText)
                    } else {
                        console.log('err', xhr.responseText)
                    }
                }            
                }, 2000);

                $('#btnUpdateUsers').on('click', function () {
                    grids.reload();
                });

                $(document).ready(function () {
                    grids = $('#grid2').grid({
                        uiLibrary: 'bootstrap',
                        dataSource: '/users/index',
                        columns: [
                            { field: 'id_user', title: 'id', hidden: true},
                            { field: 'name', title: 'Имя', sortable: true, colspan: 3}, 
                            { field: 'surname', title: 'Фамилия', sortable: true},
                            { field: 'patronymic', title: 'Отчетство', sortable: true},
                            { field: 'phone_number', title: 'Номер телефона', sortable: true},
                            { field: 'address', title: 'Номер участка', sortable: true},
                            { field: 'telegram_id', title: 'ID Телеграма', sortable: true},
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
                            { title: '', field: '', width: 35, type: 'icon', icon: 'glyphicon-plus', tooltip: 'Одобрить', events: { 'click': UpAdd} },
                            { title: '', field: '', width: 35, type: 'icon', icon: 'glyphicon-minus', tooltip: 'Отклонить', events: { 'click': Update } },
                            
                        ],
                        pager: { limit: 5, sizes: [2, 5, 10, 20] }
                    });
                });
        </script>
        <script type="text/javascript">
            $.ajaxSetup({
                headers : {
                    'X-CSRF-Token' : "{{ csrf_token() }}"
                }
            });
            var grid, dialog, dialogCreate, sendMessageDialog;
            function CreateNew(e) {
                var record = {
                num_car: $('#num_carC').val(),
                model: $('#modelC').val(),
                add_info: $('#add_infoC').val(),
                comment: $('#commentC').val(),
                approved: 0,
                fio_user: $('#fio_userC').val(),
                owner: $('#ownerC').val()                
            };
            $.ajax({ url: '/reg_cars/create', data: record , method: 'POST' })
                .done(function () {
                    dialogCreate.close();
                    alert('Заявка успешно создана');
                    grid.reload();
                })
                .fail(function () {
                    alert('Ошибка');
                    dialogCreate.close();
                });


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
                    alert('Ошибка');
                });
            }
        }

        $('#btnSendMessage').on('click', SendMessage);
        $('#btnSendMessageCancel').on('click', function () {
            sendMessageDialog.close();
        });

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
            

            //DB::table('reg_cars')->where('id_reg_car', '=', $_GET[$a])->delete();           
            
            function Deleete(e) {
                $.ajaxSetup({
                    headers : {
                        'X-CSRF-Token' : "{{ csrf_token() }}"
                    }
                });
                if (confirm('Вы уверены?')) {
                

                    $.ajax({url: '/reg_cars/delete', data: { id_reg_car: e.data.record.id_reg_car }, method: 'POST' })
                        .done(function () {
                            alert('Вы удалили');
                            grid.reload();
                        })
                        .fail(function () {
                            alert('Ошибка удаления.');
                        });
                }
            }

            function SendMessage(e){
                $.ajaxSetup({
                    headers : {
                        'X-CSRF-Token' : "{{ csrf_token() }}"
                    }
                });
                if (confirm('Вы уверены?__')) {
                    var record = {
                        id_user: $("#send-id_user").val(),
                        message: $("#text_message").val()
                    };
                    $.ajax({ url: '/reg_cars/sendMessage', data: record, method: 'POST' })  
                    .done(function () {
                        alert('Отправлено.');
                        grid.reload();
                    })
                    .fail(function () {
                        alert('Ошибка отправки.');
                    });
                }
            }


            var grid, dialog;
        function Chg(e) {
            usersSelectList("fio_user");
           $('#id_reg_car').val(e.data.record.id_reg_car);
            $('#num_car').val(e.data.record.num_car);
            $('#model').val(e.data.record.model);
            $('#add_info').val(e.data.record.add_info);
            $('#comment').val(e.data.record.comment);
            $('#ownerC').val(e.data.record.owner);
            $('#fio_user').val(e.data.record.surname + " " + e.data.record.name + " " + e.data.record.patronymic);
            dialog.open('Изменение данных о машине');
        }

            function Save() {
            var record = {
                id_reg_car: $('#id_reg_car').val(),
                num_car: $('#num_car').val(),
                model: $('#model').val(),
                add_info: $('#add_info').val(),
                comment: $('#comment').val(),
                owner: $('#ownerC').val(),
                fio_user: $('#fio_user').val(),
            };
            $.ajax({ url: '/reg_cars/update', data: record , method: 'POST' })
                .done(function () {
                    dialog.close();
                    grid.reload();
                })
                .fail(function () {
                    alert('Ошибка');
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

            $(document).ready(function () {
            grid = $('#grid4').grid({
                uiLibrary: 'bootstrap',
                columns: [
                    { field: 'dateTime_order', width: 120, title: 'Дата', sortable: true},
                    { field: 'num_car', title: 'Номер машины', sortable: true},
                    { field: 'model', width: 80, title: 'Марка', sortable: true},
                    { field: 'add_info', title: 'Адрес', sortable: true},
                    { field: 'id_reg_car', title: 'id машины', hidden: true},
                    { field: 'id_user', title: 'id пользователя', hidden: true},
                    { field: 'name', title: 'id машины', hidden: true},
                    { field: 'surname', title: 'id пользователя', hidden: true},
                    { field: 'patronymic', title: 'id машины', hidden: true},
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
                    { title: '', field: '', width: 35, type: 'icon', icon: 'glyphicon-pencil', tooltip: 'Изменить', events: { 'click': Chg} },
                    { title: '', field: '', width: 35, type: 'icon', icon: 'glyphicon-envelope', tooltip: 'Отправить сообщение', events: {'click': openSendMessageDialog}}
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
            sendMessageDialog = $("#sendMessageDialog").dialog({
                uiLibrary: 'bootstrap',
                autoOpen: false,
                resizable: true,
                modal: true,
                width:'720'
            });

            function openSendMessageDialog(e) {
                $("#send-id_user").val(e.data.record.id_user);
                $('#send-fio_user').val(e.data.record.surname + " " + e.data.record.name + " " + e.data.record.patronymic);
                sendMessageDialog.open();
            }

            usersSelectList = function(id) {
                var xhr = new XMLHttpRequest()
                xhr.open('GET', 'users/index', true)
                xhr.send()
                var FIOs = [];
                xhr.onreadystatechange = function() {
                    if (xhr.readyState != 4) {
                        return
                    }
                    var usersData = JSON.parse(xhr.responseText).records   
                    usersData.forEach(element => {
                    FIOs.push(element.surname + " " + element.name + " " + element.patronymic);
                    });
                }
                $("#" + id).autocomplete({
                    maxShowItems: 5,
                    source: FIOs
                });
            };

            $('#btnAdd').on('click', function () {
                usersSelectList("fio_userC");
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