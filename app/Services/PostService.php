<?php namespace App\Services;

use Illuminate\Contracts\Auth\Guard;
use App\Contracts\PostServiceInterface;

use App\Models\Post;
use File;


class PostService implements PostServiceInterface {

	public function __construct( Post $post, Guard $auth){
		$this->post = $post;
		$this->auth = $auth;
	}

	/**
	 * Create inputs for new post.
	 *
	 * @return array
	 */
	public function createInputs( $inputs ) {
		$imageName = str_random(64). '.' . 
        $inputs['image']->getClientOriginalExtension();
        $inputs['image']->move(
        	base_path() . '/public/postImages/', $imageName
    	);
    	$inputs['image'] = $imageName;
		return $inputs;
	}

	/**
	 * Create new resource in posts table.
	 *
	 * @param  array  $inputs
	 * @return void
	 */
	public function createPost( $inputs ){
		
		return $this->post->create( $this->createInputs($inputs) );
		
	}
	
	/**
	 * Update resource from posts table where id = $id.
	 *
	 * @param  int $id , array $inputs
	 * @return void
	 */
	public function updatePost( $id , $inputs ){
		return $this->post->find($id)->update($inputs);
	}
	
	/**
	 * Get resource from posts table for this subdomain where id = $id.
	 *
	 * @param  int  $id
	 * @return object
	 */
	public function getPostByID( $id ){
		return $this->post->find($id);
	}
	
	
	/**
	 * Get all resources from posts table.
	 *
	 * @return array
	 */
	public function getAllPosts(){
		if ($this->auth->User()) {
			return $this->post->orderBy('created_at' , 'desc')->get();
		}

		return $this->post->where('active' , '1')->orderBy('created_at','desc')->get();

	}

	

	public function deletePost( $id ) {
		if (null != $post = $this->getpostByID( $id )) {
			if(File::exists('postImages/'.$post->image))
			{
				File::delete('postImages/'.$post->image);
			}
			return $post->delete();
		}
	}

	public function changeActivePost( $id , $active ) {
		if (null != $post = $this->getpostByID( $id )) {
			$post->active = $active;
			$post->save();
			return true;
		}
	}

	

}