<?php
namespace app\Controllers;

use app\Models\Event;
use app\Models\Partner;
use app\Models\Speaker;
use app\Models\Submission;
use app\Models\Subscription;
use app\Models\User;

class DashboardController{
    public $event;
    public $subscription;
    public $submission;
    public $speaker;
    public $partner;
    public $user;

    public function __construct(){
        $this->event = new Event();
        $this->subscription = new Subscription();
        $this->submission = new Submission();
        $this->speaker = new Speaker();
        $this->partner = new Partner();
        $this->user = new User();
    }

    public function dash(){
        //
        if($_SERVER['REQUEST_METHOD'] == "GET"){
            $eventos = $this->event->count();
            $inscritos = $this->subscription->count();
            $resumos = $this->submission->count();
            $oradores = $this->speaker->count();
            $parceiros = $this->partner->count();
            $utilizadores = $this->user->count();

            require "app/Views/index.php";
        }
    }

}

?>