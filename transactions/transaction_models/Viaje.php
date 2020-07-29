<?php
class Viaje {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function addViaje($data){ 
        //Query para accesar clase y Db en PDO 
        $this->db->query('INSERT INTO viaje (id, customer_id, product, amount, currency, status) VALUES(:id, :customer_id, :product, :amount, :currency, status)');

        //Binding 
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':product', $data['product']);
        $this->db->bind(':amount', $data['amount']);
        $this->db->bind(':currency', $data['currency']);
        $this->db->bind(':status', $data['status']);

        //Ejecutar
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}