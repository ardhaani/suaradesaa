<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Lapor;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Exports\PostsExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class AdminController extends Controller
{
    public function index(){
        $usercount = User::count();
        $postcount = Post::count();
        $posts = Post::count();
        $petugas = User::where('level', '=' , 'admin')->orWhere('level' , '=', 'petugas')->get();
        $masyarakat = User::where('level', '=', 'user')->get();
        return view('admin.index', [
            "title" => "Admin",
            "status1" => Post::with(['user', 'status'])->where('status_id', '=', '1')->get(),
            "status2" => Post::with(['user', 'status'])->where('status_id', '=', '2')->get(),
            "status3" => Post::with(['user', 'status'])->where('status_id', '=', '3')->get(),
            "status4" => Post::with(['user', 'status'])->where('status_id', '=', '4')->get(),
            "posts" => Status::all()
        ], compact('posts', 'usercount', 'postcount', 'petugas', 'masyarakat'));
    }

    public function chart(User $user){
        $p = Post::all();
        $p_terima = Post::where('status_id' , '1')->get();
        $p_proses = Post::where('status_id' , '2')->get();
        $p_selesai = Post::where('status_id' , '3')->get();
        $p_tolak = Post::where('status_id' , '4')->get();

        $kat_satu = Post::where('category_id', '1')->get();
        $kat_dua = Post::where('category_id', '2')->get();
        $kat_tiga = Post::where('category_id', '3')->get();

        $u = User::all();
        $u_nol = User::where('umur', '<', 10)->get();
        $u_satu = User::whereBetween('umur', [10, 19])->get();
        $u_dua = User::whereBetween('umur', [20, 29])->get();
        $u_tiga = User::whereBetween('umur', [30, 39])->get();
        $u_empat = User::whereBetween('umur', [40, 49])->get();
        $u_lima = User::where('umur', '>', 50)->get();

        // $p_u = Post::where('user_id', $user->id)->get();

        // $p_uid = $p_u->$user->umur;
        
        // $p_usatu = $p_uid->whereBetween('umur', [10, 40])->get();
        // // $p_uid = $p_u->get('umur');

        $dates = [];
        foreach($p as $complaint){
            $dates[] = $complaint->created_at->format('d');
        }
        return view('admin.chart', [
            "title" => "Chart",
            "date" => $dates,
            "p" => $p->count(),
            "p_terima" => $p_terima->count(),
            "p_proses" => $p_proses->count(),
            "p_selesai" => $p_selesai->count(),
            "p_tolak" => $p_tolak->count(),
            "kat_satu" => $kat_satu->count(),
            "kat_dua" => $kat_dua->count(),
            "kat_tiga" => $kat_tiga->count(),
            "u" => $u->count(),
            "u_nol" => $u_nol->count(),
            "u_satu" => $u_satu->count(),
            "u_dua" => $u_dua->count(),
            "u_tiga" => $u_tiga->count(),
            "u_empat" => $u_empat->count(),
            "u_lima" => $u_lima->count(),
            // "p_usatu" => $p_usatu->count(),
        ]);
    }

    public function laporan(){
        $posts = Post::all();
        return view('admin.lapor.laporan', [
            "title" => "Laporan",
            "statuses" => Status::all(),
        ], compact('posts'));
    }

    public function terima(){
        $posts = Post::where('status_id', '=', '1')->get();
        return view('admin.lapor.terima', [
            "title" => "Diterima",
            "statuses" => Status::all(),
        ], compact('posts'));
    }

    public function proses(){
        $posts = Post::where('status_id', '=', '2')->get();
        return view('admin.lapor.proses', [
            "title" => "Diproses",
            "statuses" => Status::all(),
        ], compact('posts'));
    }

    public function selesai(){
        $posts = Post::where('status_id', '=', '3')->get();
        return view('admin.lapor.selesai', [
            "title" => "Selesai",
            "statuses" => Status::all(),
        ], compact('posts'));
    }

    public function tolak(){
        $posts = Post::where('status_id', '=', '4')->get();
        return view('admin.lapor.tolak', [
            "title" => "Tolak",
            "statuses" => Status::all(),
        ], compact('posts'));
    }

    public function petugas() {
        $users = User::where('level', '=' , 'admin')->orWhere('level' , '=', 'petugas')->get();
        return view('admin.user.petugas', [
            "title" => "Petugas"
        ], compact('users'));
    }
    public function masyarakat() {
        $users = User::where('level', '=', 'user')->get();
        return view('admin.user.masyarakat', [
            "title" => "Masyarakat"
        ], compact('users'));
    }

    public function tambah(){
        $this->authorize('admin');
        return view('admin.tambah', [
            "title" => "Tambah Petugas"
        ]);
    }

    public function store(Request $req){
        $validasi = $req->validate([
           'name' => 'required|max:255',
           'username' => 'required|min:3|max:255',
           'email' => 'required|email:dns',
           'password' => 'required|min:3|max:255',
           'level' => 'max:255'
       ]);

        $validasi['password'] = bcrypt($validasi['password']);

        User::create($validasi);

        return redirect('/petugas');
    }

    public function edit(Lapor $post)
    {

        $status = Post::find($post->id);
        $status->status_id = '4';
        $status->save();

        return redirect('/tolak')->with('sukses', 'Laporan ditolak!');
    }

    public function update(Request $request, Lapor $post)
    {
        $status = Post::find($post->id);
        $status->status_id = '3';
        $status->save();

        return redirect('/selesai')->with('sukses', 'Laporan terselesaikan!');
    }

    public function show(Lapor $post){
        $status = Post::find($post->id);
        $status->status_id = '2';
        $status->save();

        return redirect('/proses')->with('sukses', 'Laporan diproses!');
    }

    public function destroy(Lapor $post)
    {
        if($post->image){
            Storage::delete($post->image);
        }
        Lapor::destroy($post->id);
        
        return redirect('/laporan')->with('success', 'Postingan telah dihapus!');
    }

    public function export(){
        $data = Post::all();
    $user_login = auth()->user()->name; // Menyimpan nama pengguna yang sedang login

    view()->share('data', $data);
    view()->share('user_login', $user_login); // Mengirimkan nama pengguna ke view
    $pdf = PDF::loadview('admin.lapor.export');
    return $pdf->download('laporan_aduan_masyarakat.pdf');
}


public function search()
{
    return view('admin.lapor.laporan', [
        "title" => "Laporan",
        "posts" => Post::latest()->filter()->get(),
    ]);
}
}
