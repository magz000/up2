<?php

namespace App\Http\Controllers\Api;

use App\Model\Ideator;
use App\Model\MentorProjects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IdeatorController extends Controller
{
    public function index()
    {
        $ideator = Ideator::latest()
            ->paginate(20);

        return $ideator;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $ideator = new Ideator();
        $ideator->name = $request->input('name');
        $ideator->description = $request->input('description');
        $ideator->save();

        $mentorProjects = new MentorProjects();
        $mentorProjects->mentor_id = $request->input('mentor_id');;
        $mentorProjects->project_id = $ideator->id;
        $mentorProjects->save();


        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $destinationPath = 'img/cover/';

            $filename = 'project-' . $ideator->id . '-' . $mentorProjects->mentor_id . '.' . $file->getClientOriginalExtension();

            if(file_exists($destinationPath . '/' . $filename))
                unlink($destinationPath . '/' . $filename) or die("Couldn't delete file");

            $file->move($destinationPath, $filename);

            $ideator->cover_image = $filename;

            $ideator->save();

            return response()->json('Successfully added');

//            Session::flash('flash_message', 'Successfully uploaded!');

        }
        else{
            return response()->json('Upload Fail');
//            Session::flash('upload_failed', 'No file uploaded');

        }
    }

    public function show($id)
    {
        $ideator = Ideator::findOrFail($id);

        return $ideator->load('mentors.mentor');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
