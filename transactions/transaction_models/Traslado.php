<?php
class Traslado {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function addTraslado($data){ 
        //Query para accesar clase y Db en PDO 
        $this->db->query('INSERT INTO traslados (id, costo_reserva, costo_traslado, pago_pendiente) VALUES(:id, :costo_reserva, :costo_traslado, pago_pendiente)');

        //Binding 
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':costo_reserva', $data['costo_reserva']);
        $this->db->bind(':costo_traslado', $data['costo_traslado']);
        $this->db->bind(':pago_pendiente', $data['pago_pendiente']);

        //Ejecutar
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

   /*
   public function getTraslado(){
        $this->db->query('SELECT * FROM traslados ORDER BY created_at DESC');
        $results = $this->db->resultset();

        return $results;
    }
   */
}