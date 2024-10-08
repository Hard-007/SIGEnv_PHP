<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['category'])){
    echo "
        <header>
    <h1>SIGEnvSci</h1>
    <nav>
        <ul>
            <li><a href='/sigenv/'>Inicio</a></li>
            <li><a href='/sigenv/entrar'>Entrar</a></li>
            <li><a href='/sigenv/registar'>Registar</a></li>
        </ul>
    </nav>
    </header>
    ";
}
else{
    $home = ($_SESSION['category'] == "superadmin") ? "<li><a href='/sigenv/home'><img src='/sigenv/public/img/icon/home.svg' alt=''><b>Home</b></a></li>" : "<li><a href='/sigenv/evento'><img src='/sigenv/public/img/icon/home.svg' alt=''><b>Home</b></a></li>";
    echo "
        <header>
    <h1>SIGEnvSci</h1>
    <nav>
        <ul>
            ".$home."
            <li>
                <img src='/sigenv/public/img/icon/notification.svg' alt=''>
                <b> Notificações </b>
            </li>
            <li>
                <img src='/sigenv/public/img/icon/user.svg' alt=''>
                <b>".$_SESSION['nome'].'. '.$_SESSION['apelido']."</b>
            </li>
            <li>
                <a href='/sigenv/exit'>
                    <img src='/sigenv/public/img/icon/logout.svg' alt=''>
                    <b> Sair </b>
                </a>
            </li>
        </ul>
    </nav>
    </header>
    ";
}
?>