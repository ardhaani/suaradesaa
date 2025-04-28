<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Status;
use App\Models\Comment;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\Komentar;
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
            'categories' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('index', [
            'title' => 'Lapor',
            'statuses' => Status::all(),
        ]);
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|max:255',
            'isi' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|file|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads', $imageName, 'public');
            $validated['image'] = $imageName;
        }

        $validated['user_id'] = auth()->id();
        $validated['excerpt'] = Str::limit(strip_tags($validated['isi']), 50);

        Post::create($validated);

        return redirect('/history')->with('success', 'Aduan telah diposting.');
    }

    /**
     * Display the specified post along with its comments.
     */
    public function show(Post $post)
    {
        $comments = Comment::where('post_id', $post->id)->latest()->get();

        return view('admin.show', [
            'title' => 'Detail Laporan',
            'post' => $post,
            'comments' => $comments,
        ]);
    }

    /**
     * Remove the specified comment from storage.
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }

    /**
     * Generate slug from title.
     */
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->judul);

        return response()->json(['slug' => $slug]);
    }

    /**
     * Store new comment and send email notification to post owner.
     */
    public function komen(Request $request, User $user, Post $post)
    {
        $request->validate([
            'isi' => 'required|string|max:1000',
            'post_id' => 'required|exists:posts,id',
        ]);

        $post = Post::findOrFail($request->post_id);
        $recipientEmail = $post->user->email ?? null;

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'isi' => $request->isi,
        ]);

        if ($recipientEmail) {
            Mail::to($recipientEmail)->send(new Komentar($comment));
        }

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
