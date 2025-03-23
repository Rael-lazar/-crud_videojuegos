<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <label for="">Titulo: </label>
        <input type="text" value= <?=$juego->titulo ?> readonly>
        <br>
        <label for="">año</label>
        <input type="text" value= <?=$juego->año ?> readonly>
        <br>
        <label for="">genero</label>
        <input type="text" value= <?=$juego->genero ?> readonly>
        <br>
        <label for="">consola</label>
        <input type="text" value= <?=$juego->consola ?> readonly>
        <br>
        <label for="">desarrolladora</label>
        <input type="text" value= <?=$juego->desarrolladora ?> readonly>
        

    </form>
</body>
</html>