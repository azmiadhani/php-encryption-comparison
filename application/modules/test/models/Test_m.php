<?php
class Test_m extends CI_Model
{

    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        parent::__construct();
    }

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

    //! openssl 
    function azcrypt($mode, $string, $key, $ciphering)
    {
        // Store cipher method 
        // $ciphering = "AES-256-CBC";
        // $ciphering = "camellia-256-cbc";

        $options = 0;
        $encryption_iv = '1122334455667788';
        if ($mode == 'encrypt') {
            $encryption = openssl_encrypt(
                $string,
                $ciphering,
                $key,
                $options,
                $encryption_iv
            );
            return $encryption;
        } else if ($mode == 'decrypt') {
            $decryption = openssl_decrypt(
                $string,
                $ciphering,
                $key,
                $options,
                $encryption_iv
            );
            return $decryption;
        }
    }
}
