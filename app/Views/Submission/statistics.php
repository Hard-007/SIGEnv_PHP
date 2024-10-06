<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscritos</title>
    <link rel="stylesheet" href="public/css/style.css">
    <style>
        .actions{
            width: 40px;
        }
        td a img{
            width: 40px;
            height: 25px;
        }
        .details-event{
            background-color: #fff;
            padding: .4em;
            border-radius: 1em;
            display: flex;
        }
        .details-event div{
            margin: .4em;
        }
        .details-event div img{
            max-width: 200px;
            border-radius: 1em;
        }
        .details-details{
            background-color: #fff;
            border-radius: .4em;
            padding-top: .6em;
        }
        .navButtons{
            display: flex;
            justify-content: space-around;
            margin: .6em;
        }
        .navButtons a{
            padding: 4px 8px;
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
                <h2>Detalhes</h2>
            </div>
            <div class="navButtons">
                <a href="/sigenv/detalhes/id/<?=$id?>">Inscritos</a>
                <a href="/sigenv/submissions/id/<?=$id?>">Submissões</a>
                <a href="/sigenv/statistics/id/<?=$id?>">Estatísticas</a>
            </div>
            <div class="details-event">
                <?php
                    $i=1;
                    while($row = $evento->fetch_assoc()){
                        $id = $row['id'];
                        echo"
                        <div>
                            <img src='data:$row[bannerType];base64,".base64_encode($row['banner'])."' />
                        </div>
                        <div>
                            <p>$row[tipo]</p>
                            <strong>$row[tema]</strong>
                            <p>$row[inicio]</p>
                            <br>
                            <br>
                        </div>
                        ";
                    }
                            
                ?>
                
            </div>
            
            <div class="details-details">
                Bla
            </div>
        </section>
        <?php
            }     
        ?>
    </main>

</body>
</html>