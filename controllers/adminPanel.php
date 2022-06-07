<?php 
declare(strict_types = 1);

namespace Controllers;

class AdminPanel extends Resources{

    /**
     * data
     *
     * @return array
     */
    private function data()
    {
        $data[1] = 'Orders';
        $data[2] = 'Sales';
        $data[3] = 'Products';
        $data[4] = 'Invoices';
        $data['data-1'] = $this->countAllRecords('orders');
        $data['data-2'] = $this->countAllRecords('payments');
        $data['data-3'] = $this->countAllRecords('products');
        $data['data-4'] = $this->countAllRecords('invoices');

        return $data;
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
        $this->view('views/templates/hero-header', $this->data()['data-4']);
        $this->view('views/templates/accounts-bars', $this->data());
        $this->view('views/templates/footer');
    }
}