<?php 
declare(strict_types = 1);

namespace Controllers;

class Register extends User{
    
    public function Document()
    {
        $this->view('views/templates/header');
        $this->view('views/pages/register', $this->register());
        $this->view('views/templates/footer', [1]);
    }
}