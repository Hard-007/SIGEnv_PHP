<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento</title>
    <link rel="stylesheet" href="public/css/style.css">
    <style>
        .actions{
            width: 80px;
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
                <h2>Eventos</h2>
                <a href="evento/create"> Cadastrar </a>
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
                            <th>Tema</th>
                            <th>Tipo </th>
                            <th>Audiencia</th>
                            <th>Sala</th>
                            <th>Lotação</th>
                            <th>Duração</th>
                            <th>Data</th>
                            <th class='actions'>Acções</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i=1;
                            while($row = $events->fetch_assoc()){
                                $hh = (strtotime($row["fim"]) - strtotime($row["inicio"])) / (60 * 60);
                                $dd = ($hh / 24 < 1) ? $hh.'hr(s)' : ceil($hh/24) .'dia(s)';
                                echo"
                                    <tr>
                                        <td>".$i++."</td>
                                        <td>$row[tema]</td>
                                        <td>$row[tipo]</td>
                                        <td>$row[audiencia]</td>
                                        <td>$row[sala]</td>
                                        <td>26/$row[lotacao]</td>
                                        <td>$dd</td>
                                        <td>$row[inicio]</td>
                                        <td>
                                            <a href='/sigenv/evento/$row[id]'> <img src='public/img/icon/show.svg' alt='icon'> </a>
                                            <a href='/sigenv/evento/details/$row[id]'> <img src='public/img/icon/align.svg' alt='icon'> </a>
                                            <a href='/sigenv/evento/edit/$row[id]'> <img src='public/img/icon/edit.svg' alt='icon'> </a>
                                            <a href='/sigenv/evento/delete/$row[id]'> <img src='public/img/icon/delete.svg' alt='icon'> </a>
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
            else{       
        ?>
        <section class="show">
            <div class="events">
                <?php while($row = $events->fetch_assoc()) { ?>
                    <div class="event">
                        <figure>
                            <img src="public/img/event.png" alt="Imagem do evento">
                        </figure>
                        <div class="descript">
                            <b><?= htmlspecialchars($row['tema'], ENT_QUOTES, 'UTF-8');?></b>
                            <br>
                            <p>
                                <?= htmlspecialchars(substr($row['descricao'], 0, 150), ENT_QUOTES, 'UTF-8'); ?>...
                            </p>
                            <br>
                            <span><?= htmlspecialchars($row['inicio'], ENT_QUOTES, 'UTF-8'); ?></span>
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <span>
                                <a href="/sigenv/evento/id/<?= urlencode($row['id']); ?>" style="padding: 4px 8px; background-color: #0063ff; border-radius: .4em; color: white; text-decoration: none;">
                                    Ver
                                </a>
                            </span>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>
        </section>
    </main>

</body>
</html>