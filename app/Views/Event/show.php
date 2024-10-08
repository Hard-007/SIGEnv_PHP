<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento Ver</title>
    <link rel="stylesheet" href="/sigenv/public/css/style.css">
    <script src="/sigenv/public/js/jquery-3.7.1.min.js"></script>
    
    <style>
        main{
            margin: 0 auto;
            padding: .2em;
            max-width: 800px;
        }
        figure{
            display: flex;
            align-items: center;
            margin: .6em 0;
            border-radius: 1em;
            overflow: hidden;
            height: 300px;
        }
        section{
            margin: .4em;
            position: relative;
        }
        .submission-form, .pPassivo, .pActivo{
            display: none;
        }
        .submission-form{
            display: none;
            top: 0;
            padding: 1em;
            position: absolute;
            background-color: #fcfcfc;
            border: 2px solid #0063ff;
            border-radius: .8em;
            width: 96%;
            height: 265px;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        .passivo, .activo, .pActivo button, .pPassivo a{
            border: 2px solid #0063ff;
            font-weight: bolder;
            padding: .5em 1em;
            border-radius: .4em;
            margin: 2px 6px;
        }
        .participacoes, .pActivo form{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .participacoes div{
            margin: .2em;
            padding: .2em;
        }
        
        .pPassivo a, .pActivo button{
            border: 2px solid #ddd;
            background-color: #0063ff;
            color: #fff;
        }
        .pActivo form input{
            outline: none;
            margin: 4px;
            padding: .6em .8em;
            border: 1px solid #aaa;
            border-radius: .4em;
        }
    </style>
</head>
<body>
    <main>
        <?php while($row = $events->fetch_assoc()) { ?>
            <section>
                <figure>
                    <img src="data:$row['bannerType'];base64,<?=base64_encode($row['banner'])?>" alt="">
                </figure>
                <div class='sectionHeader'>
                    <h2><?= htmlspecialchars($row['tema'], ENT_QUOTES, 'UTF-8');?></h2>
                    <button type="button" class="subBtn">Inscrever</button>
                </div>
                <div>
                    <section>
                        <p>
                            <b>Data:</b> <?= htmlspecialchars($row['inicio'], ENT_QUOTES, 'UTF-8');?> - <?= htmlspecialchars($row['fim'], ENT_QUOTES, 'UTF-8');?>
                        </p>
                        <p>
                            <b>Tipo:</b> <?= htmlspecialchars($row['tipo'], ENT_QUOTES, 'UTF-8');?>
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            <b>Publico Alvo:</b> <?= htmlspecialchars($row['audiencia'], ENT_QUOTES, 'UTF-8');?>
                        </p>
                        
                        <p>
                            <b>Local:</b> <?= htmlspecialchars($row['local'], ENT_QUOTES, 'UTF-8');?>
                            &nbsp;
                            &nbsp;
                            <b>Sala:</b> <?= htmlspecialchars($row['sala'], ENT_QUOTES, 'UTF-8');?>
                        </p>
                    </section>
                    <br>
                    <section>
                        <h3>Resumo</h3>
                        <p>
                            <?= htmlspecialchars($row['resumo'], ENT_QUOTES, 'UTF-8');?>
                        </p>
                    </section>
                    <br>
                    <section>
                        <h3>Descricao</h3>
                        <p>
                            <?= htmlspecialchars($row['descricao'], ENT_QUOTES, 'UTF-8');?>
                        </p>
                    </section>
                    <br>
                    <section>
                        <h4>Oradores</h4>
                        <div>
                            
                        </div>
                    </section>
                    <br>
                    <section>
                        <h4>Parceiros</h4>
                        <div>
                            
                        </div>
                    </section>
                    
                </div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <div class="submission-form">
                    <div class="participante">
                        <strong>Tipo de participação</strong>
                        <button type="button" class="passivo">Passiva</button>
                        <button type="button" class="activo">Activa</button>
                    </div>
                    <div class="participacoes">
                        <div class="pPassivo">
                            <a href='/sigenv/inscricoes/create/<?=$row['id']?>'> Inscrever </a>
                        </div>
                        <div class="pActivo">
                            <form action="/sigenv/submissoes/create/<?=$row['id']?>" method="POST" enctype="multipart/form-data">
                                <div class="tipoPart">
                                    <input type="radio" name="tipoPart" id="exposicao" value="exposicao">
                                    <label for="exposicao">Exposicao</label>

                                    <input type="radio" name="tipoPart" id="comunicacao" value="comunicacao">
                                    <label for="comunicacao">Comunicacao</label>

                                    <input type="radio" name="tipoPart" id="palestra" value="palestra">
                                    <label for="palestra">Palestra</label>
                                </div>
                                <input type="text" name="tema" placeholder="Tema">
                                <label for="resumo">Resumo PDF</label>
                                <input type="file" name="resumo" id="resumo" accept="application/pdf">
                                <br>
                                <br>
                                <button type="submit"> Submeter Inscrição </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
    </main>

    <script>
        $(".subBtn").click(function (){
            $(".submission-form").css("display", "flex");
        });
        $(".subBtn").dblclick(function (){
            $(".submission-form").css("display", "none");
        });
        $(".passivo").click(function (){
            $(".pActivo").css("display", "none");
            $(".pPassivo").css("display", "block");
        });
        $(".activo").click(function (){
            $(".pPassivo").css("display", "none");
            $(".pActivo").css("display", "block");
        });

        const pdf = document.getElementById("resumo");
        
    </script>
</body>
</html>