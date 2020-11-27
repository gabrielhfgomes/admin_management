<?php

    class ClientModel{
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }
    
        public function addClient($data)
        {
            $this->db->query('INSERT INTO clients (name, birth_date, CPF, RG, phone) values (:name, :birth_date, :CPF, :RG, :phone)');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':birth_date', $data['birth_date']);
            $this->db->bind(':CPF', $data['CPF']);
            $this->db->bind(':RG', $data['RG']);
            $this->db->bind(':phone', $data['phone']);
            if ( $this->db->execute() ) {
                return true;
            } else {
                return false;
            }
        }
    
        public function deleteClient($id)
        {
            $this->db->query('DELETE FROM clients where id = :id');
            $this->db->bind(':id', $id);
            if( $this->db->execute() ){
                return true;
            } else {
                return false;
            }
        }

        public function updateClient($data)
        {
            $this->db->query('UPDATE clients SET name = :name, birth_date = :birth_date, CPF = :CPF, RG = :RG, phone = :phone where id = :id');
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':birth_date', $data['birth_date']);
            $this->db->bind(':CPF', $data['CPF']);
            $this->db->bind(':RG', $data['RG']);
            $this->db->bind(':phone', $data['phone']);
            $this->db->bind(':id', $data['id']);
            if( $this->db->execute() ){
                return true;
            } else {
                return false;
            }
        }

        public function getClientById($id)
        {
            $this->db->query('SELECT * FROM clients WHERE id = :id');
            $this->db->bind(':id', $id);
            return $this->db->single();
        }

        public function getClients()
        {
            $this->db->query('SELECT * FROM clients');
            return $this->db->resultSet();
        }
    }