<?php namespace App\Services;

use Illuminate\Contracts\Auth\Guard;
use App\Contracts\LectureServiceInterface;

use App\Models\Lecture;
use File;


class LectureService implements LectureServiceInterface {

	public function __construct( Lecture $lecture, Guard $auth){
		$this->lecture = $lecture;
		$this->auth = $auth;
	}

	/**
	 * Create inputs for new Lecture.
	 *
	 * @return array
	 */
	public function createInputs( $inputs ) {
		$lectureName = str_random(64). '.' . 
        $inputs['file']->getClientOriginalExtension();
        $inputs['file']->move(
        	base_path() . '/public/files/', $lectureName
    	);
    	$inputs['file'] = $lectureName;
		return $inputs;
	}

	/**
	 * Create new resource in Lectures table.
	 *
	 * @param  array  $inputs
	 * @return void
	 */
	public function createLecture( $inputs ){
		
		return $this->lecture->create( $this->createInputs($inputs) );
		
	}
	
	/**
	 * Update resource from Lectures table where id = $id.
	 *
	 * @param  int $id , array $inputs
	 * @return void
	 */
	public function updateLecture( $id , $inputs ){
		return $this->lecture->find($id)->update($inputs);
	}
	
	/**
	 * Get resource from Lectures table for this subdomain where id = $id.
	 *
	 * @param  int  $id
	 * @return object
	 */
	public function getLectureByID( $id ){
		return $this->lecture->find($id);
	}
	
	
	/**
	 * Get all resources from Lectures table.
	 *
	 * @return array
	 */
	public function getAllLectures(){
		if ($this->auth->User()) {
			return $this->lecture->orderBy('created_at' , 'desc')->get();
		}

		return $this->lecture->where('active' , '1')->orderBy('created_at','desc')->get();

	}

	

	public function deleteLecture( $id ) {
		if (null != $lecture = $this->getLectureByID( $id )) {
			if(File::exists('files/'.$lecture->file))
			{
				File::delete('files/'.$lecture->file);
			}
			return $lecture->delete();
		}
	}

	public function changeActiveLecture( $id , $active ) {
		if (null != $lecture = $this->getLectureByID( $id )) {
			$lecture->active = $active;
			$lecture->save();
			return true;
		}
	}

	

}