
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <h1>crud de videojuegos</h1>
    <button onclick="añadirjuegos()" >añadir juego</button>
<table>
    <thead>
        <th>id</th>
        <th>titulo</th>
        <th>genero</th>
        <th>consola</th>
        <th>desarrolladora</th>
    </thead>
    <tbody>
        <?php foreach ($juegos as $juego) :  ?>
            <tr>
             <td><?=$juego->id ?> </td>  
             <td><?=$juego->titulo ?> </td> 
              <td><?=$juego->año ?> </td>
              <td><?=$juego->genero ?> </td>
              <td><?=$juego->consola ?> </td>
              <td><?=$juego->desarrolladora ?> </td>
              <td><a href="index.php?orden=modificar&id=<?=$juego->id?>">modificar</a></td>
              <td><a href="index.php?orden=detalles&id=<?=$juego->id?>">detalles</a></td>
              <td><a href="index.php?orden=borrar&id=<?=$juego->id?>">borrar</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<form action="">
    <button type="submit" name="nav" value="Primero"><<</button>
    <button type="submit" name="nav" value="Anterior"><</button>
    <button type="submit" name="nav" value="Siguiente">></button>
    <button type="submit" name="nav" value="Ultimo">>></button>
</form>
</body>
</html>