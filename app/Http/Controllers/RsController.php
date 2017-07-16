<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rs;
use App\Models\Version;
use Illuminate\Http\Request;

class RsController extends Controller
{
    public function index(Request $request)
    {
        return Version::find($request->get('version_id'))->rss;
    }

    public function show($id)
    {
        return Rs::find($id);
    }
}