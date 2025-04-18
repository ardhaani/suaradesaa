<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Lapor;
use App\Models\Status;
use App\Models\Comment;
use App\Models\Dashboard;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorePostRequest;
use App\Mail\Komentar;
use App\Models\Category;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class LaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index',    [
            'title' => 'Lapor',
            'statuses' =>  Status::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index', [
            'statuses' => Status::all()
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $isidata = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'category_id' => 'required',
            'image' => 'image|file|max:2048',
        ]);

        if ($request->file('image')) {
            $image = $request->file('image');
        $imageName = $image->hashName(); // Mendapatkan nama file dengan hash
        $image->storeAs('images', $imageName); // Simpan gambar dengan nama yang sudah diubah
        $isidata['image'] = $imageName;
    }

    $isidata['user_id'] = auth()->user()->id;
    $isidata['excerpt'] = Str::limit(strip_tags($request->isi), 50);

    Post::create($isidata);

    return redirect('/history')->with('success', 'Aduan telah diposting');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lapor  $lapor
     * @return \Illuminate\Http\Response
     */
    public function show(Lapor $post){
        $comment = Comment::where('post_id', $post->id)->latest()->get();
        return view('admin.show', [
            'title' => 'Show',
            'post' => $post,
        ], compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lapor  $lapor
     * @return \Illuminate\Http\Response
     */
    public function edit(Lapor $post)
    {

        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lapor  $lapor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lapor $lapor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lapor  $lapor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $comment=Comment::where('id',$id)->first();
        $comment->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }
    public function checkSlug(Request $req)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $req->judul);
        return response()->json(['slug' => $slug]);
    }

    public function komen(Request $request, User $user, Post $post)
    {
        $comment = Comment::all();

        $find = Post::find($request->post_id);
        $users = $find->user->email;
        
        $request->request->add(['user_id'=>auth()->user()->id]);
        $komentar = Comment::create($request->all());
        $komen = Comment::find($komentar);
        
        Mail::to($users)->send(new Komentar($komen));

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');

    }
}
