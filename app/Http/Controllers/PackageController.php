<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{

    public function index()
    {
        $packages = Package::all();
        // return response()->json($packages);
        return view('layouts.master', compact('packages'));
    }

    //
    public function store(Request $request)
    {
        $request->validate([

            'Package_description' => 'required',
            'weight' => 'required|numeric',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
            'length' => 'required|numeric',
        ]);

        $package = Package::create([
            'Package_description' => $request->input('Package_description'),
            'weight' => $request->input('weight'),
            'width' => $request->input('width'),
            'height' => $request->input('height'),
            'length' => $request->input('length'),
        ]);

        return redirect()->route('home');
        // return view('layouts.master', );
    }

   

    public function getPackage($id)
    {
        $package = Package::find($id);
        //json response
        return response()->json($package);
        // return view('edit-package', compact('package'));
    }

    public function update(Request $request, $id)
    {
        $package = Package::find($id);
        $package->update([
            'Package_description' => $request->input('Package_description'),
            'weight' => $request->input('weight'),
            'width' => $request->input('width'),
            'height' => $request->input('height'),
            'length' => $request->input('length'),
        ]);
        return redirect()->route('home');
        // return view('layouts.master', );
    }   

    public function destroy($id)
    {
        $package = Package::find($id);
        $package->delete();
        return redirect()->route('home');
    }   



    public function packagesDatatable()
    {
        $packages = Package::all();
        // return view('dashboard', compact('packages'));
        return response()->json($packages);
    }


}
