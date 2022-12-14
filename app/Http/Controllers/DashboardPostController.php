<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.posts.index', [
            // hanya tampilkan kan postingan user
            // ambil berdasarkn user_id = yang terotentikasi

            'posts' => Post::where('user_id', auth()->user()->id)->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  fungsi tambah
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'body' => 'required'
        ]);

        // Tambahkan user_id
        $validatedData['user_id'] = auth()->user()->id;
        // strip_tags => Untuk menghilangkan tag html yang di body
        $validatedData['excerpt'] = Str::limit(strip_tags( $request->body), 200);

        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'New post has been added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    //  fungsi liat detail
    public function show(Post $post)
    {
        //
        return view('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    //  ubah data
    // untuk nampilin view edit
    public function edit(Post $post)
    {
        //
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    //  proses ubah data -> edit
    public function update(Request $request, Post $post)
    {
        //
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required'
        ];

        // validasi untuk slug
        // pengecualian validasi slu => LOGIC
        if($request->slug != $post->slug){
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */

    //  delete
    public function destroy(Post $post)
    {
        //

        // destroy untuk mengahpus data
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted');

    }


    public function checkSlug(Request $request){

$slug = SlugService::createSlug(Post::class, 'slug', $request->title);
return response()->json(['slug' => $slug]);
    }

}
