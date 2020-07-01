<?php

namespace App\Http\Controllers;

use App\Medicine;
use App\Substance;
use Illuminate\Http\Request;

class MedicinesController extends Controller
{
    public function main()
    {
        return view('welcome');
    }

    public function showAll()
    {
        $medicines = Medicine::withTrashed()->paginate(10);

        return view('admin.medicines', compact('medicines'));
    }

    public function deleted($id)
    {
        $medicine = Medicine::find($id);
        $medicine->forceDelete();

        return redirect()->route('medicines');
    }

    public function visible($id)
    {
        $medicine = Medicine::withTrashed()->find($id);

        if (!$medicine->deleted_at) {
            $medicine->delete();
        } else {
            $medicine->restore();
        }
        return redirect()->route('medicines');
    }

    public function edit($id)
    {
        $medicine = Medicine::find($id);

        return view('admin.editMedicine', compact('medicine'));
    }

    public function save(Request $request, $id)
    {
        $medicine = Medicine::find($id);

        if ($request->name) {
            $medicine->name = $request->input('name');
            $medicine->save();
        }
        return redirect()->route('medicines');
    }

    public function add(Request $request)
    {
        if ($request->isMethod('get')) {
            $substances = Substance::all();
            return view('admin.addMedicine', compact('substances'));
        } else {
            $medicine = new Medicine();
            $medicine->name = $request->input('name');

            $substances = [];

            foreach ($request->input() as $key => $elem) {
                if (is_numeric($key)) {
                    $substances[] = $key;
                }
            }
            $medicine->save();
            $medicine->substances()->attach($substances);

            return redirect()->route('medicines');
        }
    }
}
