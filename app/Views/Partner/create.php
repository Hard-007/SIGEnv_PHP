<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento - Criar</title>
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
            margin: .4em;
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
                <h2>Cadastrar Parceiro</h2>
                <a href="/sigenv/parceiros"> Cancelar </a>
            </div>
            <div>
                <form action="/sigenv/parceiros/create" method="POST" enctype="multipart/form-data">
                    <fieldset class="fields">
                        <!-- <legend> Parceiros </legend> -->

                        <div class="flex">
                            <div>
                                <label for="oimg"><img src="/sigenv/public/img/icon/image.svg" alt="" id="previewParceiro" class="preview"></label>
                                <input type="file" name="parceiro-img" id="" accept="image/*" hidden>
                            </div>
                            <div class="right">
                                <input type="text" name="parceiro-nome" placeholder="Nome">
                                <input type="text" name="parceiro-area" placeholder="Area de atuacao">
                                <input type="text" name="parceiro-contacto" placeholder="Contacto">
                            </div>
                        </div>
                        <textarea rows="5" name="parceiro-descript" id="" placeholder="Descrição"></textarea>

                        <br>
                        <br>
                        <button type="submit" class="sub">Cadastrar Parceiro</button>
                    </fieldset>

                </form>

            </div>
        </section>
    </main>
    
    <script>
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
    </script>
</body>
</html>