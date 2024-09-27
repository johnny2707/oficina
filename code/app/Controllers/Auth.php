<?php namespace App\Controllers;

use App\Models\UsersModel;
use CodeIgniter\Debug\Toolbar\Collectors\Views;
use PhpOffice\PhpSpreadsheet\Calculation\Engineering\BitWise;
use PhpParser\Node\Expr\Empty_;

class Auth extends BaseController 
{   
    protected $session;
    protected $usersModel;
    protected $res;
    protected $data;
    protected $email;

    public function __construct() 
    {
        $this->session = \Config\Services::session();
        $this->usersModel = new UsersModel;
        $this->email = \Config\Services::email();
        
        $this->res = [
            'error' => FALSE,
            'popUpMessages' => array(),
            'staticMessages' => array()
        ];

        $this->data = [
            'activePage' => 'auth',
            'customCSS'  => '',
            'customJS'   => '<script src="'.base_url('assets/js/custom/auth.js?' . $_ENV['VERSION'] ).'"></script>'
        ];
    }

    public function index()
    {
        return view('html/auth/index', $this->data);
    }

    public function login()
    {
        $validationRules = [
            'email' => [
                'label' => 'email',
                'rules' => 'required|max_length[255]'
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required|max_length[255]'
            ]
        ];

        if (!$this->validate($validationRules)) 
        {
            $this->res['error'] = true;
            $validation = \Config\Services::validation();

            foreach ($validationRules as $field => $rules)
            {
                if ($validation->getError($field)) 
                {
                    $this->res['popUpMessages'][] = "O campo <b>{$rules['label']}</b> tem erros!";
                }
            }
        }
        else 
        {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $userData = $this->usersModel->getUserDataByEmail($email);

            if (empty($userData)) 
            {
                $this->res['error'] = true;
                $this->res['popUpMessages'][] = 'Não existe nenhum utilizador com esse email!';
            } 
            else 
            {
                if (!password_verify($password, $userData[0]['password']) || $userData[0]['deleted_at']!=NULL) 
                {
                    $this->res['error'] = true;
                    $this->res['popUpMessages'][] = 'O utilizador e a password não coincidem ou o utilizador está inativo.';
                }
                else
                {
                    $this->session->set([
                        'id'          => $userData[0]['id'],
                        'name'        => $userData[0]['name'],
                        'role'        => $userData[0]['role'],
                        'permissions' => json_decode($userData[0]['permissions'], true),
                    ]);

                    $this->res['popUpMessages'][] = 'Login efetuado com sucesso!';
                }
            }
        }

        return $this->response->setJSON($this->res);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('auth'));
    }

    public function recoverPassword()
    {
        return view('html/auth/recoverPassword', $this->data);
    }

    public function sendPasswordEmail()
    {
        $userEmail = $this->request->getPost('email');

        $emailBody = view('html/auth/emailTemplate', ['email' => $userEmail]);

        $this->email->setMailType('html');

        $this->email->setFrom('joao.coutinho.soares.07@gmail.com', 'johnny');
        $this->email->setTo($userEmail);

        $this->email->setSubject('password change');
        
        $this->email->setMessage($emailBody);

        if($this->email->send())
        {
            $this->res['popUpMessages'][] = 'Email enviado com sucesso!';
        }
        
        return $this->response->setJSON($this->res);
    }

    public function emailSentConfirmation($email)
    {
        return view('html/auth/emailSentConfirmation', ['email' => $email]);
    } 

    public function changePassword($email)
    {
        return view('html/auth/changePassword', ['email' => $email]);
    }

    public function updatePassword()
    {
        $password = $this->request->getPost('password');
        $passwordConfirm = $this->request->getPost('passwordConfirm');
        $email = $this->request->getPost('email');

        if($password === $passwordConfirm)
        {
            $validationRules = [
                'password' => [
                    'label' => 'password',
                    'rules' => 'required|max_length[255]'
                ],
                'passwordConfirm' => [
                    'label' => 'confirm password',
                    'rules' => 'required|max_length[255]'
                ]
            ];

            if(!$this->validate($validationRules))
            {
                $this->res['error'] = TRUE;

                $validation = \Config\Services::validation();
    
                foreach ($validationRules as $field => $rules) {
                    if ($validation->getError($field)) {
                        array_push($this->res['popUpMessages'], "The field <b>{$rules['label']}</b> has errors!");
                    }
                }
            }
            else
            {
                $userData = $this->usersModel->getUserDataByEmail($email);

                $this->usersModel->updateUser($userData[0]['id'], ['password' => password_hash($password, PASSWORD_DEFAULT)]);

                $this->res['popUpMessages'][] = 'Password atualizada com sucesso!';
            }
        }
        else
        {
            $this->res['error'] = TRUE;
            $this->res['popUpMessages'][] = 'Ocorreu um erro. As passwords não coincidem!';    
        }

        return $this->response->setJSON($this->res);
    }
}
