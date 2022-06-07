<?php 
declare(strict_types = 1);

namespace Controllers;

class Request extends Resources{
    
    public function invoice_request()
    {
        $query = 'SELECT t1.order_id, t2.id, t2.customer_id, t2.product, t2.price,
                  t2.quantity, t2.total_cost, t2.status, t2.order_date, t3.firstname, t3.surname
                  FROM invoice_request AS t1
                  JOIN orders AS t2
                  ON t1.order_id = t2.id
                  JOIN users AS t3
                  ON t2.customer_id = t3.id
                  WHERE t2.status = ?';
        return $this->Model()->runQuery($query, ['pending']);
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
        $this->view('views/pages/request', $this->invoice_request());
        $this->view('views/templates/footer');
    }
}