<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogManagement;
use Illuminate\Http\Request;

class BlogManagementController extends Controller
{
    /**
     * Fetch all blogs
     */
    public function index()
    {
        $blogs = BlogManagement::all();

        return response()->json($blogs);
    }
}
