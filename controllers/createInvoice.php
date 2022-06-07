<?php 
declare(strict_types = 1);

namespace Controllers;

class CreateInvoice extends Resources{
    
    
    public function orders($id)
    {
        $data = $this->getSpecificData('orders', 'id', $id);

        $columns = array('customer_id', 'product', 'quantity', 'price', 'total_cost', 'status', 'paid_date');
        $invoice = array($data[0]->customer_id, $data[0]->product, $data[0]->quantity, $data[0]->price, 
                         $data[0]->total_cost, 'unpaid', 'NULL');
        $query = $this->Model()->insertInto('invoices', $columns);
        $this->Model()->execute($query, $invoice);
        $sql = $this->Model()->update('orders', array('status','order_date','ac_date'), 'id');
        $this->Model()->execute($sql, ['approved', $data[0]->order_date,  date('Y-m-d H:i:s'), $id]);
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
        $this->view('views/pages/create', $this->getData('orders'));
        $this->view('views/templates/footer');
    }
}