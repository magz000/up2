<?php

namespace App\Http\Controllers\Api;

use App\Model\Mentor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MentorController extends Controller
{
    public function index()
    {
        $mentors = Mentor::latest()
            ->paginate(20);

        return $mentors;
    }

    public function create()
    {

    }


    public function store(Request $request)
    {
        $mentor = new Mentor();
        $mentor->name = $request->input('name');
        $mentor->save();

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $destinationPath = 'img/mentors/';

            $filename = 'mentor-' . $mentor->id . '-' . $mentor->name . '.' . $file->getClientOriginalExtension();

            if(file_exists($destinationPath . '/' . $filename))
                    unlink($destinationPath . '/' . $filename) or die("Couldn't delete file");

            $file->move($destinationPath, $filename);

            $mentor->image = $filename;

            $mentor->save();

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
        $mentor = Mentor::findOrFail($id);

        return $mentor->load('projects.project');
    }


    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
