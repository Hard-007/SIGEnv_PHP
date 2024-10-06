<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculdade - Criar</title>
    <link rel="stylesheet" href="../../../public/css/style.css">

</head>
<body>

    <div class="lg">
        <figure>
            <img src="../../../public/img/conf.png" alt="UPM Logo">
        </figure>
        <form action="/faculdade/create" method="POST">
            <b>Faculdade</b>
            <br>
            
            <input type="text" name="nome" id="" placeholder="Nome">
            <input type="text" name="localizacao" id="" placeholder="Localização">
            <input type="text" name="nrAnf" id="" placeholder="Nr de An">


            <button type="submit">Registar</button>
        </form>
    </div>
    
</body>
</html>