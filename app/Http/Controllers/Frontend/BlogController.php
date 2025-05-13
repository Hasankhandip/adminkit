<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class BlogController extends Controller {
    public function index() {
        $headTitle  = "BinaryEcom - Blog";
        $innerTitle = "Blogs";
        return view('frontend.blog.index', compact('headTitle', 'innerTitle'));
    }
    public function details() {
        $headTitle  = "BinaryEcom - Blog Details";
        $innerTitle = "Blog Details";
        return view('frontend.blog.details', compact('headTitle', 'innerTitle'));
    }
}
