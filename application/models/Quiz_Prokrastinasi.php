<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz_Prokrastinasi extends CI_Model {

    public function getQuiz()
    {
        return [
            [
                'id' => 1,
                'pertanyaan' => 'Apa hal yang sudah lama ingin kamu lakukan tapi masih sering tertunda?',
                'a' => 'Membaca buku',
                'b' => 'Olahraga',
                'c' => 'Belajar skill baru',
                'd' => 'Menulis',
                'e' => 'Menggambar',
                'f' => 'Belajar bahasa'
            ],
            [
                'id' => 2,
                'pertanyaan' => 'Kegiatan apa yang paling sering kamu tunda meskipun tahu itu penting?',
                'a' => ' Mengerjakan tugas',
                'b' => 'Olahraga',
                'c' => 'Belajar',
                'd' => 'Membersihkan rumah'
            ],
            [
                'id' => 3,
                'pertanyaan' => 'Apa yang paling sering membuatmu menunda pekerjaan?',
                'a' => 'Bermain media sosial',
                'b' => 'Nonton series/film',
                'c' => 'Bermain game',
                'd' => 'Tidak tahu harus mulai dari mana'
            ],
            [
                'id' => 4,
                'pertanyaan' => 'Aktivitas produktif apa yang ingin kamu biasakan setiap hari?',
                'a' => 'Membaca',
                'b' => 'Menulis',
                'c' => 'Olahraga',
                'd' => 'Belajar'
            ],
            [
                'id' => 5,
                'pertanyaan' => 'Apa target pribadi yang ingin segera kamu capai?',
                'a' => 'Nilai yang lebih baik',
                'b' => 'Tubuh lebih sehat',
                'c' => 'Menambah pengetahuan',
                'd' => 'Mengatur waktu dengan lebih baik'
            ],
            [
                'id' => 6,
                'pertanyaan' => 'Kalau bisa langsung menyelesaikan satu hal hari ini, apa yang akan kamu pilih?',
                'a' => 'Mengerjakan tugas yang menumpuk',
                'b' => 'Merapikan rumah atauu kamar',
                'c' => 'Menyelesaikan target belajar',
                'd' => 'Berolahraga'
            ],
    
        ];
        
    }

       public function simpan_hasil($data)
{
    return $this->db->insert('hasil_kuis', $data);
}

public function simpan_todo($data)
{
    return $this->db->insert('todo_list', $data);
}

public function getTodo($id_user)
{
    return $this->db
                ->where('id_user',$id_user)
                ->get('todo_list')
                ->result();

}


}
