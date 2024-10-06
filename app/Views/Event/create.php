<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - Criar</title>
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/jquery-3.7.1.min.js"></script>

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
        fieldset{
            border: none;
            border-radius: 0 .4em .4em .4em;
            padding: .6em;
            display: flex;
            flex-direction: column;
            background-color: #0084ff;
        }
        fieldset input, fieldset select, fieldset textarea{
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
    </style>

</head>
<body>
<main class="main">
        <?php
            include "app/Views/fragments/aside.php";
        ?>
    
        <section class="show">
            <div class="sectionHeader">
                <h2>Cadastrar Evento</h2>
                <a href="/sigenv/evento"> Cancelar </a>
            </div>
            <div class="legends">
                <button id="info">Info. Geral</button>
                <button id="evento">Evento</button>
            </div>
            <div>
                <form action="/sigenv/evento/create" method="POST" enctype="multipart/form-data">
                    <fieldset class="fields">
                        <!-- <legend>Info. Geral</legend> -->
                         
                        <div class="flex">
                            <div>
                                <label for="banner" ><img src="public/img/icon/image.svg" alt="" id="previewBanner" class="preview"></label>
                                <input type="file" name="banner" id="banner" accept="image/*" hidden>
                            </div>
                            <div class="right">
                                <input type="text" name="tema" id="" placeholder="Tema">
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
                                <input type="text" name="resumo" placeholder="resumo">
                            </div>
                        </div>
                        <textarea rows="7" name="descricao" id="" placeholder="Descricao"></textarea>
                        
                    </fieldset>
                    <fieldset class="fields">
                        <!-- <legend>Evento</legend> -->

                        <input type="text" name="lotacao" placeholder="Lotação">
                        <input type="text" name="local" id="" placeholder="Local">
                        <input type="text" name="sala" id="" placeholder="Sala">                        
                        <br>
                        <br>
                        <br>
                        <button type="submit" class="sub">Cadastrar Evento</button>
                    </fieldset>

                </form>

            </div>
        </section>
    </main>
    
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

        $(".fields:eq(1)").hide();
        $("#info").css("background-color", "#0084ff");

        $("#info").click(()=>{
            $("#info").css("background-color", "#0084ff");
            $("#evento").css("background-color", "#fff");
            $(".fields:eq(0)").show();
            $(".fields:eq(1)").hide();
        });
        $("#evento").click(()=>{
            $("#evento").css("background-color", "#0084ff");
            $("#info").css("background-color", "#fff");
            $(".fields:eq(1)").show();
            $(".fields:eq(0)").hide();
        });
        
    </script>
</body>
</html>