<?php
class Transaction {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function addTransaction($data){ 
        //Query para accesar clase y Db en PDO 
        $this->db->query('INSERT INTO transactions (id, nombre, apellido, email, telefono, costo_traslado, costo_reserva, pago_efectivo, origen, destino, fecha, hora, num_pasajeros, nombres_pasajeros, asientos_bebe, paradas, detalles_adicionales) VALUES(:id, :nombre, :apellido, :email, :telefono, :costo_traslado, :costo_reserva, :pago_efectivo, :origen, :destino, :fecha, :hora, :num_pasajeros, :nombres_pasajeros, :asientos_bebe, :paradas, :detalles_adicionales)');

        //Binding 
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':apellido', $data['apellido']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':telefono', $data['telefono']);
        $this->db->bind(':costo_traslado', $data['costo_traslado']);
        $this->db->bind(':costo_reserva', $data['costo_reserva']);
        $this->db->bind(':pago_efectivo', $data['pago_efectivo']);
        $this->db->bind(':origen', $data['origen']);
        $this->db->bind(':destino', $data['destino']);
        $this->db->bind(':fecha', $data['fecha']);
        $this->db->bind(':hora', $data['hora']);
        $this->db->bind(':num_pasajeros', $data['num_pasajeros']);
        $this->db->bind(':nombres_pasajeros', $data['nombres_pasajeros']);
        $this->db->bind(':asientos_bebe', $data['asientos_bebe']);
        $this->db->bind(':paradas', $data['paradas']);
        $this->db->bind(':detalles_adicionales', $data['detalles_adicionales']);

        //Ejecutar
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getTransactions(){
        $this->db->query('SELECT * FROM transactions ORDER BY fecha_transaccion DESC');
        $results = $this->db->resultset();

        return $results;
    }
}