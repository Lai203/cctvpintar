<?php
// This is the Login controller for CodeIgniter.
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		// Set the validation rules for the login form.
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		// If the validation fails, load the login view.
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = 'Login';
			customer_template('login/login', $data);
		} else {
			// If the validation passes, attempt to log the user in.
			$this->_login();
		}
	}

	private function _login()
	{
		// Get the email and password from the login form.
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		// Query the database for the user with the specified email.
		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		// If the user exists, check if they are active.
		if ($user) {
			if ($user['active'] == 1) {
				// If the user is active, check if the password is correct.
				if ($user['email'] == $email && $user['password'] == $password) {
					// If the password is correct, log the user in.
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);

					// Redirect the user to the appropriate page based on their role.
					if ($user['role_id'] == 1) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					// If the password is incorrect, set a flash message and redirect the user to the login page.
					$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
                        Wrong password</div>');
					redirect('login');
				}
			} else {
				// If the user is not active, set a flash message and redirect the user to the login page.
				$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
                    Email has been not been activated</div>');
				redirect('login');
			}
		} else {
			// If the user does not exist, set a flash message and redirect the user to the login page.
			$this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">
                Email is not registered</div>');
			redirect('login');
		}
	}
}
