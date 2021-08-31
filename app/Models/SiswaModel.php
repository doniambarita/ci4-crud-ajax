<?php

namespace App\Models;
use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $allowedFields = ['NIS', 'Nama', 'Tem_Lahir', 'Tgl_Lahir', 'Jns_Kelamin'];


    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];
    
    
    // Jadi sebelum melakukan save / insert data jlnkan dulu method beforeInsert 
    protected function beforeInsert(array $newData)
    {
      // Nah key data ini menurut gw masuknya ke sini dulu : ['beforeInsert'] , jadi nya array nya 3 dimensi , secara 
      // otomatis kynya array bagian keduanya bentuknya associative dgn key data , dan array bagian ke 3 data2 nya 
      // yg di kirim dari controller
      $newData['data']['created_at'] = date('Y-m-d H:i:s');
    
      return $newData;
    }
  
    // Jadi sebelum melakukan save / update data jlnkan dulu method beforeUpdate
    protected function beforeUpdate(array $newData)
    {
      // Gw ngebuat manual timestamp nya yg nnti akan di masukkan ke dalam database
      $newData['data']['updated_at'] = date('Y-m-d H:i:s');
    
      return $newData;    
    }

}
