<?php

namespace App\Controllers;
use \App\Models\SiswaModel;

class Siswa extends BaseController
{
	public function index()
	{
		return view('student/data_appearance');
	}

    public function ambildata()
    {
        if($this->request->isAJAX()){
            $siswaModel = new SiswaModel();
            $data = [
                'siswa' => $siswaModel->findAll()
            ];
            
            $msg = [
                'data' => view('student/datasiswa', $data)
            ];

            echo json_encode($msg);
        }else{
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }
    
    public function formtambah()
    {
        if($this->request->isAJAX()){
            $msg = [
                'data' => view('student/modaltambah')
            ];

            echo json_encode($msg);
        }else{
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }

    public function simpandata()
    {
        if($this->request->isAJAX()){

            $validation = \Config\Services::validation();
            
            $valid = $this->validate([
                'nis' => [
                    'label' => 'Nomor NIS',
                    'rules' => 'required|is_unique[siswa.NIS]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} yang anda sudah terdaftar, coba yang lain'
                    ]
                ],
                'nama' => [
                    'label' => 'Nama Siswa',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tmptlahir' => [
                    'label' => 'Tempat Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'tglahir' => [
                    'label' => 'Tanggal Lahir',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jenkel' => [
                    'label' => 'Jenis Kelamin',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ]
            ]);
            
            if(!$valid){
                $msg = [
                  'error' => [
                      'nis' => $validation->getError('nis'),
                      'nama' => $validation->getError('nama'),
                      'tmptlahir' => $validation->getError('tmptlahir'),
                      'tglahir' => $validation->getError('tglahir'),
                      'jenkel' => $validation->getError('jenkel'),
                  ]
                ];
            }else{
                $simpandata = [
                    'NIS' => $this->request->getPost('nis'),
                    'Nama' => $this->request->getPost('nama'),
                    'Tem_Lahir' => $this->request->getPost('tmptlahir'),
                    'Tgl_Lahir' => $this->request->getPost('tglahir'),
                    'Jns_Kelamin' => $this->request->getPost('jenkel')
                ];

                $siswaModel = new SiswaModel();
                $siswaModel->insert($simpandata);

                $msg = [
                    'sukses' => 'Data siswa berhasil di simpan'
                ];
            }

            echo json_encode($msg);
        }else{
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }
}
