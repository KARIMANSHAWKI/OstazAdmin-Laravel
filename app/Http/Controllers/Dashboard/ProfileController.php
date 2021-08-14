<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Permission;
use  App\Http\Requests\Dashboard\ProfileRequest;
use Illuminate\Support\Facades\File;



class ProfileController extends Controller
{
    public function  index(){
        $userData =  Auth::guard('admin')->user();

        return view('dashboard.profile.index')->with('userData', $userData);

    }

    public function edit(){
        $userData =  Auth::guard('admin')->user();
        return view('dashboard.profile.edit')->with('userData', $userData);
    }

    public function update(ProfileRequest $request){

        $userData =  Auth::guard('admin')->user();
        $userData->first_name = $request->first_name;
        $userData->last_name = $request->last_name;
        $userData->email = $request->email;
        $userData->phone = $request->phone;


         $path = public_path('dashboard/ltr/assets/img/'. $request->photo);
        if(File::exists($path) && $request->file('image') ) {
            File::delete($path);
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('dashboard/ltr/assets/img/'), $imageName);
            $userData->image = $imageName;
        }
        
        $userData->save();
        return redirect()->route('dashboard.profile.index');
    }
}
