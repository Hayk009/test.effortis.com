<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

use App\Http\Requests;
use App\Http\Requests\LectureCreateRequest;
use App\Http\Requests\LectureEditRequest;
use App\Http\Controllers\Controller;
use App\Contracts\LectureServiceInterface;
use App\Http\Requests\LectureRequest;
use File;
use Response;
class LecturesController extends Controller
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new authentication controller instance.
     *
     * @param  Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;

        // $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LectureServiceInterface $lectureService)
    {
        return view('lectures.index', ['lectures' => $lectureService->getAllLectures()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lectures.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( LectureCreateRequest $request, LectureServiceInterface $lectureService )
    {
        if($lectureService->createLecture($request->all())){
            return redirect('lectures')->with('success','Lecture has ben successfully created');
        } else {
            return redirect('lecture')->withErrors('This lecture is already exist!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( $id , LectureServiceInterface $lectureService)
    {
        if (null != $lecture = $lectureService->getLectureByID( $id )) {
            $file = public_path()."/files/".$lecture->file;
            if (File::isFile($file))
            {
                $file = File::get($file);
                $response = response()->make($file, 200);
                // using this will allow you to do some checks on it (if pdf/docx/doc/xls/xlsx)
                $response->header('Content-Type', 'application/pdf');
            
                return $response;
            }
        }

        return redirect('/lectures');
    }
    public function download( $id , LectureServiceInterface $lectureService)
    {
        if (null != $lecture = $lectureService->getLectureByID( $id )) {
            $file = public_path()."/files/".$lecture->file;
            if (File::isFile($file))
            {
                return response()->download($file);
            }
        }

        return redirect('/lectures');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id , LectureServiceInterface $lectureService )
    {
        if (null != $lecture = $lectureService->getLectureByID( $id )) {

            return view('lectures.edit', [ 'lecture' => $lecture ]);
            
        } else {
            return redirect('/lectures');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id , LectureEditRequest $request, LectureServiceInterface $lectureService)
    {
        $lectureService->updateLecture( $id , $request->all() );
        return redirect('lectures')->with('success','Lecture has ben successfully upated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , LectureServiceInterface $lectureService)
    {
        $lectureService->deleteLecture($id);
        return redirect('lectures')->with('success','Lecture has ben successfully deleted');
    }

    public function active($id , $active , LectureServiceInterface $lectureService)
    {
        if (null != $lecture = $lectureService->getLectureByID( $id )) {
            $lectureService->changeActiveLecture($id , $active );
            return redirect('lectures')->with('success','Lecture Active has ben successfully deleted');
        } else {
            return redirect('/lectures');
        }
    }
}
