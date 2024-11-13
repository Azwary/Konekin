<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\joins;
use App\Models\kegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Superuser extends Controller
{
    public function Home()
    {
        $User = User::all();
        $kegiatan = kegiatan::all();
        return view('SuperUser.SUhome', compact('User', 'kegiatan'));
    }

    public function kelola()
    {
        return view('SuperUser.SUkelola');
    }

    public function user()
    {
        $User = User::all();
        return view('SuperUser.SUusers', compact('User'));
    }

    public function kegiatan(Request $request, $id)
    {
        $komunitass = Community::where('id_komunitas', $id)->first();
        $kegiatan = kegiatan::all();

        return view('SuperUser.SUkelolakegiatan', compact('komunitass', 'kegiatan'));
    }

    public function create(Request $request, $id)
    {
        $komunitass = Community::where('id_komunitas', $id)->first();
        $kegiatan = kegiatan::all();

        return view('SuperUser.SUkelolakegiatan', compact('komunitass', 'kegiatan'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('landing.page')->with('logoutMessage', 'You have been logged out. Please log in again.');
    }

    public function editkomunitas($id_komunitas)
    {
        $komunitass = Community::find($id_komunitas);

        if (!$komunitass) {
            return redirect()->back()->with('error', 'Community not found.');
        }

        return view('SuperUser.Sukelolakomunitas', compact('komunitass'));
    }

    public function updatekomunitas(Request $request, $id_komunitas)
    {
        $request->validate([
            'new_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'new_name' => 'sometimes|required|string|max:255',
            'description_komunitas' => 'sometimes|required|string|max:255',
        ]);

        $community = Community::findOrFail($id_komunitas);

        if ($request->has('new_name')) {
            $community->nama_komunitas = $request->input('new_name');
        }

        if ($request->has('description_komunitas')) {
            $community->description_komunitas = $request->input('description_komunitas');
        }


        $community->save();

        return redirect()->route('superuser.kelola');
    }

    public function hapuskomunitas($id_komunitas)
    {
        $komunitas = Community::find($id_komunitas);

        if ($komunitas) {
            joins::where('id_komunitas', $id_komunitas)->delete();
            $komunitas->delete();
            return redirect()->route('superuser.kelola')->with('success', 'Komunitas dan joint berhasil dihapus');
        } else {

        }
    }
   public function editkegiatan($id_kegiatan)
   {
       $kegiatan = kegiatan::find($id_kegiatan);

       if (!$kegiatan) {
           return redirect()->back()->with('error', 'Kegiatan not found.');
       }

       return view('SuperUser.partials.SUEditKegiatan', compact('kegiatan'));
   }

   public function updatekegiatan(Request $request, $id_kegiatan)
   {
       $request->validate([
           'new_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'new_name' => 'sometimes|required|string|max:255',
           'description_komunitas' => 'sometimes|required|string|max:255',
       ]);

       $kegiatan = kegiatan::findOrFail($id_kegiatan);

       if ($request->has('new_name')) {
           $kegiatan->nama_kegiatan = $request->input('new_name');
       }

       if ($request->has('description_komunitas')) {
           $kegiatan->detail_kegiatan = $request->input('description_komunitas');
       }

       if ($request->hasFile('new_image')) {

       }

       $kegiatan->save();

       return view('SuperUser.SUkelola');
   }

   public function hapuskegiatan($id_kegaiatn)
   {
       $kegiatan = kegiatan::find($id_kegaiatn);
       $kegiatan->delete();

       return view('SuperUser.SUkelola');
   }

   public function edituser($id_user)
   {
       $user = User::find($id_user);

       if (!$user) {
           return redirect()->back()->with('error', 'User not found.');
       }

       return view('SuperUser.partials.SUuserEdit', compact('user'));
   }

   public function updateuser(Request $request, $id_user)
   {
       $request->validate([
           'name' => 'sometimes|required|string|max:255',
        //    'password' => 'sometimes|required|string|max:255',
           'role' => 'required',
       ]);

       $user = User::findOrFail($id_user);


        $user->name = $request->input('name');
        $user->role = $request->input('role');
        $user->password = bcrypt($request->input('password')); // You may want to hash the password, depending on your application logic

        // dd($request->all());






       $user->save();

       return redirect()->route('superuser.user');
   }



   public function hapususer($id_user)
   {
       $user = User::find($id_user);

       if ($user) {
           User::where('id', $id_user)->delete();
           $user->delete();

           return redirect()->route('superuser.kelola')->with('success', 'User berhasil dihapus');
       } else {

       }
   }
}
