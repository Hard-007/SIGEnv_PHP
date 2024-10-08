<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar</title>
    <link rel="stylesheet" href="/sigenv/public/css/style.css">
    <style>
        body{
            background: url('/sigenv/public/img/event.png');
            background-size: cover;
        }
        header{
            height: 55px;
            backdrop-filter: blur(6px);
            background-color: transparent;
        }
        header nav ul{
            background-color: #fff;
            padding: .3em .7em;
            border-radius: .5em;
        }
        .title{
            position: absolute;
            right: 150px;
            bottom: 90px;
            color: #fff;
        }
        .logForm{
            top: 66px;
            height: 80vh;
            width: 40vw;
            padding-top: 4em;
            position: absolute;
            background-color: transparent !important;
            backdrop-filter: blur(6px);
            border-radius: 1em;
            
        }
        .logForm form{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .logForm form img{
            max-width: 280px;
        }
        .logForm form input, .logForm form select, .logForm form textarea{
            display: block;
            width: 350px;
            margin: .3em;
            padding: .6em 1em;
            font-size: 15px;
        }
        .logForm form fieldset{
            border: none;
            outline: none;
        }
        .logForm form #datas{
            display: flex;
            justify-content: space-around;
            width: 350px;
        }
        .logForm form #datas input{
            width: 140px;
            margin: .4em;
            padding: .3em .6em;
        }

        .logForm form button{
            padding: .6em .9em;
        }

    </style>
</head>
<body>
    <div class="logForm">
        <form action="/sigenv/registar" method="POST">
            <figure>
                <img src="/sigenv/public/img/upm.png" alt="UPM Logo">
            </figure>
            
            <input type="text" name="name" id="" placeholder="Nome">
            <input type="text" name="surname" id="" placeholder="Apelido">
            <input type="email" name="email" id="" placeholder="E-mail">
            <input type="password" name="passwd" id="" placeholder="Senha">

            <button type="submit">Registar</button>
        </form>
    </div>
    <div class="title">
        <h1>Sign In</h1>
    </div>
    <svg viewBox="0 0 508 243" width="100%" id="svgRect">
        <path d="m 0.12340044,243 c 0,0 123.38502956,-15.50917 202.87643956,-25.32608 H 304.00016 L 507.90619,0.38809981 507.81832,243 Z" style="fill:#0063ff;fill-opacity:1;stroke:none;stroke-width:0.381729px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1"/>
    </svg>
</body>
</html>