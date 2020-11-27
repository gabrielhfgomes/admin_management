<?php


class Client extends Controller
{
    private $clientModel;

    public function __construct()
    {
        $this->clientModel = $this->model('ClientModel');
    }

    public function index()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $clients = $this->clientModel->getClients();
        $data = [
            'clients' => $clients
        ];
        return $this->view('client/index', $data);
    }

    private function validateFieldsForRegistration($action)
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        $data = [
            'name' => trim($_POST['name']),
            'birth_date' => $_POST['birth_date'],
            'CPF' => trim($_POST['CPF']),
            'RG' => trim($_POST['RG']),
            'phone' => trim($_POST['phone']),
            'name_err' => '',
            'birth_date_err' => '',
            'CPF_err' => '',
            'RG_err' => '',
            'phone_err' => ''
        ];

        if (empty($data['name'])) {
            $data['name_err'] = 'Please inform the name of the client';
        }

        if (empty($data['birth_date'])) {
            $data['birth_date_err'] = 'Please inform the birth date of the client';
        }

        if (empty($data['CPF'])) {
            $data['CPF_err'] = 'Please inform the CPF of the client';
        }

        if (empty($data['RG'])) {
            $data['RG_err'] = 'Please inform the RG of the client';
        }

        if (empty($data['phone'])) {
            $data['phone_err'] = 'Please inform the phone of the client';
        }

        return $data;
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $this->validateFieldsForRegistration('add');

            if (empty($data['name_err']) && empty($data['birth_date_err']) && empty($data['CPF_err']) && empty($data['RG_err']) && empty($data['phone_err'])) {
                $data['birth_date'] = DateTime::createFromFormat('d/m/Y', $data['birth_date'])->format('Y-m-d');
                if ($this->clientModel->addClient($data)) {
                    flash('client_message', 'Client created successfully!');
                    redirect('client/index');
                } else {
                    die ('Something wrong');
                }
            } else {
                $this->view('client/add', $data);
            }
        } else {
            $data = [
                'name' => '',
                'birth_date' => '',
                'CPF' => '',
                'RG' => '',
                'phone' => '',
                'name_err' => '',
                'birth_date_err' => '',
                'CPF_err' => '',
                'RG_err' => '',
                'phone_err' => ''
            ];
            $this->view('client/add', $data);
        }
    }

    public function edit($id)
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = $this->validateFieldsForRegistration('edit');

            if(!empty($id)){
                $data['id'] = $id;
            } else {
                $data['id'] = $_POST['id'];
            }

            if (empty($data['name_err']) && empty($data['birth_date_err']) && empty($data['CPF_err']) && empty($data['RG_err']) && empty($data['phone_err'])) {
                $data['birth_date'] = DateTime::createFromFormat('d/m/Y', $data['birth_date'])->format('Y-m-d');
                $data['id'] = $id;
                if ($this->clientModel->updateClient($data)) {
                    flash('client_message', 'Client updated successfully!');
                    redirect('client/index');
                } else {
                    die ('Something wrong');
                }
            } else {
                $this->view('client/edit', $data);
            }
        } else{
            $client = $this->clientModel->getClientById($id);

            $birthDate = null;
            if(!empty($client->birth_date)) {
                $birthDate = DateTime::createFromFormat('Y-m-d', $client->birth_date)->format('d/m/Y');
            }

            if(!empty($id)){
                $data['id'] = $id;
            } else {
                $data['id'] = $_POST['id'];
            }

            $data = [
                'id' => $data['id'],
                'name' => $client->name,
                'birth_date' => $birthDate,
                'CPF' => $client->cpf,
                'RG' => $client->rg,
                'phone' => $client->phone,
                'name_err' => '',
                'birth_date_err' => '',
                'CPF_err' => '',
                'RG_err' => '',
                'phone_err' => ''
            ];

            $this->view('client/edit', $data);
        }

    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->clientModel->deleteClient($id)) {
                flash('client_message', 'The client was removed successfully!');
                redirect('client');
            } else {
                flash('client_message', 'An error ocurred in client deletion');
                redirect('client');
            }
        } else {
            redirect('client');
        }
    }
}