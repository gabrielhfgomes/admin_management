<?php

    class AddressModel{
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function addAddress($data)
        {
            $sql = "INSERT INTO address (id_client, description, cep, street, number, neighborhood, city, state, country) 
                values (:id_client, :description, :cep, :street, :number, :neighborhood, :city, :state, :country)";
            $this->db->query($sql);
            $this->db->bind(':id_client', $data['clientId']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':cep', $data['cep']);
            $this->db->bind(':street', $data['street']);
            $this->db->bind(':number', $data['number']);
            $this->db->bind(':neighborhood', $data['neighborhood']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':state', $data['state']);
            $this->db->bind(':country', $data['country']);
            if ( $this->db->execute() ) {
                return true;
            } else {
                return false;
            }
        }
    
        public function deleteAddress($id)
        {
            $this->db->query('DELETE FROM address where id = :id');
            $this->db->bind(':id', $id);
            if( $this->db->execute() ){
                return true;
            } else {
                return false;
            }
        }

        public function updateAddress($data)
        {
            $sql = "UPDATE address SET id_client = :id_client, description = :description, 
                cep = :cep, street = :street, number = :number, neighborhood = :neighborhood, city = :city, 
                state = :state, country = :country where id = :id";
             $this->db->query($sql);
            $this->db->bind(':id_client', $data['clientId']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':cep', $data['cep']);
            $this->db->bind(':street', $data['street']);
            $this->db->bind(':number', $data['number']);
            $this->db->bind(':neighborhood', $data['neighborhood']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':state', $data['state']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':id', $data['id']);
            if( $this->db->execute() ){
                return true;
            } else {
                return false;
            }
        }

        public function getAddressById($id) {
            $this->db->query('SELECT * FROM address WHERE id = :id');
            $this->db->bind(':id', $id);
            return $this->db->single();
        }

        public function getAdressesByClient($clientId)
        {
            $this->db->query('SELECT * FROM address where id_client = :id_client');
            $this->db->bind('id_client', $clientId);
            return $this->db->resultSet();
        }
    }