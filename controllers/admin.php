<?php 
declare(strict_types = 1);

namespace Controllers;

class Admin extends User{
        
        
    /**
     * Document
     *
     * @return void
     */
    public function Document()
    {
        $this->view('views/templates/header');
        $this->view('views/pages/login', $this->login(0));
        $this->view('views/templates/footer', [1]);
    }
}