<?php 
declare(strict_types = 1);

namespace Controllers;

class OrdersList extends Resources{
    
    public function customer_name($id)
    {
        return $this->getSpecificData('users', 'id', $id);
    }
    /**
     * Document
     *
     * @return void
     */
    public function Document()
    {
        $this->view('controllers/session', [0]);
        $this->view('controllers/logout');
        $this->view('views/templates/header');
        $this->view('views/templates/dashboard-header');
        $this->view('views/templates/sidebar');
        $this->view('views/pages/orderlist', $this->getData('orders'));
        $this->view('views/templates/footer');
    }
}