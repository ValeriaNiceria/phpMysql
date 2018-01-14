<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exemplo1 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Exemplo1_model', 'apelido_model');
    }

	public function index()
	{
        $dados['titulo'] = 'Hello World!';
        $dados['conteudo'] = 'Testando o CodeIgniter, minha primeira view!';
        $this->load->view('exemplo1', $dados);
    }
    
    public function login()
	{
        echo 'Executando método login do controller e passado o parâmetro ';
        echo $this->uri->segment(3);

        //Usando o model

        $this->apelido_model->salvar();
    }
    
    //http://localhost/phpMysql/framework_codeIgniter/ci/essencial/index.php/exemplo1/login
}
