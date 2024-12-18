<?php

// this is like import packege and stuff in angular right?
namespace App\Http\Controllers; 
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    // use HasFactory; // what is HasFactory? update: use HasFactory is used in the Model, not the Controller. ask gpt

    protected $fillable = ['title', 'content'];

    // Store method (for inserting data)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = Post::create([
            // 'title' => 'Sample Post',
            'title' => $request->input('title'),  // Use the title from the request
            // 'content' => 'This is a sample post content.'
            'content' => $request->input('content'),  // Use the content from the request
        ]);

        return redirect()->route('posts.index');  // Redirect after saving
    }



    // Read Data from Database
    // Get All Posts: (index method)
    public function index()
    {
        $posts = Post::all();  // Fetches all posts
        return view('posts.index', compact('posts'));
    }

    // Get a Single Post by ID: // Show a single post (show method)
    public function show($id)
    {
        // $post = Post::find($id);  // Find a post by its primary key (ID)
        // return view('posts.show', compact('post')); // Pass post to the view

        // Fetch the post by its ID
        $post = Post::find($id);

        // Check if the post exists, and if not, return a 404 page
        if (!$post) {
            abort(404, 'Post not found');
        }

        // Return the view and pass the post data
        return view('posts.show', compact('post'));
    }

    // not explore yet
    // $posts = Post::where('title', 'like', '%sample%')->get();  // Get posts where title contains 'sample'

    // Show form to edit a post (edit method)
    public function edit($id)
    {
        $post = Post::find($id);  // Find post by ID

        // Check if post exists, if not return a 404 error
        if (!$post) {
            abort(404, 'Post not found');
        }

        // Pass the post data to the edit view
        return view('posts.edit', compact('post'));
    }

    // Update Data in Database // Update a post (update method)
    public function update(Request $request, $id)
    {
        // $post = Post::find($id);  // Find post by ID
        // $post->title = 'Updated Title';
        // $post->content = 'Updated content';
        // $post->save();  // Save the changes to the database

        // return redirect()->route('posts.index');

        // Validate the incoming request
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Find the post by ID
        $post = Post::find($id);

        // Check if post exists, if not return a 404 error
        if (!$post) {
            abort(404, 'Post not found');
        }

        // Update the post with the new data
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();  // Save the updated post to the database

        // Redirect to the posts list with a success message
        return redirect()->route('posts.index')->with('success', 'Post updated successfully');
    }

    // Mass Update // not explore yet
    public function massUpdate() { 
        Post::where('status', 'draft')->update(['status' => 'published']);
        return redirect()->route('posts.index'); // should ensure that they're tied to proper routes and views
    }

    // Delete Data from Database // Delete a post (destroy method)
    public function destroy($id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            session()->flash('success', 'Post deleted successfully!');
        } else {
            session()->flash('error', 'Post not found.');
        }

        return redirect()->route('posts.index');
    }

    // Delete Multiple Records: // not explore yet
    public function massDelete( ){
        Post::where('status', 'draft')->delete(); 
        return redirect()->route('posts.index');  // should ensure that they're tied to proper routes and views
    }


    /**
     * 3. Unexplored Select Data and DB Methods
     * You have commented out code that uses DB query builder methods like DB::table(). If you prefer using Eloquent ORM, you can stick with Post::all() or Post::find().
     * For now, you don’t need to explore these methods unless you want to use raw SQL queries or the query builder (which is more flexible but more verbose).
     */
    // Select Data // not explore yet
    // $posts = DB::table('posts')->get();  // Get all posts

    // To fetch a specific post: // not explore yet
    // $post = DB::table('posts')->where('id', 1)->first();  // Get post with ID 1

    // Insert Data // not explore yet
    // DB::table('posts')->insert([
    //     'title' => 'New Post',
    //     'content' => 'Content of the new post',
    // ]);

    // Update Data // not explore yet
    // DB::table('posts')->where('id', 1)->update([
    //     'title' => 'Updated Title',
    //     'content' => 'Updated content'
    // ]);

    // Delete Data // not explore yet
    // DB::table('posts')->where('id', 1)->delete();  // Delete post with ID 1


    // Display Data in Blade Views // not explore yet
    // $posts = Post::all();
    // return view('posts.index', compact('posts'));


    // copy this to index but where i dont know yet // not explore yet
    // @foreach ($posts as $post)
    //     <h2>{{ $post->title }}</h2>
    //     <p>{{ $post->content }}</p>
    // @endforeach
    public function create() {
        return view('posts.create');  // Returns the view to display the form
    }

}