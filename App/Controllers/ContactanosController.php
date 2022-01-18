<?php

namespace App\Controllers;

use App\Models\Teachings;

use \Core\View;

class ContactanosController extends \Core\Controller{

    public function index() {
        
        $contactanos = (new Teachings())->where('user_id','=',20)->where('status','=',2)->get();
        
        View::render('home/index.php', ['contactanos' => $contactanos]);
    }
    public function store(){
        echo $_POST['text1'] . " " . $_POST['text2'];
        //crear
        header("location:/");
    }
}
