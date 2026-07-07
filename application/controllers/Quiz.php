<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Quiz_Prokrastinasi');
        $this->load->library('session');

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['quiz'] = [
            [
                'id' => 1,
                'pertanyaan' => 'Apa hal yang sudah lama ingin kamu tekuni tapi masih sering tertunda?',
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
        ];

        $this->load->view('quiz',$data);
    }

    public function hasil()
    {
        $jawaban = $this->input->post('jawaban');

        // Validasi: pastikan semua 5 jawaban terisi sebelum diproses
        for ($i = 1; $i <= 5; $i++) {
            if (empty($jawaban[$i])) {
                $this->session->set_flashdata('error', 'Silakan jawab semua pertanyaan terlebih dahulu!');
                redirect('quiz');
                return;
            }
        }

        $todo = [];

        foreach($jawaban as $no => $j){

            switch($no){

                case 1:

                    switch($j){

                        case 'A':
                            $todo[] = "📖 Mulai biasain baca tipis-tipis, contohnya mulai dulu 1 paragraph per hari biar otak kamu mulai terbiasa.";
                            break;

                        case 'B':
                            $todo[] = "🏃 Taro baju kamu yang buat olahraga didepan tempat tidur kamu biar pas bangun kamu langsung liat itu dan otak kamu akan bilang 'kayanya aku harus olahraga sekarang'.";
                            break;

                        case 'C':
                            $todo[] = "💻  Cari tahu terlebih dahulu tentang skill yang ingin kamu pelajari setelah itu dipraktikan tipis-tipis.";
                            break;

                        case 'D':
                            $todo[] = "✍️ Mulai biasain nulis tipis-tipis, contohnya mulai dulu 1 paragraph per hari biar otak kamu mulai terbiasa.";
                            break;

                        case 'E':
                            $todo[] = "🎨 Coba buat challenge diri kamu buat gambar apapun setiap harinya.";
                            break;

                        case 'F':
                            $todo[] = "🗣️ Pelajari terlebih dahulu struktur bahasa yang ingin kamu pelajari, dan coba untuk menghafalkan minimal  kosakata setiap harinya.";
                            break;
                    }

                    break;

                case 2:

                    switch($j){

                        case 'A':
                            $todo[] = "📝 Buat list tugasmu di sticky note lalu tempelkan dibagian ruangan di rumah yang sering kamu lewati dan kamu lihat agar kamu ingat bahwa ada tugas yang HARUS DISELESAIKAN.";
                            break;

                        case 'B':
                            $todo[] = "🏃 Mulai untuk olahraga tipis-tipis, coba untuk start olahraga 10 menit perhari.";
                            break;

                        case 'C':
                            $todo[] = "📚 Coba untuk konsisten belajar selama minimal 15 menit perhari untuk belajar, jika sudah mukai terbiasa dan konsisten coba untuk naikan durasinya.";
                            break;

                        case 'D':
                            $todo[] = "🧹 Mulailah untuk bersih-bersih dari hal yang ringan terlebih dulu perharisnya agar kamu dapat terbiasa, nanti jika sudah terbiasa mulailah untuk membersihkan sesuatu yang jangkauannya lebih berat.";
                            break;
                    }

                    break;

                case 3:

                    switch($j){

                        case 'A':
                            $todo[] = "📵 Coba untuk mengatur screentime dalam sosial media, contohnya sehari kita hanya dapat berpain sosial media dalam kurun waktu 2 jam saja.";
                            break;

                        case 'B':
                            $todo[] = "🎬 Coba untuk batasi menonton menjadi 1 episode atau 1 film saja perharinya.";
                            break;

                        case 'C':
                            $todo[] = "🎮 Umpetin aplikasi gamesnya di tempat yang jarang kita buka pada menu aplikasi, contohnya taro gamenya barengan dengan folder pengaturan atau lain sebagainya.";
                            break;

                        case 'D':
                            $todo[] = "📋 Pecah tugas menjadi langkah-langkah kecil terlebih dahulu untuk membiasakan diri kita.";
                            break;
                    }

                    break;

                case 4:

                    switch($j){

                        case 'A':
                            $todo[] = "📖 Ubah setelan meja belajarmu, dimana hanya ada 1 buku saja yang ingin kamu baca tanpa ada gangguan apapun disekitarnya (sebelumnya taro hp kamu didalam laci atau dimanapun asalkan jangan sampai terlihat dan membuatmu terdistraksi).";
                            break;

                        case 'B':
                            $todo[] = "✍️ Ubah setelan meja belajarmu, dimana hanya ada alat untuk kamu menulis seperti buku, dan alat tulis lainnya (jika menggunakan laptop pastikan bahwa itu sudah terputus koneksi jaringan manapun) saja tanpa ada gangguan apapun disekitarnya (sebelumnya taro hp kamu didalam laci atau dimanapun asalkan jangan sampai terlihat dan membuatmu terdistraksi).";
                            break;

                        case 'C':
                            $todo[] = "🎮 Coba untuk taro tulisan 'OLAHRAGA WOI' di sticky note ke setiap tempat atau ruangan yang sering kamu lewati di sekitar rumah untuk mendistraksi otak kamu bahwa kamu memang harus mulai olahraga.";
                            break;

                        case 'D':
                            $todo[] = "📚 Ubah setelan meja belajarmu, dimana hanya ada buku, dan alat tulis saja yang ingin kamu baca tanpa ada gangguan apapun disekitarnya (sebelumnya taro hp kamu didalam laci atau dimanapun asalkan jangan sampai terlihat dan membuatmu terdistraksi).";
                            break;
                    }

                    break;

                case 5:

                    switch($j){

                        case 'A':
                            $todo[] = "📚 Hmmm kalau ini sih yang lain dan ga lain ya harus nyoba buat konsisten belajar, coba dulu per hari 10-15 menit.";
                            break;

                        case 'B':
                            $todo[] = "🏃 Hmmm kalau ini sih yang lain dan ga lain ya harus nyoba buat konsisten olahraga, coba dulu per hari 10-15 menit.";
                            break;

                        case 'C':
                            $todo[] = "🗣️ Kamu bisa challenge diri kamu buat nyari minimal satu fakta perharinya.";
                            break;

                        case 'D':
                            $todo[] = "📋 Buat daftar prioritas, disitu kamu bakal tahu bagian mana kegiatanmu yang kurang bermanfaat dan yang bermanfaat.";
                            break;
                    }

                    break;

            }

        }

        // Ambil id_user dari session yang sedang login (bukan hardcode lagi)
        $id_user = $this->session->userdata('id_user');

        // Simpan hasil kuis
        $this->Quiz_Prokrastinasi->simpan_hasil([
            'id_user'  => $id_user,
            'jawaban1' => $jawaban[1],
            'jawaban2' => $jawaban[2],
            'jawaban3' => $jawaban[3],
            'jawaban4' => $jawaban[4],
            'jawaban5' => $jawaban[5]
        ]);

        $data['todo'] = array_unique($todo);

        // Simpan To Do List
        foreach($data['todo'] as $isi){

            $this->Quiz_Prokrastinasi->simpan_todo([
                'id_user'=>$id_user,
                'isi'=>$isi,
                'status'=>'Belum'
            ]);

        }

        // Pindah ke halaman Profile
        redirect('profile');
    }
}