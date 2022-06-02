<?php
use App\Models\RegCars;
use App\Http\Controllers\RegCarsController;
use Illuminate\Http\Request;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заявки</title>
    <link rel="stylesheet" href="css/usersList.css">
</head>
<body>
    <?php
        $contorller = new RegCarsController();
        $request = new Request($_REQUEST);
        $data = json_decode($contorller->index($request)->content())->records;
        $hideKeys = ["id_reg_car","id_address","id_user"];
        //dd($data);
    ?>
    <table class="table">
        <tr>
            <td>Номер</td>
            <td>Марка</td>
            <td>Инфо</td>
            <td>Дата</td>
            <td>Комент</td>
            <td>Статус</td>
            <td>Собственность</td>
        </tr>
    <?php foreach ($data as $item):?>
        <tr>
            <?php foreach($item as $key => $attribute):?>
                <?php if(in_array($key, $hideKeys)) continue;?>
                <td><?php 
                if($key == "approved") {
                    switch($attribute){
                        case "0":
                            echo "Ожидает";
                            break;
                        case "1":
                            echo "Одобрен";
                            break;
                        case "2":
                            echo "Забанен";
                            break;
                        default:
                            echo "Неизвестно";
                            break;
                    }
                }
                else if($key == "owner") {
                    switch($attribute){
                        case "0":
                            echo "Гостевая";
                            break;
                        case "1":
                            echo "Личная";
                            break;                      
                        default:
                            echo "Неизвестно";
                            break;
                    }
                }
                else echo $attribute; 
                ?></td>
            <?php endforeach;?>
        </tr>
    <?php endforeach;?>
    </table>
</body>
</html>