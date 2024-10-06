<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="public/css/style.css">
    <style>
        .cards{
            display: flex;

        }
        .card{
            background-color: #fff;
            margin: .6em;
            padding: 2em;
            border-radius: .6em;
        }
        .card img{
            max-width: 100px;
        }
    </style>
</head>
<body>

    <main class="main">
        <?php
            include "app/Views/fragments/aside.php";
        ?>
        <section class="show">
            <div class="sectionHeader">
                <h2>Dashboard</h2>
            </div>

            <?php while($row = $events->fetch_assoc()) { ?>
                <div class="cards">
                    <div class="card">
                        <img src='public/img/icon/calendar.svg' alt='icon'>
                        <h3>
                            <?= htmlspecialchars($row['evento'], ENT_QUOTES, 'UTF-8');?>
                        </h3>
                        <p>Eventos</p>
                    </div>
                    <div class="card">
                        <img src='public/img/icon/form.svg' alt='icon'>
                        <h3>
                            <?= htmlspecialchars($row['inscritos'], ENT_QUOTES, 'UTF-8');?>
                        </h3>
                        <p>Inscricoes</p>
                    </div>
                    <div class="card">
                        <img src='public/img/icon/speech.svg' alt='icon'>
                        <h3>
                            <?= htmlspecialchars($row['evento'], ENT_QUOTES, 'UTF-8');?>
                        </h3>
                        <p>Oradores</p>
                    </div>
                    <div class="card">
                        <img src='public/img/icon/handshake.svg' alt='icon'>
                        <h3>
                            <?= htmlspecialchars($row['evento'], ENT_QUOTES, 'UTF-8');?>
                        </h3>
                        <p>Parceiros</p>
                    </div>
                </div>
            <?php } ?>
            <div>
                <table>
                    <th>
                        <td>#</td>
                        <td>Tema</td>
                        <td>Inscritos</td>
                    </th>
                </table>
                <div class="graph">
                    ola
                </div>
            </div>
        </section>
    </main>
</body>
</html>
<!---
1Congresso Científico

2. Simpósio

3. Seminário

4. Workshop

5. Fórum Científico

6. Mesa-Redonda

7. Encontro Acadêmico (Meeting)

8. Jornada Acadêmica

9. Feira de Ciências

10. Hackathon Científico

11. Colóquio

12. Conferência
--->