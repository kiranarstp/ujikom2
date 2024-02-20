<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MSudi extends CI_Model
{
    function AddData($tabel, $data=array())
    {
        $this->db->insert($tabel,$data);
    }

    function UpdateData($tabel,$fieldid,$fieldvalue,$data=array())
    {
        $this->db->where($fieldid,$fieldvalue)->update($tabel,$data);
    }

    function DeleteData($tabel,$fieldid,$fieldvalue)
    {
        $this->db->where($fieldid,$fieldvalue)->delete($tabel);
    }

    function GetData($tabel)
    {
        $query= $this->db->get($tabel);
        return $query->result();
    }

    function GetDataWhere($tabel,$id,$nilai)
    {
        $this->db->where($id,$nilai);
        $query= $this->db->get($tabel);
        return $query;
    }
    function GetCariInformasi($cari)
    {
        $query = $this->db->query("Select * From info_warga where proposal like '%$cari%' ");
        return $query;
    }
	function GetAlbum($tabel)
	{
		$query = $this->db->query(
			"SELECT bk.AlbumID, bk.NamaAlbum, bk.Deskripsi, bk.TanggalDibuat, bk.UserID
			FROM album as bk"
		);
		return $query->result();
	}
	function GetPenduduk($tabel)
	{
		$query = $this->db->query(
			"SELECT pd.kd_penduduk, pd.nik, pd.nama
			FROM penduduk as pd"
		);
		return $query->result();
	}

    function LikeCount($FotoID)
    {
        $this->db->from('likefoto'); 
        $this->db->where('FotoID', $FotoID);
        return $this->db->count_all_results();
    }

    function DeleteLikeFoto($FotoID, $UserID)
    {
    $this->db->where('FotoID', $FotoID);
    $this->db->where('UserID', $UserID);
    $this->db->delete('likefoto');
    }

    // Ini versi baru
	function tambahKomentar($data)
	{
		$this->load->database();
		$this->db->insert('komentarfoto', $data);
	}

    // Ini Versi baru
	public function GettambahKomentarByFotoID($FotoID) {
		$this->db->select('k.IsiKomentar, u.Username');
		$this->db->from('komentarfoto k');
		$this->db->join('User u', 'u.userid = k.UserID');
		$this->db->where('k.FotoID', $FotoID);
		$query = $this->db->get();
		return $query->result_array();
	}
    
    public function getUsername($UserID) {
        $this->db->select('Username');
        $this->db->where('UserID', $UserID);
        $query = $this->db->get('User');
        return $query->row_array();
    }
    public function saveComment($FotoID, $IsiKomentar) {
        // Lakukan proses penyimpanan komentar ke basis data
        // Misalnya, menggunakan query SQL atau metode ORM jika Anda menggunakan framework
        // Contoh menggunakan query SQL:
        $sql = "INSERT INTO komentar (FotoID, IsiKomentar) VALUES (?, ?)";
        $this->db->query($sql, array($FotoID, $IsiKomentar));
    }
    
    
}
