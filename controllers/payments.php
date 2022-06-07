<?php 
declare(strict_types = 1);

namespace Controllers;

class Payments extends Resources{

    public function Document()
    {
        $this->view('controllers/session', [1]);
        $this->view('controllers/logout');
        $this->view('views/templates/header');
        $this->view('views/templates/dashboard-header');
        $this->view('views/templates/sidebar');
        $this->view('views/pages/payments');
        $this->view('views/templates/footer');
    }
}