<?php namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Redirect;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use Validator;
use Auth;
use Illuminate\Http\Request;

// note: use true and false for active posts in postgresql database
// here '0' and '1' are used for active posts because of mysql database

class PostController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Posts::where('active','1')->orderBy('created_at','desc')->paginate(5);
		$title = 'Latest Posts';
		return view('blog.index')->withPosts($posts)->withTitle($title);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		return view('admin.posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$validator = Validator::make($request->all(), [
       		'title' => 'required|unique:posts|max:255',
   		]);
   		if ($validator->fails()) {
   			return back();
   		}
		$post = new Posts();
		$post->title = $request->get('title');
		$post->body = $request->get('body');
		$post->slug = str_slug($post->title);
		$post->author_id = Auth::user()->id;
		$file = $request->file('file');
		if ($file) {
		$destinationPath = 'ev-assets/uploads/post-images';
		$extension = $file->getClientOriginalExtension(); // getting image extension
      	$fileName = rand(11111,99999).$post->slug.'.'.$extension; // renameing image
      	$request->file('file')->move($destinationPath, $fileName);
      	$post->image = $fileName; // upload path
		}
		if($request->has('save'))
		{
			$post->active = 0;
			$message = 'Post saved successfully';			
		}			
		else 
		{
			$post->active = 1;
			$message = 'Post published successfully';
		}
		$post->save();
		return redirect('posts/edit/'.$post->slug)->withMessage($message);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
		$post = Posts::where('slug',$slug)->first();

		if($post)
		{
			if($post->active == false)
				return redirect('/')->withErrors('requested page not found');
			$comments = $post->comments;	
		}
		else 
		{
			return redirect('/')->withErrors('requested page not found');
		}
		return view('blog.posts.show')->withPost($post)->withComments($comments);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request,$slug)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$post = Posts::where('slug',$slug)->first();
			return view('admin.posts.edit')->with('post',$post);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		//
		$post_id = $request->input('post_id');
		$post = Posts::find($post_id);
			$title = $request->input('title');
			$slug = str_slug($title);
			$duplicate = Posts::where('slug',$slug)->first();
			if($duplicate)
			{
				if($duplicate->id != $post_id)
				{
					return redirect('edit/'.$post->slug)->withErrors('Title already exists.');
				}
				else 
				{
					$post->slug = $slug;
				}
			}
			
			$post->title = $title;
			$post->body = $request->input('body');
			
			if($request->has('save'))
			{
				$post->active = 0;
				$message = 'Post saved successfully';
				$landing = 'edit/'.$post->slug;
			}			
			else {
				$post->active = 1;
				$message = 'Post updated successfully';
				$landing = $post->slug;
			}
			$post->save();
	 		return redirect('posts/edit/'.$landing)->withMessage($message);
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request, $id)
	{
		if(!Auth::user()->permission('is_admin'))
			return redirect('dashboard');
		$post = Posts::find($id);
		
		$post->delete();
		$data['message'] = 'Post deleted Successfully';
		
		return redirect('posts/all-post')->with($data);
	}
}
