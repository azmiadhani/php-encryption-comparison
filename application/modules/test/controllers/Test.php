<?php defined('BASEPATH') or exit('No direct script access allowed');

class Test extends MY_Controller
{
	private $encriptionKey = "PTIKULM";
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Test_m', 'test');
	}

	public function index()
	{
		$start = microtime(true);

		$result['data'] = $this->do();
		$time_elapsed_secs = microtime(true) - $start;
		$result['time'] = $time_elapsed_secs;
		$pkg = ['result' => $result];
		$this->load->view('test_v', $pkg);
		// echo " It takes " . $time_elapsed_secs . " seconds to execute the script";
	}

	public function do()
	{
		$listPilihan = $this->test->getCSV();

		// $this->load->view('test_v');
		$result = [];
		foreach ($listPilihan as $pilihan) {
			$pilihan = json_encode(array('randomnum' => $this->test->generateRand(3), 'waktu' => (new DateTime())->format('Y-m-d H:i:s'), 'pilihan' => 1));
			$encrypted = $this->test->azCrypt(
				'encrypt',
				$pilihan,
				$this->encriptionKey
			);
			$decrypted = $this->test->azCrypt(
				'decrypt',
				$encrypted,
				$this->encriptionKey
			);
			$result[] = [
				'pilihan' => $pilihan,
				'encrypted' => $encrypted,
				'decrypted' => $decrypted,
			];
		}
		return $result;
	}
}
