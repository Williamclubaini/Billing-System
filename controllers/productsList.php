<?php 
declare(strict_types = 1);

namespace Controllers;

class ProductsList extends Resources{
    
    
    /**
     * Document
     *
     * @return void
     */
    public function Document()
    {
        $this->view('controllers/session', [0]);
        $this->view('views/templates/header');
        $this->view('views/templates/dashboard-header');
        $this->view('views/templates/sidebar');
        $this->view('views/pages/products', $this->getData('products'));
        $this->view('views/templates/footer');
    }
}