<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller {
    public function index() {
        $pageTitle    = "Manage Blog";
        $blogContents = Blog::orderBy('id', 'desc')->get();
        return view('admin.blog.index', compact('pageTitle', 'blogContents'));
    }
    public function create() {
        $pageTitle   = "Create Blog";
        $blogContent = new Blog();
        return view('admin.blog.create', compact('pageTitle', 'blogContent'));
    }

    public function store(Request $request) {
        $request->validate([
            'image'       => 'required|image|mimes:png,jpg,jpeg,webp',
            'date'        => 'required|string',
            'month'       => 'required|string',
            'year'        => 'required|string',
            'title'       => 'required|string',
            'blog_link'   => 'required|string',
            'description' => 'required|string|max:1000',
            'button_name' => 'required|string',
            'button_link' => 'required|string',
        ]);

        $blogContent = new Blog();
        if ($request->hasFile('image')) {
            try {
                $folderPath         = "assets/images/blog/image/";
                $imageName          = uploadImage($request->image, $folderPath, $blogContent->image);
                $blogContent->image = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }
        $blogContent->date        = $request->date;
        $blogContent->month       = $request->month;
        $blogContent->year        = $request->year;
        $blogContent->title       = $request->title;
        $blogContent->blog_link   = $request->blog_link;
        $blogContent->description = $request->description;
        $blogContent->button_name = $request->button_name;
        $blogContent->button_link = $request->button_link;

        $blogContent->save();

        return redirect()->route('admin.blog.index')->withSuccess("Blog has been created !");
    }
    public function edit($id) {
        $pageTitle   = "Edit Blog";
        $blogContent = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('pageTitle', 'blogContent'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'image'       => 'nullable|image|mimes:png,jpg,jpeg,webp',
            'date'        => 'required|string',
            'month'       => 'required|string',
            'year'        => 'required|string',
            'title'       => 'required|string',
            'blog_link'   => 'required|string',
            'description' => 'required|string|max:1000',
            'button_name' => 'required|string',
            'button_link' => 'required|string',
        ]);

        $blogContent = Blog::findOrFail($id);
        if ($request->hasFile('image')) {
            try {
                $folderPath         = "assets/images/blog/image/";
                $imageName          = uploadImage($request->image, $folderPath, $blogContent->image);
                $blogContent->image = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }
        $blogContent->date        = $request->date;
        $blogContent->month       = $request->month;
        $blogContent->year        = $request->year;
        $blogContent->title       = $request->title;
        $blogContent->blog_link   = $request->blog_link;
        $blogContent->description = $request->description;
        $blogContent->button_name = $request->button_name;
        $blogContent->button_link = $request->button_link;

        $blogContent->save();

        return redirect()->route('admin.blog.index')->withSuccess("Blog has been updated !");
    }
    public function delete($id) {
        $blogContent = Blog::findOrFail($id);
        $blogContent->delete();
        return back()->withSuccess('The blog has been deleted');
    }

}
