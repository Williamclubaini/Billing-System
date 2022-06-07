<?php 
declare(strict_types = 1);

namespace Controllers;

class Form extends Resources{
    
    
    private function Pay()
    {
         
        if (isset($_POST['Pay'])) {

            sleep(3);
            $columns = array('customer_id', 'payment_method', 'invoice_id', 'account');
            $query = $this->Model()->insertInto('payments', $columns);
            $this->Model()->execute($query, [USERID, $_POST['payMethod'], $_POST['invoice_id'], $_POST['accNumber']]);
            $sql = $this->Model()->UWDW('invoices', array('status', 'paid_date'), 'customer_id', 'id');
            $this->Model()->execute($sql, ['paid', date('l, F d, Y'), USERID, $_POST['invoice_id']]);
            $data['msg'] = 'Transaction Completed Successfully';
            return $data;

        }

    }
    /**
     * Document
     *
     * @return void
     */
    public function Document()
    {
        $this->view('controllers/session', [1]);
        $this->view('controllers/logout');
        $this->view('views/templates/header');
        $this->view('views/templates/dashboard-header');
        $this->view('views/templates/sidebar');
        $this->view('views/pages/form', 
                    $this->SWDWC('invoices', 'customer_id', 'status', array(USERID, 'unpaid')), 
                    $this->Pay());
        $this->view('views/templates/footer');
    }
}