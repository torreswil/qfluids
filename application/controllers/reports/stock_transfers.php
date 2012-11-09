<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_transfers extends CI_Controller {
        
        public function __construct(){
                parent::__construct();
                $this->load->model('Api');    
        }                
        
        public function archive($stock='', $format='xls') {
                if($stock == '' || !is_numeric($stock)){
                        redirect('/');
                } else{                                                
                        $data = array();                                
                        //Selecciono los elementos del stock transfers
                        $data['movements'] = $this->Api->sql("SELECT * 
                                                                FROM stock_transfers 
                                                                INNER JOIN inventory_movements ON stock_transfers.id = inventory_movements.stock_transfer
                                                                WHERE stock_transfers.id = $stock");
                        $this->load->view('reports/stock_transfers_'.$format, $data);                        
                }
        }
}
