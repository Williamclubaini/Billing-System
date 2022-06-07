<?php 
declare(strict_types = 1);

namespace Controllers;

class Home extends Resources{

    private int $userType = 1;
    /**
     * data
     *
     * @return array
     */
    private function data()
    {
        $data[1] = 'Total Orders';
        $data[2] = 'Paid Invoices';
        $data[3] = 'Total Products';
        $data[4] = 'Total Invoices';
        $data['data-1'] = $this->countRecords('orders', 'customer_id', USERID);
        $data['data-2'] = $this->countRecords2('invoices', 'customer_id', 'status', array(USERID, 'paid'));
        $data['data-3'] = $this->countAllRecords('products');
        $data['data-4'] = $this->countRecords('invoices', 'customer_id', USERID);
        $data['data-5'] = $this->countRecords2('invoices', 'customer_id', 'status', array(USERID, 'unpaid'));

        return $data;
    }
        
    /**
     * Document
     *
     * @return void
     */
    public function Document()
    {
        $this->view('controllers/session', [$this->userType]);
        $this->view('controllers/logout');
        $this->view('views/templates/header');
        $this->view('views/templates/dashboard-header');
        $this->view('views/templates/sidebar');
        $this->view('views/templates/hero-header', $this->data()['data-5']);
        $this->view('views/templates/accounts-bars', $this->data());
        $this->view('views/templates/footer');
    }
}