<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Arr;
use App\Models\Login;
use App\Models\Data;
use App\Models\Histori;

class BackController extends Controller
{
    public function push_histori($status)
    {
        // STATUS = LOGIN - UPDATE - DELETE - CREATE
        switch ($status) {
            case 'LOGIN':
                $session_users = session('data_login');
                if ($session_users == null) {
                    return redirect()->route('dashboard')->with('status', 'Maaf session user anda tidak ditemukan.');
                }
                $histori = new Histori;
                $login = Login::find(intval($session_users->id));

                $status_histori = "LOGIN";
                $status_histori = "User Login";
                $histori_kode = "HSTR" . strtoupper(Str::random(10));
                $message = "User dengan nama [" . $login->login_nama . "] telah login, pada tanggal dan waktu ini : " . date('d/m/Y H:i:s', strtotime(now()));

                $save_histori = $histori->create([
                    "histori_kode" => $histori_kode,
                    "histori_tipe"  => $status_histori,
                    "histori_title" => $message,
                    "histori_tanggal_waktu" => now(),
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
                $save_histori->save();
                $save_histori->login()->associate($login->id);
                $save_histori->save();
                break;
            case 'LOGOUT':
                $session_users = session('data_login');
                if ($session_users == null) {
                    return redirect()->route('dashboard')->with('status', 'Maaf session user anda tidak ditemukan.');
                }
                $histori = new Histori;
                $login = Login::find(intval($session_users->id));

                $status_histori = "LOGOUT";
                $status_histori = "User Logout";
                $histori_kode = "HSTR" . strtoupper(Str::random(10));
                $message = "User dengan nama [" . $login->login_nama . "] telah logout, pada tanggal dan waktu ini : " . date('d/m/Y H:i:s', strtotime(now()));

                $save_histori = $histori->create([
                    "histori_kode" => $histori_kode,
                    "histori_tipe"  => $status_histori,
                    "histori_title" => $message,
                    "histori_tanggal_waktu" => now(),
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
                $save_histori->save();
                $save_histori->login()->associate($login->id);
                $save_histori->save();
                break;
            case 'UPDATE':
                $session_users = session('data_login');
                if ($session_users == null) {
                    return redirect()->route('dashboard')->with('status', 'Maaf session user anda tidak ditemukan.');
                }
                $histori = new Histori;
                $login = Login::find(intval($session_users->id));

                $status_histori = "UPDATE";
                $status_histori = "User Update Data";
                $histori_kode = "HSTR" . strtoupper(Str::random(10));
                $message = "User dengan nama [" . $login->login_nama . "] telah melakukan update data, pada tanggal dan waktu ini : " . date('d/m/Y H:i:s', strtotime(now()));

                $save_histori = $histori->create([
                    "histori_kode" => $histori_kode,
                    "histori_tipe"  => $status_histori,
                    "histori_title" => $message,
                    "histori_tanggal_waktu" => now(),
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
                $save_histori->save();
                $save_histori->login()->associate($login->id);
                $save_histori->save();
                break;
            case 'DELETE':
                $session_users = session('data_login');
                if ($session_users == null) {
                    return redirect()->route('dashboard')->with('status', 'Maaf session user anda tidak ditemukan.');
                }
                $histori = new Histori;
                $login = Login::find(intval($session_users->id));

                $status_histori = "DELETE";
                $status_histori = "User Hapus Data";
                $histori_kode = "HSTR" . strtoupper(Str::random(10));
                $message = "User dengan nama [" . $login->login_nama . "] telah melakukan penghapusan Data, pada tanggal dan waktu ini : " . date('d/m/Y H:i:s', strtotime(now()));

                $save_histori = $histori->create([
                    "histori_kode" => $histori_kode,
                    "histori_tipe"  => $status_histori,
                    "histori_title" => $message,
                    "histori_tanggal_waktu" => now(),
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
                $save_histori->save();
                $save_histori->login()->associate($login->id);
                $save_histori->save();
                break;
            case 'CREATE':
                $session_users = session('data_login');
                if ($session_users == null) {
                    return redirect()->route('dashboard')->with('status', 'Maaf session user anda tidak ditemukan.');
                }
                $histori = new Histori;
                $login = Login::find(intval($session_users->id));

                $status_histori = "CREATE";
                $status_histori = "User Tambah Data";
                $histori_kode = "HSTR" . strtoupper(Str::random(10));
                $message = "User dengan nama [" . $login->login_nama . "] telah menambahkan Data, pada tanggal dan waktu ini : " . date('d/m/Y H:i:s', strtotime(now()));

                $save_histori = $histori->create([
                    "histori_kode" => $histori_kode,
                    "histori_tipe"  => $status_histori,
                    "histori_title" => $message,
                    "histori_tanggal_waktu" => now(),
                    "created_at" => now(),
                    "updated_at" => now()
                ]);
                $save_histori->save();
                $save_histori->login()->associate($login->id);
                $save_histori->save();
                break;
        }
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function login()
    {
        $users = session('data_login');
        if ($users) {
            return redirect()->route('dashboard');
        }
        return view('login');
    }

    public function register()
    {
        if ($users) {
            return redirect()->route('dashboard');
        }
        return view('register');
    }

    public function logout(Request $request)
    {
        $users = session('data_login');
        $this->push_histori('LOGOUT');
        $request->session()->forget(['data_login']);
        $request->session()->flush();
        return redirect()->route('login')->with('status', 'Anda telah logout!');
    }

    public function postlogin(Request $request)
    {
        $cariUser = Login::where('login_username', $request->login_username)->get();
        if ($cariUser->isEmpty()) {
            return back()->with('status', 'Maaf username atau password salah!')->withInput();
        }
        $data_login = Login::where('login_username', $request->login_username)->firstOrFail();
        if ($data_login->login_status == "unverified") {
            return redirect()->route('login')->with('status', 'Maaf akun anda belum diverifikasi, silahkan mengecek email anda untuk melakukan konfirmasi verfikasi akun anda.')->withInput();
        }
        switch ($data_login->login_level) {
            case 'admin':
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        $this->push_histori('LOGIN');
                        return redirect()->route('dashboard')->with('status', 'Berhasil Login!');
                    }
                }
                break;
            case 'panitia':
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        $this->push_histori('LOGIN');
                        return redirect()->route('dashboard')->with('status', 'Berhasil Login!');
                    }
                }
                break;
            case 'pendaftar':
                $cek_password = Hash::check($request->login_password, $data_login->login_password);
                if ($data_login) {
                    if ($cek_password) {
                        $users = session(['data_login' => $data_login]);
                        $this->push_histori('LOGIN');
                        return redirect()->route('dashboard')->with('status', 'Berhasil Login!');
                    }
                }
                break;
        }
        return back()->with('status', 'Maaf username atau password salah!')->withInput();
    }

    public function send_email($token_user)
    {
        $pengguna = Login::where('login_token', $token_user)->firstOrFail();
        dd($pengguna);
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

            $mail->setFrom($mail_username, "Verifikasi Akun Pendaftaran Mahasiswa Baru");
            $mail->addAddress($mail_send);

            $mail->isHTML(true);
            $mail->Subject = "Verifikasi Akun Pendaftaran Mahasiswa Baru";

            $bodyverfikasi = "<b> Selamat! Akun anda berhasil dibuat! </b> <br />
            Silahkan tekan tombol 'VERIFIKASI' Untuk melakukan konfirmasi pendaftaran. <br />
            <br /> ";
            $bodyverfikasi .= "<a href='";
            $bodyverfikasi .= url('/');
            $bodyverfikasi .= "'>";
            $bodyverfikasi .= "VERIFIKASI";
            $bodyverfikasi .= "</a>";
            dd($bodyverfikasi);

            $mail->Body = $bodyverfikasi;

            $mail->send();
            return redirect()->route('dashboard')->with('berhasil_verifikasi', "Verfikasi SKCK telah dikirim ke email pengguna");
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function postregister(Request $request)
    {
        $validatedLogin = $request->validate([
            'login_nama' => 'required',
            'login_username' => 'required',
            'login_password' => 'required',
            'login_email' => 'required',
            'login_telepon' => 'required',
            'login_alamat' => 'required'
        ]);
        if ($validatedLogin["login_password"] !== $request->login_password2) {
            return back()->with('status', 'Password harus sama.')->withInput();
        }
        $hashPassword = Hash::make($validatedLogin["login_password"], [
            'rounds' => 12,
        ]);
        $token_raw = Str::random(16);
        $token = Hash::make($token_raw, [
            'rounds' => 12,
        ]);
        $level = "user";
        $login_status = "unverified";
        $login_data = new Login;
        $save_login = $login_data->create([
            'login_nama' => $validatedLogin["login_nama"],
            'login_username' => $validatedLogin["login_username"],
            'login_password' => $hashPassword,
            'login_email' => $validatedLogin["login_email"],
            'login_telepon' => $validatedLogin["login_telepon"],
            'login_alamat' => $validatedLogin["login_alamat"],
            'login_token' => $token,
            'login_level' => $level,
            'login_status' => $login_status,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $save_login->save();
        return redirect()->route('login')->with('status', 'Berhasil melakukan registrasi!');
    }

}
