<?php
/**
 * @author Alfeu Xerinda <alfeuxirinda@gmail.com>
 * 
 */
    spl_autoload_register(function ($class) {
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        require_once __DIR__ . '/' . $class . '.php';
    });

    use app\core\Router;
    
    use app\Middlewares\AuthMidlleware;
    use app\Controllers\UserController;
    use app\Controllers\EventController;
    use app\Controllers\SubmissionController;
    use app\Controllers\SubscriptionController;
    use app\Controllers\SpeakerController;
    use app\Controllers\PartnerController;
    use app\Controllers\DashboardController;

    //$router = new Router();

    include "app/Views/fragments/header.php";


    Router::get('/sigenv/', function() {
        include "public/index.php";
    });
    Router::get('/sigenv/home', function() {
        AuthMidlleware::handle();
        (new DashboardController())->dash();
        //include "app/Views/index.php";
    });
    Router::get('/sigenv/exit', function() {
        session_unset();
        session_destroy();
        header("Location: /sigenv");
    });
    Router::get('/sigenv/401', function() {
        include "app/Views/Error/401.php";
    });
    Router::get('/sigenv/404', function() {
        include "app/Views/Error/404.php";
    });
    Router::get('/sigenv/500', function() {
        include "app/Views/Error/500.php";
    });

    //Auth
    Router::get('/sigenv/entrar', function() {
        include "app/Views/auth/login.php";
    });
    Router::get('/sigenv/registar', function() {
        include "app/Views/auth/signin.php";
    });
    Router::post('/sigenv/entrar', function() {
        (new UserController())->login();
        
    });
    Router::post('/sigenv/registar', function() {
        (new UserController())->signin();
        
    });


    //inscrever participantes passivos
    Router::get('/sigenv/inscricoes/create/{id}', function($id) {
        AuthMidlleware::login();
        (new SubscriptionController())->createSubscription($id);
    });
    Router::get('/sigenv/inscricoes/list', function() {
        AuthMidlleware::login();
        (new SubscriptionController())->listSubscription();
    });
    Router::get('/sigenv/inscricoes', function() {
        AuthMidlleware::login();
        (new SubscriptionController())->mySubscription();
    });
    
    //inscrever participantes ativos
    Router::post('/sigenv/submissoes/create/{id}', function($id) {
        AuthMidlleware::login();
        (new SubmissionController())->createSubmission($id);
    });
    Router::get('/sigenv/submissoes/list/{id}', function($id) {
        AuthMidlleware::login();
        (new SubmissionController())->listSubmission($id);
    });
    Router::get('/sigenv/submissoes/{id}/{idE}', function($id, $idE) {
        AuthMidlleware::login();
        (new SubmissionController())->showSubmission($id, $idE);
    });
    Router::get('/sigenv/statistics/id/{id}', function($id) {
        AuthMidlleware::login();
        (new SubmissionController())->statistics($id);
    });

    Router::get('/sigenv/check/{id}/{idE}', function($id, $idE) {
        AuthMidlleware::login();
        (new SubscriptionController())->check($id, $idE);
    });
    Router::get('/sigenv/uncheck/{id}/{idE}', function($id, $idE) {
        AuthMidlleware::login();
        (new SubscriptionController())->uncheck($id, $idE);
    });
    Router::get('/sigenv/accept/{id}/{idE}', function($id, $idE) {
        AuthMidlleware::login();
        (new SubmissionController())->accept($id, $idE);
    });
    Router::get('/sigenv/reject/{id}/{idE}', function($id, $idE) {
        AuthMidlleware::login();
        (new SubmissionController())->reject($id, $idE);
    });
    

    //Evento
    Router::get('/sigenv/evento', function() {
        AuthMidlleware::login();
        (new EventController())->listEvent();
    });
    Router::get('/sigenv/evento/create', function() {
        AuthMidlleware::handle();
        include "app/Views/Event/create.php";
    });
    Router::get('/sigenv/evento/{id}', function($id) {
        AuthMidlleware::login();
        (new EventController())->showEvent($id);
    });
    Router::get('/sigenv/evento/edit/{id}', function($id) {
        AuthMidlleware::handle();
        (new EventController())->editEvent($id);
    });
    Router::get('/sigenv/evento/details/{id}', function($id) {
        AuthMidlleware::login();
        (new EventController())->showDetails($id);
    });

    Router::post('/sigenv/evento/create', function() {
        AuthMidlleware::handle();
        (new EventController())->createEvent();
    });
    Router::put('/sigenv/evento/edit/{id}', function($id) {
        AuthMidlleware::handle();
        (new EventController())->updateEvent($id);
    });
    Router::delete('/sigenv/evento/delete/{id}', function($id) {
        AuthMidlleware::handle();
        (new EventController())->deleteEvent($id);
    });

    //Orador
    Router::get('/sigenv/oradores', function() {
        AuthMidlleware::login();
        (new SpeakerController())->showAll();
    });
    Router::get('/sigenv/oradores/create', function() {
        AuthMidlleware::handle();
        include "app/Views/Speaker/create.php";
    });
    Router::post('/sigenv/oradores/create', function() {
        AuthMidlleware::login();
        (new SpeakerController())->create();
    });
    //Parceiro
    Router::get('/sigenv/parceiros', function() {
        AuthMidlleware::login();
        (new PartnerController())->showAll();
    });
    Router::get('/sigenv/parceiros/create', function() {
        AuthMidlleware::handle();
        include "app/Views/Partner/create.php";
    });
    Router::post('/sigenv/parceiros/create', function() {
        AuthMidlleware::login();
        (new PartnerController())->create();
    });

    (new Router)->run();