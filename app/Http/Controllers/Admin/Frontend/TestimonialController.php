<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendTestimonial;
use App\Models\Frontend\FrontendTestimonialClient;
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
    public function clientIndex() {
        $pageTitle                 = "Manage Testimonial Item";
        $testimonialClientContents = FrontendTestimonialClient::orderBy('id', 'desc')->get();
        return view('admin.frontend.testimonial.client.index', compact('pageTitle', 'testimonialClientContents'));
    }

    public function clientCreate() {
        $pageTitle                = "Create Testimonial Item";
        $testimonialClientContent = new FrontendTestimonialClient();
        return view('admin.frontend.testimonial.client.create', compact('pageTitle', 'testimonialClientContent'));
    }

    public function clientStore(Request $request) {
        $request->validate([
            'image'       => 'required|image|mimes:png,jpg,jpeg',
            'name'        => 'required|string',
            'designation' => 'required|string',
            'description' => 'required|string|max:1000',
        ]);

        $frontendTestimonialClient = new FrontendTestimonialClient();
        if ($request->hasFile('image')) {
            try {
                $folderPath                       = "assets/images/frontend/testimonial/item/images/";
                $imageName                        = uploadImage($request->image, $folderPath, $frontendTestimonialClient->image);
                $frontendTestimonialClient->image = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }
        $frontendTestimonialClient->name        = $request->name;
        $frontendTestimonialClient->designation = $request->designation;
        $frontendTestimonialClient->description = $request->description;

        $frontendTestimonialClient->save();

        return redirect()->route('admin.frontend.testimonial.client.index')->withSuccess("Testimonial has been created !");
    }

    public function clientEdit($id) {
        $pageTitle                 = "Edit Testimonial Client";
        $frontendTestimonialClient = FrontendTestimonialClient::findOrFail($id);
        return view('admin.frontend.testimonial.client.edit', compact('pageTitle', 'frontendTestimonialClient'));
    }

    public function clientUpdate(Request $request, $id) {
        $request->validate([
            'image'       => 'nullable|image|mimes:png,jpg,jpeg',
            'name'        => 'required|string',
            'designation' => 'required|string',
            'description' => 'required|string|max:1000',
        ]);
        $frontendTestimonialClient = FrontendTestimonialClient::findOrFail($id);
        if ($request->hasFile('image')) {
            try {
                $folderPath                       = "assets/images/frontend/testimonial/item/images/";
                $imageName                        = uploadImage($request->image, $folderPath, $frontendTestimonialClient->image);
                $frontendTestimonialClient->image = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }
        $frontendTestimonialClient->name        = $request->name;
        $frontendTestimonialClient->designation = $request->designation;
        $frontendTestimonialClient->description = $request->description;

        $frontendTestimonialClient->save();
        return redirect()->route('admin.frontend.testimonial.client.index')->withSuccess('The testimonial client has been updated');
    }
    public function clientDelete($id) {
        $frontendTestimonialClient = FrontendTestimonialClient::findOrFail($id);
        $frontendTestimonialClient->delete();
        return back()->withSuccess('The testimonial client has been deleted');
    }
}
