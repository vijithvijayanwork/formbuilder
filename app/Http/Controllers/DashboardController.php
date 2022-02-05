<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\FormGenerateRequest;
use App\Models\Base;
use App\Models\Forms;
use Auth;

class DashboardController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    private $base;

    public function __construct(Base $base) {
        $this->base = $base;
        $this->middleware('auth');
    }

    public function dashboard() {

        $user = Auth::user()->name;

        $forms = Forms::orderBy('id', 'desc')
                ->paginate(1);

        return view('pages.dashboard.dashboard', compact('user', 'forms'));
    }

    public function viewCreateForm() {

        $user = Auth::user()->name;

        return view('pages.dashboard.createform', compact('user'));
    }

    public function viewEditForm($id) {

        $user = Auth::user()->name;
        $form = Forms::where('id', $id)
                ->first();

        return view('pages.dashboard.editform', compact('user', 'form'));
    }

    public function generateForm(FormGenerateRequest $request) {

        $formname = $request->formname;
        $formdata = $request->formdata;
        $formaction = $request->formaction;
        $formmethod = $request->formmethod;

        $data = [
            'formname' => $formname,
            'formdata' => $formdata,
            'formaction' => $formaction,
            'formmethod' => $formmethod
        ];

        $form = Forms::create($data);

        if ($form) {
            return true;
        }

        return false;
    }

    public function updateForm(FormGenerateRequest $request) {

        $formname = $request->formname;
        $formdata = $request->formdata;
        $formaction = $request->formaction;
        $formmethod = $request->formmethod;

        $data = [
            'formname' => $formname,
            'formdata' => $formdata,
            'formaction' => $formaction,
            'formmethod' => $formmethod
        ];

        Forms::findOrFail($request->fid)->update($data);
        return true;
    }

    public function deleteForm(Request $request) {

        Forms::findOrFail($request->id)->delete();
        return true;
    }

}
