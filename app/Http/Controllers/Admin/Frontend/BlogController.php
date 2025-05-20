<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendBlog;
use App\Models\Frontend\FrontendBlogItem;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller {
    public function index() {
        $pageTitle   = "Manage Blog Content";
        $blogContent = FrontendBlog::first();
        return view('admin.frontend.blog.index', compact('pageTitle', 'blogContent'));
    }
    public function store(Request $request) {
        $request->validate([
            'subtitle' => 'required|string',
            'title'    => 'required|string',
        ]);

        $frontendBlog = FrontendBlog::first();

        if (! $frontendBlog) {
            $frontendBlog = new FrontendBlog();
        }

        $frontendBlog->subtitle = $request->subtitle;
        $frontendBlog->title    = $request->title;

        $frontendBlog->save();
        return back()->withSuccess('The blog content has been updated');
    }

    // item start
    public function itemIndex() {
        $pageTitle        = "Manage Blog Item";
        $blogItemContents = FrontendBlogItem::orderBy('id', 'desc')->get();
        return view('admin.frontend.blog.item.index', compact('pageTitle', 'blogItemContents'));
    }

    public function itemCreate() {
        $pageTitle       = "Create Blog Item";
        $blogItemContent = new FrontendBlogItem();
        return view('admin.frontend.blog.item.create', compact('pageTitle', 'blogItemContent'));
    }

    public function itemStore(Request $request) {
        $request->validate([
            'image'       => 'required|image|mimes:png,jpg,jpeg',
            'date'        => 'required|string',
            'month'       => 'required|string',
            'year'        => 'required|string',
            'title'       => 'required|string',
            'blog_link'   => 'required|string',
            'description' => 'required|string|max:1000',
            'button_name' => 'required|string',
            'button_link' => 'required|string',
        ]);

        $frontendBlogItem = new FrontendBlogItem();
        if ($request->hasFile('image')) {
            try {
                $folderPath              = "assets/images/frontend/blog/item/images/";
                $imageName               = uploadImage($request->image, $folderPath, $frontendBlogItem->image);
                $frontendBlogItem->image = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }
        $frontendBlogItem->date        = $request->date;
        $frontendBlogItem->month       = $request->month;
        $frontendBlogItem->year        = $request->year;
        $frontendBlogItem->title       = $request->title;
        $frontendBlogItem->blog_link   = $request->blog_link;
        $frontendBlogItem->description = $request->description;
        $frontendBlogItem->button_name = $request->button_name;
        $frontendBlogItem->button_link = $request->button_link;

        $frontendBlogItem->save();

        return redirect()->route('admin.frontend.blog.item.index')->withSuccess("Blog has been created !");
    }
    public function itemEdit($id) {
        $pageTitle        = "Edit Blog Item";
        $frontendBlogItem = FrontendBlogItem::findOrFail($id);
        return view('admin.frontend.blog.item.edit', compact('pageTitle', 'frontendBlogItem'));
    }

    public function itemUpdate(Request $request, $id) {
        $request->validate([
            'image'       => 'nullable|image|mimes:png,jpg,jpeg',
            'date'        => 'required|string',
            'month'       => 'required|string',
            'year'        => 'required|string',
            'title'       => 'required|string',
            'blog_link'   => 'required|string',
            'description' => 'required|string|max:1000',
            'button_name' => 'required|string',
            'button_link' => 'required|string',
        ]);

        $frontendBlogItem = FrontendBlogItem::findOrFail($id);
        if ($request->hasFile('image')) {
            try {
                $folderPath              = "assets/images/frontend/blog/item/images/";
                $imageName               = uploadImage($request->image, $folderPath, $frontendBlogItem->image);
                $frontendBlogItem->image = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }
        $frontendBlogItem->date      = $request->date;
        $frontendBlogItem->month     = $request->month;
        $frontendBlogItem->year      = $request->year;
        $frontendBlogItem->title     = $request->title;
        $frontendBlogItem->blog_link = $request->blog_link;

        $frontendBlogItem->description = $request->description;
        $frontendBlogItem->button_name = $request->button_name;
        $frontendBlogItem->button_link = $request->button_link;

        $frontendBlogItem->save();

        return redirect()->route('admin.frontend.blog.item.index')->withSuccess("Blog has been updated !");
    }
    public function itemDelete($id) {
        $frontendBlogItem = FrontendBlogItem::findOrFail($id);
        $frontendBlogItem->delete();
        return back()->withSuccess('The blog item has been deleted');
    }
}
