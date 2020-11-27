<?php


class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $users = $this->userModel->getUsers();
        $data = [
            'users' => $users
        ];
        return $this->view('users/index', $data);
    }

    private function validateFieldsForRegistration() {
        $data = [
            'name' => trim($_POST['name']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'confirm_password' => trim($_POST['confirm_password']),
            'name_err' => '',
            'email_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
        ];

        if (empty($data['email'])) {
            $data['email_err'] = 'Please inform your email';
        } else {
            if ($this->userModel->getUserByEmail($data['email'])) {
                $data['email_err'] = 'Email is already in use. Choose another one!';
            }
        }

        if (empty($data['name'])) {
            $data['name_err'] = 'Please inform your name';
        }

        if (empty($data['password'])) {
            $data['password_err'] = 'Please inform your password';
        } elseif (strlen($data['password']) < 6) {
            $data['password_err'] = 'Password must be at least 6 characters';
        }

        if (empty($data['confirm_password'])) {
            $data['confirm_password_err'] = 'Please inform your password';
        } else if ($data['password'] != $data['confirm_password']) {
            $data['confirm_password_err'] = 'Password does not match!';
        }

        return $data;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];
            $data = $this->validateFieldsForLogin($data);
            if (empty($data['email_err']) && empty($data['password_err'])) {
                $loginInfo = $this->userModel->getloginInfo($data['email']);
                $userAuthenticated = validatePassword($data['password'], $loginInfo);
                if ($userAuthenticated && $loginInfo) {
                    $this->createUserSession($loginInfo);
                } else {
                    $data = [
                        'email' => trim($_POST['email']),
                        'password' => '',
                        'email_err' => 'Email or Password are incorrect',
                        'password_err' => 'Email or Password are incorrect',
                    ];
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];
            $this->view('users/login', $data);
        }
    }

    private function validateFieldsForLogin($data) {
        if (empty($data['email'])) {
            $data['email_err'] = 'Please inform your email';
        } else if (!$this->userModel->getUserByEmail($data['email'])) {
            $data['email_err'] = 'No user found!';
        }

        if (empty($data['password'])) {
            $data['password_err'] = 'Please inform your password';
        }
        return $data;
    }


    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_mail']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    private function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('clients');
    }

    public function changePassword()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = $this->validateFieldsForPasswordChange();

            if (empty($data['password_old_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->updatePassword($data)) {
                    flash('register_success', 'Password updated!');
                    redirect('clients');
                } else {
                    die ('Something wrong');
                }
            } else {
                $this->view('users/changepassword', $data);
            }
        } else {
            $data = [
                'email' => $_SESSION['user_email'],
                'password_old' => '',
                'password' => '',
                'confirm_password' => '',
                'password_old_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            $this->view('users/changepassword', $data);
        }
    }

    private function validateFieldsForPasswordChange() {
        $data = [
            'email' => $_SESSION['user_email'],
            'password_old' => trim($_POST['password_old']),
            'password' => trim($_POST['password']),
            'confirm_password' => trim($_POST['confirm_password']),
            'password_old_err' => '',
            'password_err' => '',
            'confirm_password_err' => ''
        ];

        if (empty($data['password_old'])) {
            $data['password_old_err'] = 'Please inform your old password';
        } elseif (strlen($data['password_old']) < 6) {
            $data['password_old_err'] = 'Password old must be at least 6 characters';
        } else if (!$this->userModel->checkPassword($data['email'], $data['password_old'])) {
            $data['password_old_err'] = 'Your old password is wrong!';
        }

        if (empty($data['password'])) {
            $data['password_err'] = 'Please inform your password';
        } elseif (strlen($data['password']) < 6) {
            $data['password_err'] = 'Password must be at least 6 characters';
        }

        if (empty($data['confirm_password'])) {
            $data['confirm_password_err'] = 'Please confirm your password';
        } else if ($data['password'] != $data['confirm_password']) {
            $data['confirm_password_err'] = 'Password does not match!';
        }
        return $data;
    }

}