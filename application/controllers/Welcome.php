<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
    }

    public function test()
    {
        echo "helloworld";
    }

    public function get_data()
    {
        $this->load->view('get_api');
    }

    public function show_curl_api()
    {
        $this->load->view('curl_api');
    }

    public function curl_get()
    {
        $base_url = 'http://web/test/json_hello/';
        $id = 1;

        $curl = curl_init();

        $option = [
                    CURLOPT_URL => $base_url.$id,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => false
                  ];

        curl_setopt_array($curl, $option);

        header('Content-Type: application/json; charset=utf-8');
        $response = curl_exec($curl);
        var_dump($response);

        curl_close($curl);
    }

    public function curl_post()
    {
        $base_url = 'http://web/test/json_hello';
        // $base_url = 'http://web/try/';

        $data = ['id' => 2];

        $curl = curl_init();

        $option = [
                    CURLOPT_URL => $base_url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_SSL_VERIFYPEER => false,
                    CURLOPT_SSL_VERIFYHOST => false,
                    CURLOPT_POST => true,
                    CURLOPT_POSTFIELDS => http_build_query($data),
                    CURLOPT_FOLLOWLOCATION => true
                  ];

        curl_setopt_array($curl, $option);

        $response = (array)json_decode(curl_exec($curl));
        var_dump($response);
        extract($response);
        echo $text;
    }

    public function curl()
    {
            $conn = curl_init();
            curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($conn, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($conn, CURLOPT_URL,  'http://web/try');
            // curl_setopt($conn, CURLOPT_POSTFIELDS, http_build_query($param));
            $result = curl_exec($conn);
            var_dump($result);
            curl_close($conn);
    }

    public function file_get()
    {
        $url = 'http://web/test/json_hello/2';
        header('Content-Type: application/json; charset=utf-8');
        $res = file_get_contents($url);
        var_dump($res);
    }

    public function php_cmd()
    {
        $res = exec('pwd');
        var_dump($res);
        mkdir('test');
    }

    public function php_info()
    {
        echo phpinfo();
    }
}
