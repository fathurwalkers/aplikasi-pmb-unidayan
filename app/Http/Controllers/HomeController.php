<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Data;
use App\Models\Prodi;

class HomeController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();
        return view('home.index', [
            'prodi' => $prodi
        ]);
    }

    public function pendaftaran()
    {
        $prodi = Prodi::all();
        return view('home.pendaftaran', [
            'prodi' => $prodi
        ]);
    }

    public function verifikasi_akun($token)
    {
        dd($token);
    }

    public function send_email($id)
    {
        $id_user = $id;
        $pengguna = Login::find($id_user);
        $mail_username  = "siakadtk123@gmail.com";
        $mail_password  = "Fathur160199Seven";
        $mail_send  = $pengguna->login_email;

        try {
            $mail = new PHPMailer(); // create a new object
            $mail->IsSMTP(true); // enable SMTP
            $mail->SMTPDebug = 2;
            $mail->Debugoutput = 'html';
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587 / 465
            $mail->Username = $mail_username;
            $mail->Password = $mail_password;

            $mail->setFrom($mail_username, "Verifikasi Akun Pendaftaran Mahasiswa Baru");
            $mail->addAddress($mail_send);

            $mail->isHTML(true);
            $mail->Subject = "Verifikasi Akun Pendaftaran Mahasiswa Baru";

            $bodyverfikasi = "<b> Selamat! Akun anda berhasil dibuat! </b> <br />
            Silahkan tekan tombol 'VERIFIKASI' Untuk melakukan konfirmasi pendaftaran. <br />
            <br /> ";
            $bodyverfikasi .= "<a href='";
            $bodyverfikasi .= url('/');
            $bodyverfikasi .= $pengguna->login_username;
            $bodyverfikasi .= "'>";
            $bodyverfikasi .= "VERIFIKASI";
            $bodyverfikasi .= "</a>";
            $bodyverfikasi .= "<br />";

            $mail->Body = $bodyverfikasi;

            $mail->send();
            return redirect()->route('home')->with('status', "Pendaftaran Akun telah berhasil. Silahkan Login ke Dashboard dan melakukan pengecekan di Email anda untuk melakukan Verifikasi Akun agar dapat melanjutkan proses pendaftaran.");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function post_pendaftaran(Request $request)
    {
        // dd($request->data_pilihan_jurusan3);
        $validate_data                  = $request->validate(
            [
                "data_foto"                 => 'required|image|mimes:jpeg,png,jpg|max:2048',
                "data_nama_lengkap"         => 'required',
                "data_jenis_kelamin"        => 'required|filled',
                "data_email"                => 'required',
                "data_telepon"              => 'required',
                "data_tempat_lahir"         => 'required',
                "data_tanggal_lahir"        => 'required',
                "data_asal_sekolah"         => 'required',
                "data_nama_ibu_kandung"     => 'required',
                "data_tahun_lulus"          => 'required',
                "data_kampus_pilihan"       => 'required|filled',
                "data_pilihan_jurusan1"     => 'required|filled',
                "data_pilihan_jurusan2"     => 'required|filled',
                "data_pilihan_jurusan3"     => 'required|filled',
            ],
            [
                "data_foto.required"                        => 'Foto tidak boleh kosong, dan ukuran tidak lebih dari 2mb!',
                "data_nama_lengkap.required"                => 'Nama Lengkap tidak boleh kosong.',
                "data_jenis_kelamin.required|filled"        => 'Jenis Kelamin tidak boleh kosong',
                "data_email.required"                       => 'Email tidak boleh kosong.',
                "data_telepon.required"                     => 'No. HP / Telepon tidak boleh kosong.',
                "data_tempat_lahir.required"                => 'Tempat lahir tidak boleh kosong.',
                "data_tanggal_lahir.required"               => 'Tanggal Lahir tidak boleh kosong.',
                "data_asal_sekolah.required"                => 'Asal Sekolah tidak boleh kosong.',
                "data_nama_ibu_kandung.required"            => 'Nama Ibu tidak boleh kosong.',
                "data_tahun_lulus.required"                 => 'Tahun Lulus tidak boleh kosong.',
                "data_kampus_pilihan.required|filled"       => 'Kampus Pilihan tidak boleh kosong',
                "data_pilihan_jurusan1.required|filled"     => 'Pilihan jurusan pertama tidak boleh kosong',
                "data_pilihan_jurusan2.required|filled"     => 'Pilihan jurusan kedua tidak boleh kosong',
                "data_pilihan_jurusan3.required|filled"     => 'Pilihan jurusan ketiga tidak boleh kosong',
            ]
        );

        $gambar_cek = $request->file('data_foto');
        if (!$gambar_cek) {
            $gambar = null;
        } else {
            $randomNamaGambar = Str::random(10) . '.jpg';
            $gambar = $request->file('data_foto')->move(public_path('default-img'), strtolower($randomNamaGambar));
        }

        if ($gambar == null) {
            $gambar = null;
        } else {
            $gambar = $gambar->getFileName();
        }

        $pilihan_jurusan1               = Prodi::find(intval($validate_data["data_pilihan_jurusan1"]));
        $pilihan_jurusan2               = Prodi::find(intval($validate_data["data_pilihan_jurusan2"]));
        $pilihan_jurusan3               = Prodi::find(intval($validate_data["data_pilihan_jurusan3"]));

        $data_mahasiswa                 = new Data;
        $save_mahasiswa                 = $data_mahasiswa->create([
            'data_foto'                 => $gambar,
            'data_kode'                 => strtoupper(Str::random(10)),
            'data_nama_lengkap'         => $validate_data["data_nama_lengkap"],
            'data_jenis_kelamin'        => $validate_data["data_jenis_kelamin"],
            'data_email'                => $validate_data["data_email"],
            'data_telepon'              => $validate_data["data_telepon"],
            'data_tempat_lahir'         => $validate_data["data_tempat_lahir"],
            'data_tanggal_lahir'        => date($validate_data["data_tanggal_lahir"]),
            'data_asal_sekolah'         => $validate_data["data_asal_sekolah"],
            'data_nama_ibu_kandung'     => $validate_data["data_nama_ibu_kandung"],
            'data_tahun_lulus'          => $validate_data["data_tahun_lulus"],
            'data_status_pendaftaran'   => "BELUM DISETUJUI",
            'data_status_pembayaran'    => "DIPROSES",
            'data_kampus_pilihan'       => $validate_data["data_kampus_pilihan"],
            'data_pilihan_jurusan1'     => $pilihan_jurusan1->id,
            'data_pilihan_jurusan2'     => $pilihan_jurusan2->id,
            'data_pilihan_jurusan3'     => $pilihan_jurusan3->id,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);
        $save_mahasiswa->save();
        // LOGIN
        $login_model                    = new Login;
        $password                       = '12345';
        $hashPassword                   = Hash::make($password, [
            'rounds' => 12,
        ]);
        $token_raw                      = Str::random(16);
        $token                          = Hash::make($token_raw, [
            'rounds' => 12,
        ]);
        $level                          = "pendaftar";
        $login_status                   = "unverified";
        $login_data                     = $login_model->create([
            'login_nama'                => $save_mahasiswa->data_nama_lengkap,
            'login_username'            => 'pendaftar' . strtolower(Str::random(10)),
            'login_password'            => $hashPassword,
            'login_email'               => $save_mahasiswa->data_email,
            'login_telepon'             => $save_mahasiswa->data_telepon,
            'login_token'               => $token,
            'login_level'               => $level,
            'login_status'              => $login_status,
            'created_at'                => now(),
            'updated_at'                => now()
        ]);
        $login_data->save();
        $login_data->data()->associate($save_mahasiswa->id);
        $login_data->save();
        // $this->send_email($login_data->id);
        // return redirect()->route('home')->with('status', 'Pendaftaran berhasil! Silahkan login kedalam dashboard untuk melanjutkan proses pendaftaran.');
        return redirect()->route('home-send-email', $login_data->id);
    }
}
