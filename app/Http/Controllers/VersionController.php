<?php
namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Item;
use App\Models\Project;
use App\Models\Version;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    public function index(Request $request)
    {
        return Version::where('document_id', $request->document_id)->get();
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
        $version = new Version([
            'name' => $request->name,
            'document_id' => $request->document_id
        ]);
        $version->save();
        return $this->success($version);
    }

    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();
        return $this->success();
    }
}