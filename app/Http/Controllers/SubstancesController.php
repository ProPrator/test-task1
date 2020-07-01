<?php

namespace App\Http\Controllers;

use App\Substance;
use Illuminate\Http\Request;

class SubstancesController extends Controller
{
    public function showAll()
    {
        $substances = Substance::withTrashed()->paginate(10);

        return view('admin.substances', compact('substances'));
    }

    public function deleted($id)
    {
        $substance = Substance::find($id);
        $substance->forceDelete();

        return redirect()->route('substances');
    }

    public function visible($id)
    {
        $substance = Substance::withTrashed()->find($id);

        if (!$substance->deleted_at) {
            $substance->medicines()->delete();
            $substance->delete();
        } else {
            $substance->restore();
            $substance->medicines()->restore();
        }
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

    public function add(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.addSubstance');
        } else {
            if ($request->name) {
                $substance = new Substance();
                $substance->name = $request->input('name');
                $substance->save();
            }
            return redirect()->route('substances');
        }
    }
}
