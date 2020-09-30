<?php
class Grupos {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function addGrupos($data){ 
        //Query para accesar clase y Db en PDO 
        $this->db->query('INSERT INTO group_trips (nombre_representante, nombre_evento, motivo_evento, email, telefono, servicios_requeridos, punto_partida, fecha_partida, lugar_destino, fecha_llegada, numero_personas, detalles) VALUES(:nombre_representante, :nombre_evento, :motivo_evento, :email, :telefono, :servicios_requeridos, :punto_partida, :fecha_partida, :lugar_destino, :fecha_llegada, :numero_personas, :detalles)');

        //Binding 
        $this->db->bind(':nombre_representante', $data['nombre_representante']);
        $this->db->bind(':nombre_evento', $data['nombre_evento']);
        $this->db->bind(':motivo_evento', $data['motivo_evento']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':telefono', $data['telefono']);
        $this->db->bind(':servicios_requeridos', $data['servicios_requeridos']);
        $this->db->bind(':punto_partida', $data['punto_partida']);
        $this->db->bind(':fecha_partida', $data['fecha_partida']);
        $this->db->bind(':lugar_destino', $data['lugar_destino']);
        $this->db->bind(':fecha_llegada', $data['fecha_llegada']);
        $this->db->bind(':numero_personas', $data['numero_personas']);
        $this->db->bind(':detalles', $data['detalles']);

        //Ejecutar
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getGrupos(){
        $this->db->query('SELECT * FROM group_trips ORDER BY transaction_time DESC');
        $results = $this->db->resultset();

        return $results;
    }
}