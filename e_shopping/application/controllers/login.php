<?php
class Login extends CI_Controller
{
  public function __construct()
    {
        parent::__construct();
    }

    //Show login form
  public function index()
  {
    $this->load->view('admin/includes/header');
    $this->load->view('login');
  }

  //Validate user data
  public function check_user()
  {
    if ($this->form_validation->run() == FALSE)
    {
      $this->index();
    }
    else
    {
      $password = create_password($this->input->post('password'));
      $user = $this->user_model->user_login($this->input->post('user_name'), $password);
      
      if($user)
      {
        $user_data = array('user_id' => $user['user_id'],'privilege' => $user['privilege']);
        $this->session->set_userdata($user_data);

        if($this->session->userdata('privilege') == 1)
        {
          redirect('user_profile');
        }
        else if($this->session->userdata('privilege') == 2)
        {
          redirect('manage_user');
        }
      }
      else 
      {
        $data['err_message'] = 'Invalid user name or password.';
        $data['user'] = $this->input->post('user_name');
        
        $this->views('system_views/login', $data);
      }
    }
  }
}
?>