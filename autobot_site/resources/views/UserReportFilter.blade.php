<?php
use App\Models\User;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/filter.css">
    <title>Document</title>
</head>

<body>
<div id="dialog" >
        <input type="hidden" id="id_user" />
        <form action="{{ route('usersList') }}" method="get">
        <button type="submit" class="back">
            <a href="http://127.0.0.1:8000/admin"> 🠔 </a>
        </button>
            <div class="main">
                <div class="form-group">
                    <label for="approved">Статус</label>
                    <select name="approved">
                        <option value="">Не выбрано</option>
                        <option value="1">Одобрен</option>
                        <option value="2">Забанен</option>
                        <option value="0">Ожидает</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="approved">Роль</label>
                    <select name="name_role">
                        <option value="">Не выбрано</option>
                        <option value="liver">Житель</option>
                        <option value="admin">Администратор</option>
                        <option value="guard">Охранник</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Почта</label>
                    <input type="text" name="email" id="email" />
                </div>
                <div class="but">
                    <button type="submit" id="btnSave" class="btn btn-default">Сохранить</button>
                    <button type="button" id="btnCancel" class="btn btn-default">Отмена</button>
                </div>
            
            </div>
            
        </form>
    </div>
</body>
</html>

