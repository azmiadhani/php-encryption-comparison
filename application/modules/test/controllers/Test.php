<?php defined('BASEPATH') or exit('No direct script access allowed');

class Test extends MY_Controller
{
	private $encriptionKey = "PTIKULM"; // key for encription
	private $numberOfData = 100000; // number of how many dummy data
	private $loopCount = 10; // number of how many dummy data

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Test_m', 'test');
	}

	public function index($ciphering = NULL)
	{
		if ($ciphering) {
			// $listPilihan = $this->test->getCSV();
			$encryptTimeTotal = 0;
			$decryptTimeTotal = 0;
			for ($i = 0; $i < $this->loopCount; $i++) {

				// Encryption
				$encryptStart = microtime(true);
				$encrypted = $this->openssl_encrypt($this->numberOfData, $ciphering);
				$encryptTime = microtime(true) - $encryptStart;
				$encryptTimeTotal += $encryptTime;
				// Decryption
				$decryptStart = microtime(true);
				$decrypted = $this->openssl_decrypt($this->numberOfData, $ciphering, $encrypted);
				$decryptTime = microtime(true) - $decryptStart;
				$decryptTimeTotal += $decryptTime;
			}
			$encryptTimeAverage = $encryptTimeTotal / $this->loopCount;
			$decryptTimeAverage = $decryptTimeTotal / $this->loopCount;

			$pkg = [
				'numberOfData' => $this->numberOfData,
				'loopCount' => $this->loopCount,
				'encryptTimeAverage' => $encryptTimeAverage,
				'decryptTimeAverage' => $decryptTimeAverage,
			];

			// echo "<pre>";
			// print_r($pkg);
			// echo "</pre>";
			// die;

			$this->load->view('test_v', $pkg);
		} else {
			echo "<center><h2>Wajib menyertakan metode enkripsi</h2></center>";
		}

		// echo " It takes " . $time_elapsed_secs . " seconds to execute the script";
	}

	public function menu()
	{
		$this->load->view('test_menu_v', $pkg);
	}

	public function openssl_encrypt($numberOfData, $ciphering)
	{
		$result = [];
		for ($i = 0; $i < $numberOfData; $i++) {
			$pilihan = json_encode(array('randomnum' => $this->test->generateRand(3), 'waktu' => (new DateTime())->format('Y-m-d H:i:s'), 'pilihan' => 1));
			$encrypted = $this->test->azCrypt(
				'encrypt',
				$pilihan,
				$this->encriptionKey,
				$ciphering
			);
		}
		return $encrypted;
	}

	public function openssl_decrypt($numberOfData, $ciphering, $encrypted)
	{
		$result = [];
		for ($i = 0; $i < $numberOfData; $i++) {
			$decrypted = $this->test->azCrypt(
				'decrypt',
				$encrypted,
				$this->encriptionKey,
				$ciphering
			);
		}
		return $decrypted;
	}

	public function openssl($numberOfData, $ciphering)
	{
		// $this->load->view('test_v');
		$result = [];
		for ($i = 0; $i < $numberOfData; $i++) {
			$pilihan = json_encode(array('randomnum' => $this->test->generateRand(3), 'waktu' => (new DateTime())->format('Y-m-d H:i:s'), 'pilihan' => 1));
			$encrypted = $this->test->azCrypt(
				'encrypt',
				$pilihan,
				$this->encriptionKey,
				$ciphering
			);
			$decrypted = $this->test->azCrypt(
				'decrypt',
				$encrypted,
				$this->encriptionKey,
				$ciphering
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
