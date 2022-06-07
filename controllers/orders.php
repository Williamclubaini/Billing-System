<?php 
declare(strict_types = 1);

namespace Controllers;

class Orders extends Resources{

    private function order()
    {
        if(isset($_GET['orderId']))
        {
            sleep(1);
            $request = $this->getData('invoice_request');
            $key = array_search($_GET['orderId'], array_column($request, 'order_id'));

            if(gettype($key) === 'boolean'){

                $query = $this->Model()->insertInto('invoice_request', array('order_id'));
                $this->Model()->execute($query, [$_GET['orderId']]);
                $data['msg'] = 'Invoice request successfully sent';
                $data['icon'] = 'success';
                return $data;
                
            } else {
                
                $data['msg'] = 'You have already requested an Invoice for this order';
                $data['icon'] = 'warning';
                return $data;
            }
        }
    }
    
    public function Document()
    {
        $this->view('controllers/session', [1]);
        $this->view('controllers/logout');
        $this->view('views/templates/header');
        $this->view('views/templates/dashboard-header');
        $this->view('views/templates/sidebar');
        $this->view('views/pages/customer_orders',$this->getSpecificData('orders', 'customer_id', USERID), $this->order());
        $this->view('views/templates/footer');
    }
}