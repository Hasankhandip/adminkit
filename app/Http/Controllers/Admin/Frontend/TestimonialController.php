<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendTestimonial;
use App\Models\Frontend\FrontendTestimonialItem;
use Exception;
use Illuminate\Http\Request;

class TestimonialController extends Controller {
    public function index() {
        $pageTitle          = "Manage Testimonial Content";
        $testimonialContent = FrontendTestimonial::first();
        return view('admin.frontend.testimonial.index', compact('pageTitle', 'testimonialContent'));
    }
    public function store(Request $request) {
        $request->validate([
            'subtitle' => 'required|string',
            'title'    => 'required|string',
        ]);

        $frontendTestimonial = FrontendTestimonial::first();

        if (! $frontendTestimonial) {
            $frontendTestimonial = new FrontendTestimonial();
        }

        $frontendTestimonial->subtitle = $request->subtitle;
        $frontendTestimonial->title    = $request->title;

        $frontendTestimonial->save();
        return back()->withSuccess('The testimonial content has been updated');
    }

    // item start
    public function itemIndex() {
        $pageTitle               = "Manage Testimonial Item";
        $testimonialItemContents = FrontendTestimonialItem::orderBy('id', 'desc')->get();
        return view('admin.frontend.testimonial.item.index', compact('pageTitle', 'testimonialItemContents'));
    }

    public function itemCreate() {
        $pageTitle              = "Create Testimonial Item";
        $testimonialItemContent = new FrontendTestimonialItem();
        return view('admin.frontend.testimonial.item.create', compact('pageTitle', 'testimonialItemContent'));
    }

    public function itemStore(Request $request) {
        $request->validate([
            'image'       => 'required|image|mimes:png,jpg,jpeg',
            'name'        => 'required|string',
            'designation' => 'required|string',
            'description' => 'required|string|max:1000',
        ]);

        $frontendTestimonialItem = new FrontendTestimonialItem();
        if ($request->hasFile('image')) {
            try {
                $folderPath                     = "assets/images/frontend/testimonial/item/images/";
                $imageName                      = uploadImage($request->image, $folderPath, $frontendTestimonialItem->image);
                $frontendTestimonialItem->image = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }
        $frontendTestimonialItem->name        = $request->name;
        $frontendTestimonialItem->designation = $request->designation;
        $frontendTestimonialItem->description = $request->description;

        $frontendTestimonialItem->save();

        return redirect()->route('admin.frontend.testimonial.item.index')->withSuccess("Testimonial has been created !");
    }

    public function itemEdit($id) {
        $pageTitle               = "Edit Testimonial Item";
        $frontendTestimonialItem = FrontendTestimonialItem::findOrFail($id);
        return view('admin.frontend.testimonial.item.edit', compact('pageTitle', 'frontendTestimonialItem'));
    }

    public function itemUpdate(Request $request, $id) {
        $request->validate([
            'image'       => 'nullable|image|mimes:png,jpg,jpeg',
            'name'        => 'required|string',
            'designation' => 'required|string',
            'description' => 'required|string|max:1000',
        ]);
        $frontendTestimonialItem = FrontendTestimonialItem::findOrFail($id);
        if ($request->hasFile('image')) {
            try {
                $folderPath                     = "assets/images/frontend/testimonial/item/images/";
                $imageName                      = uploadImage($request->image, $folderPath, $frontendTestimonialItem->image);
                $frontendTestimonialItem->image = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }
        $frontendTestimonialItem->name        = $request->name;
        $frontendTestimonialItem->designation = $request->designation;
        $frontendTestimonialItem->description = $request->description;

        $frontendTestimonialItem->save();
        return redirect()->route('admin.frontend.testimonial.item.index')->withSuccess('The testimonial item has been updated');
    }
    public function itemDelete($id) {
        $frontendTestimonialItem = FrontendTestimonialItem::findOrFail($id);
        $frontendTestimonialItem->delete();
        return back()->withSuccess('The testimonial item has been deleted');
    }
}
