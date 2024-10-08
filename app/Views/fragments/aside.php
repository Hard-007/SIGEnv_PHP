
<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    if($_SESSION['category'] == "superadmin"){
        echo"
            <aside>
                <ul>
                    <li>
                        <a href='/sigenv/home'>
                            <img src='/sigenv/public/img/icon/dashboard.svg' alt='icon'>
                            <b>Dashboard</b>
                        </a>
                    </li>
                    <li>
                        <a href='/sigenv/evento'>
                            <img src='/sigenv/public/img/icon/calendar.svg' alt='icon'>
                            <b>Eventos</b>
                        </a>
                    </li>
                    <li>
                        <a href='/sigenv/inscricoes'> 
                            <img src='/sigenv/public/img/icon/form.svg' alt='icon'>
                            <b>Minhas Inscrições</b>
                        </a>
                    </li>
                    <li>
                        <a href='/sigenv/oradores'> 
                            <img src='/sigenv/public/img/icon/speech.svg' alt='icon'> 
                            <b>Oradores</b>
                        </a>
                    </li>
                    <li>
                        <a href='/sigenv/parceiros'> 
                            <img src='/sigenv/public/img/icon/handshake.svg' alt='icon'> 
                            <b>Parceiros</b>
                        </a>
                    </li>
                </ul>
            </aside>
        ";
    }
    else if($_SESSION['category'] == "admin"){
        echo"
            <aside>
                <ul>
                    <li>
                        <a href='/sigenv/home'>
                            <img src='/sigenv/public/img/icon/dashboard.svg' alt='icon'>
                            <b>Dashboard</b>
                        </a>
                    </li>
                    <li>
                        <a href='/sigenv/evento'>
                            <img src='/sigenv/public/img/icon/calendar.svg' alt='icon'>
                            <b>Eventos</b>
                        </a>
                    </li>
                    <li>
                        <a href='/sigenv/inscricoes'> 
                            <img src='/sigenv/public/img/icon/form.svg' alt='icon'>
                            <b>Minhas Inscrições</b>
                        </a>
                    </li>
                </ul>
            </aside>
        ";
    }
    else{
        echo"
            <aside>
                <ul>
                    <li>
                        <a href='/sigenv/evento'> 
                            <img src='/sigenv/public/img/icon/calendar.svg' alt='icon'>
                            <b>Eventos</b>
                        </a>
                    </li>
                    <li>
                        <a href='/sigenv/inscricoes'> 
                            <img src='/sigenv/public/img/icon/form.svg' alt='icon'>
                            <b>Minhas Inscrições</b>
                        </a>
                    </li>
                </ul>
            </aside>
        ";
    }

?>