<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller {
    public function index() {
        $pageTitle = "Manage Service";
        $services  = Service::orderBy('id', 'desc')->get();
        return view('admin.service.index', compact('pageTitle', 'services'));
    }

    public function create() {
        $pageTitle = "Create Service";
        return view('admin.service.create', compact('pageTitle'));
    }
    public function store(Request $request) {
        $request->validate([
            'name'  => 'required|unique:services,name',
            'image' => 'nullable|mimes:png,jpg,jpeg',
        ]);
        $service       = new Service();
        $service->name = $request->name;
        $service->slug = str()->slug($request->name);
        if ($request->hasFile('image')) {
            try {
                $folderPath = 'assets/images/service/';
                $imageName  = time() . '.' . $request->image->extension();
                $request->image->move(public_path($folderPath), $imageName);
                $service->image = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be updated !");
            }
        }
        $service->save();
        return redirect()->route('admin.service.index')->with('success', 'Your service has been created !');
    }
    public function edit($id) {
        $pageTitle = "Edit Service";
        $service   = Service::findOrFail($id);
        return view('admin.service.edit', compact('pageTitle', 'service'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name'  => 'required|unique:services,name,' . $id,
            'image' => 'nullable|mimes:png,jpg,jpeg',
        ]);

        $service       = Service::findOrFail($id);
        $service->name = $request->name;
        $service->slug = str()->slug($request->name);
        if ($request->hasFile('image')) {
            try {
                $folderPath   = 'assets/images/service/';
                $oldImagePath = public_path($folderPath . $service->image);
                if ($service->image && file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path($folderPath), $imageName);
                $service->image = $imageName;
            } catch (Exception $ex) {
                return back()->with('error', "The image couldn't be uploaded !");
            }
        }
        $service->status = $request->status ?? 0;
        $service->save();
        return redirect()->route('admin.service.index')->with('success', "Your service has been updated !");
    }
}
