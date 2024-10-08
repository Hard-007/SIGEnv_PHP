<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/sigenv/public/css/style.css">
    <script src="/sigenv/public/js/chart.js"></script>

    <style>
        .cards, .row{
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

        /* body {
            background-color: #f4f6f9;
        } */
        .chart-container {
            position: relative;
            width: 100%;
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
            
            <!-- Row for Charts -->
            <div class="row">

                <!-- Participantes por Categoria Chart -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Participantes por Categoria</h4>
                            <div class="chart-container">
                                <canvas id="participantesCategoriaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Resumos Submetidos por Status Chart -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Resumos por Status</h4>
                            <div class="chart-container">
                                <canvas id="trabalhosStatusChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
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
            </div>
        </section>
    </main>





  <!-- Chart.js Script -->
  <script>
    // Dados simulados para gráfico de Participantes por Categoria
    const participantesCategoriaData = {
      labels: ['Estudantes', 'CTA', 'Docentes', 'Visitantes'],
      datasets: [{
        label: 'Número de Participantes',
        data: [70, 30, 20, 10],
        backgroundColor: ['#007bff', '#28a745', '#ffc107', '#17a2b8'],
      }]
    };

    // Dados simulados para gráfico de Trabalhos por Status
    const trabalhosStatusData = {
      labels: ['Submetido', 'Aceito', 'Rejeitado'],
      datasets: [{
        label: 'Número de Resumos',
        data: [10, 8, 2],
        backgroundColor: ['#007bff', '#28a745', '#dc3545'],
      }]
    };

    // Gráfico de Participantes por Categoria
    const ctx1 = document.getElementById('participantesCategoriaChart').getContext('2d');
    new Chart(ctx1, {
      type: 'pie',
      data: participantesCategoriaData,
    });

    // Gráfico de Trabalhos por Status
    const ctx2 = document.getElementById('trabalhosStatusChart').getContext('2d');
    new Chart(ctx2, {
      type: 'bar',
      data: trabalhosStatusData,
    });
  </script>
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