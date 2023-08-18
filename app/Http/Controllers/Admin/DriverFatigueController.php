<?php

namespace App\Http\Controllers\Admin;

use App\FatigueContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\State;

class DriverFatigueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function fatigueContentList()
    {
        $contents = FatigueContent::all();
        return view('admin.driverfatigue.index')->with('contents', $contents)->with('page', 'driverfatigue');
    }
    public function addFatigueContent()
    {
        return view('admin.driverfatigue.add')->with('page', 'driverfatigue');
    }
    public function storeFatigueContent(Request $request)
    {
        $content = new FatigueContent();
        $content->title = $request->title;
        $content->description = $request->description;
        $content->save();

        return redirect()->route('admin.driverfatigue.list');;
    }
    public function editFatigueContent($id)
    {
        $content = FatigueContent::find($id);
        return view('admin.driverfatigue.add')->with('content', $content)->with('page', 'driverfatigue');
    }
    public function updateFatigueContent(Request $request, $id)
    {
        $content = FatigueContent::find($id);
        $content->title = $request->title;
        $content->description = $request->description;
        $content->save();

        return redirect()->back()->with('message', 'It has been updated successfully.');
    }
    public function deleteFatigueContent($id)
    {
        $content = FatigueContent::find($id);
        $content->delete();
        return redirect()->back()->with('message', 'It has been deleted successfully.');
    }
}
