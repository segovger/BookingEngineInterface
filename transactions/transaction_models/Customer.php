<?php
class Customer {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function addCustomer($data){ 
        //Query para accesar clase y Db en PDO 
        $this->db->query('INSERT INTO clients (id, first_name, last_name, email, amount) VALUES(:id, :first_name, :last_name, :email, :amount)');

        //Binding 
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':amount', $data['amount']);

        //Ejecutar
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getCustomers(){
        $this->db->query('SELECT * FROM clients ORDER BY transaction_time DESC');
        $results = $this->db->resultset();

        return $results;
    }
}