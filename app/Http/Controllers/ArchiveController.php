<?php
namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Document;
use App\Models\Item;
use App\Models\Project;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        return Archive::where('project_id', $request->project_id)->get();
    }

    public function show($id)
    {
        return Archive::find($id);
    }

    public function store(Request $request)
    {
        $archive = new Archive($request->all());
        $archive->save();
        return $this->success($archive);
    }

    public function destroy($id)
    {
        $document = Archive::find($id);
        $document->delete();
        return $this->success();
    }
}