<?php

namespace App\Http\Controllers;

use App\Substance;
use Illuminate\Http\Request;

class SubstancesController extends Controller
{
    public function showAll()
    {
        $substances = Substance::paginate(10);

        return view('admin.substances', compact('substances'));
    }

    public function deleted($id)
    {
        $substance = Substance::find($id);

        $substance->delete();

        return redirect()->route('substances');
    }

    public function visible($id)
    {
        $substance = Substance::find($id);

        if ($substance->visible) {
            $substance->visible = false;
        } else {
            $substance->visible = true;
        }

        $substance->save();

        return redirect()->route('substances');
    }

    public function edit($id)
    {
        $substance = Substance::find($id);

        return view('admin.editSubstances', compact('substance'));
    }

    public function save(Request $request, $id)
    {
        $substance = Substance::find($id);

        if ($request->name) {
            $substance->name = $request->input('name');
            $substance->save();
        }

        return redirect()->route('substances');
    }
}
