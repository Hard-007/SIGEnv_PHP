<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - Editar</title>
    <link rel="stylesheet" href="/sigenv/public/css/style.css">
    <script src="/sigenv/public/js/jquery-3.7.1.min.js"></script>

    <style>
        .legends button{
            background-color: #fff;
            border-radius: .4em .4em 0 0;
            margin-right: 6px;
            padding: .6em 1em;
            border: none;
            outline: none;
        }
        .legends button:active{
            background-color: #ddd;
        }
        .flex{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .flex .right{
            display: flex;
            flex-direction: column;
            width: 74%;
        }
        .right .inner{
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
        }
        .preview{
            max-width: 380px;
            height: 200px;
            margin: .6em .4em;
            border-radius: .6em;
        }
        .fields{
            position: relative;
            border: none;
            border-radius: 0 .4em .4em .4em;
            padding: .6em;
            background-color: #0084ff;
        }
        .fields input, .fields select, .fields textarea{
            outline: none;
            margin: .4em;
            padding: .8em;
            border-radius: .6em;
            border: 1px solid #ddd;
            background-color: #efefef;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .sub{
            background-color: #fff;
            color: #000;
            font-weight: bolder;
            font-size: 15px;
            padding: .8em 1.2em;
            border-radius: .4em;
            border: none;
            outline: none;
        }
        .orador-form, .parceiro-form{
            display: none;
            position: absolute;
            left: 0;
            top: 0;
            width: 98%;
            border-radius: 0 .4em .4em .4em;
            padding: .6em;
            background-color: #0084ff;
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
                <h2>Editar Evento</h2>
                <a href="/sigenv/evento"> Cancelar </a>
            </div>
            <div class="legends">
                <button id="info">Info. Geral</button>
                <button id="orador">Oradores</button>
                <button id="parceiro">Parceiros</button>
                <button id="evento">Evento</button>
            </div>
            <div>
                <?php
                    while($row = $events->fetch_assoc()){
                ?>
                <div class="fields">
                    <form action="/sigenv/evento/create" method="POST" enctype="multipart/form-data">
                        <div class="flex">
                            <div>
                                <label for="banner" ><img src="data:$row['bannerType'];base64,<?=base64_encode($row['banner'])?>" alt="" id="previewBanner" class="preview"></label>
                                <input type="file" name="banner" id="banner" accept="image/*" hidden>
                            </div>
                            <div class="right">
                                <input type="text" name="tema" id="" placeholder="<?=$row['tema']?>">
                                <div class="inner">
                                    <select name="tipoEvento" id="">
                                        <option selected disabled>Tipo</option>
                                        <option value="Colóquio">Colóquio</option>
                                        <option value="Conferência">Conferencia</option>
                                        <option value="Mesa Redonda">Mesa Redonda</option>
                                        <option value="Workshop">Workshop</option>
                                        <option value="Jornadas Científicas">Jornadas Científicas</option>
                                    </select>
                                    <select name="publicoAlvo" id="">
                                        <option selected disabled>Público Alvo</option>
                                        <option value="Academia">Academia</option>
                                        <option value="Docentes">Docentes</option>
                                        <option value="CTA">CTA</option>
                                        <option value="Estudantes">Estudantes</option>
                                    </select>
                                    <div>
                                        <label for="inicio">Inicio</label>
                                        <input type="datetime-local" name="inicio" id="inicio">
                                    </div>
                                    <div>
                                        <label for="fim">Fim</label>
                                        <input type="datetime-local" name="fim" id="fim">
                                    </div>
                                </div>
                                <input type="text" name="resumo" placeholder="<?=$row['resumo']?>">
                            </div>
                        </div>
                        <textarea rows="7" name="descricao" id=""><?=$row['descricao']?></textarea>
                        <br>                        
                        <br>
                        <button type="submit" class="sub">Editar Evento</button>
                    </form>
                </div>

                <div class="fields">
                    <div>
                        <button class="addSpeaker">Adicionar Orador</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Cargo </th>
                                <th>Empresa</th>
                                <th>Biografia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=1;
                                //while($row = $events->fetch_assoc()){
                                    echo"
                                        <tr>
                                            <td>".$i++."</td>
                                            <td>Nome Apelido</td>
                                            <td>Dir. Gerak</td>
                                            <td>Vortex</td>
                                            <td>".substr('super professional', 0, 100)."</td>
                                        </tr>
                                    ";
                                //}
                                
                            ?>
                        </tbody>
                    </table>
                    <form action="/sigenv/oradores/create" method="POST" enctype="multipart/form-data" class="orador-form">
                        <div class="flex">
                            <div>
                                <label for="oimg"><img src="/sigenv/public/icon/image.svg" alt="" id="previewOrador" class="preview"></label>
                                <input type="file" name="orador-img" id="oimg" accept="image/*" hidden>
                            </div>
                            <div class="right">
                                <input type="text" name="orador-nome" placeholder="Nome">
                                <input type="text" name="orador-titulo" placeholder="Titulo">
                                <input type="text" name="orador-empresa" placeholder="Empresa">
                            </div>
                        </div>
                        <textarea rows="7" name="orador-bio" id="" placeholder="Biografia"></textarea>
                        <br>
                        <br>
                        <button type="submit" class="sub orador">Adicionar Orador</button>
                    </form>
                </div>

                <div class="fields">
                    <div>
                        <button class="addPartner">Adicionar Parceiro</button>
                    </div>
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
                                //while($row = $events->fetch_assoc()){
                                    echo"
                                        <tr>
                                            <td>".$i++."</td>
                                            <td>Vortex</td>
                                            <td>Tecnologia</td>
                                            <td>".substr('super company', 0, 100)."</td>
                                        </tr>
                                    ";
                                //}
                                
                            ?>
                        </tbody>
                    </table>
                    <form action="/sigenv/parceiros/create" method="POST" enctype="multipart/form-data" class="parceiro-form">
                        <div class="flex">
                            <div>
                                <label for="pimg"><img src="/sigenv/public/icon/image.svg" alt="" id="previewParceiro" class="preview"></label>
                                <input type="file" name="parceiro-img" id="pimg" accept="image/*" hidden>
                            </div>
                            <div class="right">
                                <input type="text" name="parceiro-nome" placeholder="Nome">
                                <input type="text" name="parceiro-area" placeholder="Area de atuacao">
                                <input type="text" name="parceiro-contacto" placeholder="Contacto">
                            </div>
                        </div>
                        <textarea rows="7" name="parceiro-descript" id="" placeholder="Descrição"></textarea>
                        <br>
                        <br>
                        <button type="submit" class="sub">Adicionar Parceiro</button>
                    </form>
                </div>
                <div class="fields">
                    <form action="/sigenv/evento/create" method="POST">
                        <input type="text" name="lotacao" placeholder="Lotação">
                        <input type="text" name="local" id="" placeholder="Local">
                        <input type="text" name="sala" id="" placeholder="Sala">
                        <br>
                        <br>
                        <button type="submit" class="sub parceiro">Actualizar detalhes</button>
                    </form>
                </div>
                <?php
                    }
                ?>

            </div>
        </section>
    </main>
    
    <script src="/sigenv/public/js/script.js"></script>
    <script>
        const banner = document.getElementById("banner");
        const pBanner = document.getElementById("previewBanner");
        banner.addEventListener('change', function() {
            const files = this.files;

            if (files.length > 0) {
                const file = files[0];
                const reader = new FileReader();

                // Quando a leitura do arquivo estiver completa
                reader.onload = function(e) {
                    // Define a URL da imagem no src do elemento <img>
                    pBanner.src = e.target.result;
                }
                // Lê o arquivo como uma Data URL
                reader.readAsDataURL(file);
            }
        });
        const oimg = document.getElementById("oimg");
        const poimg = document.getElementById("previewOrador");
        oimg.addEventListener('change', function() {
            const files = this.files;

            if (files.length > 0) {
                const file = files[0];
                const reader = new FileReader();

                // Quando a leitura do arquivo estiver completa
                reader.onload = function(e) {
                    // Define a URL da imagem no src do elemento <img>
                    poimg.src = e.target.result;
                }
                // Lê o arquivo como uma Data URL
                reader.readAsDataURL(file);
            }
        });
        const pimg = document.getElementById("pimg");
        const ppimg = document.getElementById("previewParceiro");
        pimg.addEventListener('change', function() {
            const files = this.files;

            if (files.length > 0) {
                const file = files[0];
                const reader = new FileReader();

                // Quando a leitura do arquivo estiver completa
                reader.onload = function(e) {
                    // Define a URL da imagem no src do elemento <img>
                    ppimg.src = e.target.result;
                }
                // Lê o arquivo como uma Data URL
                reader.readAsDataURL(file);
            }
        });

        $('.addSpeaker').click(function(){
            $('.orador-form').css('display', 'block');
        });
        $('.sub.orador').click(function(){
            $('.orador-form').css('display', 'none');
        });

        $('.addPartner').click(function(){
            $('.parceiro-form').css('display', 'block');
        });
        $('.sub.parceiro').click(function(){
            $('.parceiro-form').css('display', 'none');
        });

    </script>
</body>
</html>