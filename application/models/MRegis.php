<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MRegis extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function GoRegis($username, $password, $nama_lengkap, $email, $alamat)
    {
        // Lakukan operasi untuk menyimpan data ke database
        $data = array(
            'Username' => $username,
            'Password' => $password,
            'NamaLengkap' => $nama_lengkap,
            'Email' => $email,
            'Alamat' => $alamat
        );
        
        // Masukkan data ke dalam tabel 'user'
        return $this->db->insert('user', $data);
    }
}
?>
