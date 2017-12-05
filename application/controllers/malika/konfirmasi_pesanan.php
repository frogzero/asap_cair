<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi_pesanan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(array('model_komentar','model_produk','model_kategori','model_web','model_konsumen','model_pesanan'));
		$this->load->library('cart');
		$this->load->helper(array('form', 'url'));  
	}

	public function Konfirmasi($kodeBayar)
	{
		$this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './upload/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '3000'; //lebar maksimum 1288 px
        $config['max_height']  = '3000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if($_FILES['pic']['name'])
        {
            if ($this->upload->do_upload('pic'))
            {
				$data_konfirmasi= array(
										'catatan' => $catatan,
										'tanggal_konfirmasi' => $today,
										'status' => 'Sudah Konfirmasi',
										'atasNama' => $atas_nama
									);
						
		}
	}
}

public function pesanbatal($kodeBayar)
	{	
				$data_pesan= array(
										'status' => 'Pesanan Dibatalkan'
									);

				$this->model_pesanan->batalPesanan($kodeBayar,$data_pesan);
				redirect(base_url('index.php/home/Konfirmasi/'));
				
}

}

/* End of file konfirmasi_pesanan.php */
/* Location: ./application/controllers/konfirmasi_pesanan.php */