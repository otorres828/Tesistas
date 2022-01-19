<?php

namespace App\Controllers\escuela;

use App\Models\Auth;
use \Core\View;

class EscuelaController extends \Core\Controller{

    public function index() {
        View::render('escuela/index.php');
    }

}
