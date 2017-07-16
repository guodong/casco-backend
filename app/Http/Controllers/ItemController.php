<?php
namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Item;
use App\Models\Project;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        return Item::where('version_id', $request->version_id)->get();
    }

    public function show($id)
    {
        if ($id == 'root') {
            return Document::all();
        }
        return Document::find($id);
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