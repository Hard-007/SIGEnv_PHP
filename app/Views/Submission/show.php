<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscritos</title>
    <link rel="stylesheet" href="/sigenv/public/css/style.css">
    <style>
        .actions{
            width: 50px;
        }
        td a img{
            width: 24px;
            height: 24px;
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
                        </div>
                        ";
                    }
                            
                ?>
                
            </div>
            
            <div class="details-details">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tema</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Autor</th>
                            <th>Data Submissao</th>
                            <th class='actions'>Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            while($row = $showSubm->fetch_assoc()){
                                $pdf = $row["docData"];
                                $type = $row["docType"];
                                echo"
                                    <tr>
                                        <td>".$i++."</td>
                                        <td>$row[tema]</td>
                                        <td>$row[tipo]</td>
                                        <td>$row[status]</td>
                                        <td>$row[nomecom]</td>
                                        <td>$row[created_at]</td>
                                        <td>
                                            <a href='/sigenv/accept/$row[id]/$row[id_evento]'> <img src='/sigenv/public/icon/check.svg' alt='icon'> </a>
                                            <a href='/sigenv/reject/$row[id]/$row[id_evento]'> <img src='/sigenv/public/icon/close.svg' alt='icon'> </a>
                                        </td>
                                    </tr>
                                    
                                ";
                                
                            }
                            
                        ?>
                    </tbody>
                </table>
            </div>
            <?php echo "<embed src='data:$type;base64,".base64_encode($pdf)."' width='100%' height='600px' type='$type' />"; ?>
        </section>
        <?php
            }     
        ?>
    </main>

</body>
</html>