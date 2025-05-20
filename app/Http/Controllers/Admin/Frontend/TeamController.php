<?php
namespace App\Http\Controllers\Admin\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\FrontendTeam;
use App\Models\Frontend\FrontendTeamItem;
use Exception;
use Illuminate\Http\Request;

class TeamController extends Controller {
    public function index() {
        $pageTitle   = "Manage Team Content";
        $teamContent = FrontendTeam::first();
        return view('admin.frontend.team.index', compact('pageTitle', 'teamContent'));
    }
    public function store(Request $request) {
        $request->validate([
            'subtitle' => 'required|string',
            'title'    => 'required|string',
        ]);

        $frontendTeam = FrontendTeam::first();

        if (! $frontendTeam) {
            $frontendTeam = new FrontendTeam();
        }

        $frontendTeam->subtitle = $request->subtitle;
        $frontendTeam->title    = $request->title;

        $frontendTeam->save();
        return back()->withSuccess('The team content has been updated');
    }

    // item start
    public function itemIndex() {
        $pageTitle        = "Manage Team Member";
        $teamItemContents = FrontendTeamItem::orderBy('id', 'desc')->get();
        return view('admin.frontend.team.item.index', compact('pageTitle', 'teamItemContents'));
    }
    public function itemCreate() {
        $pageTitle = "Create Team Member";
        return view('admin.frontend.team.item.create', compact('pageTitle'));
    }
    public function itemStore(Request $request) {
        $request->validate([
            'image'             => 'required|image|mimes:png,jpg,jpeg',
            'name'              => 'required|string',
            'designation'       => 'required|string',
            'social_icon_one'   => 'required|string',
            'social_link_one'   => 'required|string',
            'social_icon_two'   => 'nullable|string',
            'social_link_two'   => 'nullable|string',
            'social_icon_three' => 'nullable|string',
            'social_link_three' => 'nullable|string',
            'social_icon_four'  => 'nullable|string',
            'social_link_four'  => 'nullable|string',
        ]);

        $frontendTeamItem = new FrontendTeamItem();
        if ($request->hasFile('image')) {
            try {
                $folderPath              = "assets/images/frontend/team/images/";
                $imageName               = uploadImage($request->image, $folderPath, $frontendTeamItem->image);
                $frontendTeamItem->image = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }
        $frontendTeamItem->name              = $request->name;
        $frontendTeamItem->designation       = $request->designation;
        $frontendTeamItem->social_icon_one   = $request->social_icon_one;
        $frontendTeamItem->social_link_one   = $request->social_link_one;
        $frontendTeamItem->social_icon_two   = $request->social_icon_two;
        $frontendTeamItem->social_link_two   = $request->social_link_two;
        $frontendTeamItem->social_icon_three = $request->social_icon_three;
        $frontendTeamItem->social_link_three = $request->social_link_three;
        $frontendTeamItem->social_icon_four  = $request->social_icon_four;
        $frontendTeamItem->social_link_four  = $request->social_link_four;

        $frontendTeamItem->save();

        return redirect()->route('admin.frontend.team.item.index')->withSuccess("Team member has been created !");
    }

    public function itemEdit($id) {
        $pageTitle        = "Edit Pricing Item";
        $frontendTeamItem = FrontendTeamItem::findOrFail($id);
        return view('admin.frontend.team.item.edit', compact('pageTitle', 'frontendTeamItem'));
    }

    public function itemUpdate(Request $request, $id) {
        $request->validate([
            'image'             => 'nullable|image|mimes:png,jpg,jpeg',
            'name'              => 'required|string',
            'designation'       => 'required|string',
            'social_icon_one'   => 'required|string',
            'social_link_one'   => 'required|string',
            'social_icon_two'   => 'nullable|string',
            'social_link_two'   => 'nullable|string',
            'social_icon_three' => 'nullable|string',
            'social_link_three' => 'nullable|string',
            'social_icon_four'  => 'nullable|string',
            'social_link_four'  => 'nullable|string',
        ]);

        $frontendTeamItem = FrontendTeamItem::findOrFail($id);
        if ($request->hasFile('image')) {
            try {
                $folderPath              = "assets/images/frontend/team/images/";
                $imageName               = uploadImage($request->image, $folderPath, $frontendTeamItem->image);
                $frontendTeamItem->image = $imageName;
            } catch (Exception $ex) {
                return back()->withErrors("The image couldn't be uploaded");
            }
        }
        $frontendTeamItem->name              = $request->name;
        $frontendTeamItem->designation       = $request->designation;
        $frontendTeamItem->social_icon_one   = $request->social_icon_one;
        $frontendTeamItem->social_link_one   = $request->social_link_one;
        $frontendTeamItem->social_icon_two   = $request->social_icon_two;
        $frontendTeamItem->social_link_two   = $request->social_link_two;
        $frontendTeamItem->social_icon_three = $request->social_icon_three;
        $frontendTeamItem->social_link_three = $request->social_link_three;
        $frontendTeamItem->social_icon_four  = $request->social_icon_four;
        $frontendTeamItem->social_link_four  = $request->social_link_four;

        $frontendTeamItem->save();
        return redirect()->route('admin.frontend.team.item.index')->withSuccess('The team member has been updated');
    }

    public function itemDelete($id) {
        $frontendTeamItem = FrontendTeamItem::findOrFail($id);
        $frontendTeamItem->delete();
        return back()->withSuccess('The team member has been deleted');
    }

    // item end
}
