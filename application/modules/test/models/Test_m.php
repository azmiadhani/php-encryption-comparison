<?php
class Test_m extends CI_Model
{

    public $title;
    public $content;
    public $date;

    public function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    function generateRand($limit)
    {
        $code = '';
        for ($i = 0; $i < $limit; $i++) {
            $code .= mt_rand(0, 9);
        }
        return $code;
    }

    function azcrypt($mode, $string, $key)
    {
        // Store cipher method 
        $ciphering = "AES-256-CBC";
        $options = 0;
        $encryption_iv = '1122334455667788';
        if ($mode == 'encrypt') {
            $encryption = urlencode(base64_encode(openssl_encrypt(
                $string,
                $ciphering,
                $key,
                $options,
                $encryption_iv
            )));
            return $encryption;
        } else if ($mode == 'decrypt') {
            $decryption = openssl_decrypt(
                base64_decode($string),
                $ciphering,
                $key,
                $options,
                $encryption_iv
            );
            return $decryption;
        }
    }

    function getCSV()
    {
        $data = file_get_contents(base_url('assets/pilihanEnkripsi.csv'));
        $rows = explode("\n", $data);
        $s = array();
        foreach ($rows as $row) {
            $s[] = str_getcsv($row)[0];
        }

        return $s;
    }
}
