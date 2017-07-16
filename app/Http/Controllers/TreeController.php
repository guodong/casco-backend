<?php
namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Project;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    public function index(Request $request)
    {
        return Project::all();
    }

    public function show($id)
    {
        if ($id == 'root') {
            return Document::where('parent_id', '0')->get();
        }
        $doc = Document::find($id);
        $doc->children;
        return $doc->children;
    }

    public function store(Request $request)
    {
        $parentId = $request->parentId;
        if ($request->parentId == 'root') {
            $parentId = 0;
        }
        $document = new Document([
            'name' => $request->name,
            'type' => $request->type,
            'parent_id' => $parentId
        ]);
        $document->save();
        return $this->success($document);
    }

    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();
        return $this->success();
    }
}