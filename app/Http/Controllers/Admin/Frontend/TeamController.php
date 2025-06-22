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
            'image'         => 'required|image|mimes:png,jpg,jpeg,webp',
            'name'          => 'required|string',
            'designation'   => 'required|string',
            'telegram_link' => 'required|string',
            'youtube_link'  => 'required|string',
            'twitter_link'  => 'required|string',
            'facebook_link' => 'required|string',
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
        $frontendTeamItem->name          = $request->name;
        $frontendTeamItem->designation   = $request->designation;
        $frontendTeamItem->telegram_link = $request->telegram_link;
        $frontendTeamItem->youtube_link  = $request->youtube_link;
        $frontendTeamItem->twitter_link  = $request->twitter_link;
        $frontendTeamItem->facebook_link = $request->facebook_link;

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
            'image'         => 'nullable|image|mimes:png,jpg,jpeg,webp',
            'name'          => 'required|string',
            'designation'   => 'required|string',
            'telegram_link' => 'required|string',
            'youtube_link'  => 'required|string',
            'twitter_link'  => 'required|string',
            'facebook_link' => 'required|string',
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
        $frontendTeamItem->name          = $request->name;
        $frontendTeamItem->designation   = $request->designation;
        $frontendTeamItem->telegram_link = $request->telegram_link;
        $frontendTeamItem->youtube_link  = $request->youtube_link;
        $frontendTeamItem->twitter_link  = $request->twitter_link;
        $frontendTeamItem->facebook_link = $request->facebook_link;

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
