<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parceiros</title>
    <link rel="stylesheet" href="public/css/style.css">
    <style>
        .actions{
            width: 60px;
        }
        td a img{
            width: 16px;
            height: 16px;
        }
    </style>
</head>
<body>
    <main class="main">
        <?php
            include "app/Views/fragments/aside.php";

            if($_SESSION['category'] == "superadmin"){
        ?>
    
        <section class="show">
            <div class="sectionHeader">
                <h2>Parceiros</h2>
                <a href="/sigenv/parceiros/create"> Cadastrar </a>
            </div>
            <div class="formTable">
                <form action="">

                </form>
                    
                <form action="">
                        <input type="text" name="" id="" placeholder="Pesquisar">
                        <button>Procurar</button>
                </form>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Area de actuação </th>
                            <th>Descrição</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            while($row = $events->fetch_assoc()){
                                echo"
                                    <tr>
                                        <td>".$i++."</td>
                                        <td>$row[nome]</td>
                                        <td>$row[area]</td>
                                        <td>".substr($row['descricao'], 0, 100)."</td>
                                    </tr>
                                ";
                            }
                            
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <?php
            }
        ?>
    </main>

</body>
</html>