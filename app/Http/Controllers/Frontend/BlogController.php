<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller {
    public function index() {
        $pageTitle    = "Blogs";
        $blogContents = Blog::orderBy('id', 'asc')->get();
        return view('frontend.blog.index', compact('pageTitle', 'blogContents'));
    }
    public function details() {
        $pageTitle = "Blog Details";
        return view('frontend.blog.details', compact('pageTitle'));
    }
}
