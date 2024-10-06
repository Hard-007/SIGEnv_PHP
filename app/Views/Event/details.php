<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscritos</title>
    <link rel="stylesheet" href="/app/public/css/style.css">
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
            <div class="navButtons">
                <a href="/sigenv/detalhes/id/<?=$id?>">Inscritos</a>
                <a href="/sigenv/submissions/id/<?=$id?>">Submissões</a>
                <a href="/sigenv/statistics/id/<?=$id?>">Estatísticas</a>
            </div>
            <div class="details-event">
                <?php
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
                            <span>Inscritos: <b>$i</b></span> <span>Check Ins: <b>$i</b></span>
                        </div>
                        ";
                    }
                            
                ?>
                
            </div>
            
            <div class="details-details ">
                <div class="formTable">
                    <form action="">
                        <input type="text" name="" id="" placeholder="Pesquisar">
                        <button>Procurar</button>
                    </form>

                    <form>
                        <button><a href="">Lista PDF</a></button>
                    </form>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Apelido </th>
                            <th>Email</th>
                            <th>Participação</th>
                            <th>Data Inscricao</th>
                            <th>Check In</th>
                            <th class='actions'>Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            while($row = $listSub->fetch_assoc()){
                                echo"
                                    <tr>
                                        <td>".$i++."</td>
                                        <td>$row[name]</td>
                                        <td>$row[surname]</td>
                                        <td>$row[email]</td>
                                        <td>Activa</td>
                                        <td>2024-09-12 15:45</td>
                                        <td>Checked</td>
                                        <td>
                                            <a href='/sigenv/evento/id/$row[id]'> <img src='public/img/icon/check.svg' alt='icon'> </a>
                                            <a href='/sigenv/evento/id/$row[id]'> <img src='public/img/icon/close.svg' alt='icon'> </a>
                                        </td>
                                    </tr>
                                ";
                            }
                            
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="details-details">
                <div class="formTable">
                    <form action="">
                        <input type="text" name="" id="" placeholder="Pesquisar">
                        <button>Procurar</button>
                    </form>

                    <form>
                        <button><a href="">Lista PDF</a></button>
                    </form>
                </div>
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
                            while($row = $listSubm->fetch_assoc()){
                                echo"
                                    <tr>
                                        <td>".$i++."</td>
                                        <td>$row[tema]</td>
                                        <td>$row[tipo]</td>
                                        <td>$row[status]</td>
                                        <td>$row[nomecom]</td>
                                        <td>$row[created_at]</td>
                                        <td>
                                            <a href='/sigenv/submissoes/id/$row[id]/idE/$row[id_evento]'> Avaliar </a>
                                        </td>
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