<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Status;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Komentar;
use App\Models\Category;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;

class LaporController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index', [
            'title' => 'Lapor',
            'statuses' => Status::all(),
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('index', [
            'statuses' => Status::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
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
            $imageName = $image->hashName();
            $image->storeAs('images', $imageName);
            $isidata['image'] = $imageName;
        }

        $isidata['user_id'] = auth()->user()->id;
        $isidata['excerpt'] = Str::limit(strip_tags($request->isi), 50);

        Post::create($isidata);

        return redirect('/history')->with('success', 'Aduan telah diposting');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comment = Comment::where('post_id', $post->id)->latest()->get();

        return view('admin.show', [
            'title' => 'Show',
            'post' => $post,
            'comment' => $comment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comment = Comment::where('id', $id)->first();
        if ($comment) {
            $comment->delete();
        }

        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }

    /**
     * Generate slug from title.
     */
    public function checkSlug(Request $req)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $req->judul);
        return response()->json(['slug' => $slug]);
    }

    /**
     * Store new comment and send email notification.
     */
    public function komen(Request $request, User $user, Post $post)
    {
        $find = Post::find($request->post_id);
        $users = $find->user->email ?? null;

        $request->request->add(['user_id' => auth()->user()->id]);
        $komentar = Comment::create($request->all());

        if ($users) {
            Mail::to($users)->send(new Komentar($komentar));
        }

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
