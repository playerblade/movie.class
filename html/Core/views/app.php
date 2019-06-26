<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movies</title>
</head>
<body>
<style>
    #main{
        width: 100%;
        height: 500px;
    }
    td{
        vertical-align: top;
    }
    #menu{
        width: 200px;
    }
</style>
<table border="1" id="main">
    <tr>
        <th colspan="2">
            <h1>Information system of Movies</h1>
        </th>
    </tr>
    <tr>
        <td id="menu">
            <?php
            include("menu.php");

            ?>
        </td>
        <td>
            <?php
                include $template;
            ?>
        </td>
    </tr>
</table>
</body>
</html>
