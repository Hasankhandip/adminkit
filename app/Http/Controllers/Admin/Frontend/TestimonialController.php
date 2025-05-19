<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendTestimonial;
use App\Models\Frontend\FrontendTestimonialItem;
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
        return view('admin.frontend.product.item.index', compact('pageTitle', 'testimonialItemContents'));
    }

}
