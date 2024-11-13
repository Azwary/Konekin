<?php

namespace App\Http\Controllers;

use App\Models\AdminCommunity;
use App\Models\comment;
use App\Models\Community;
use App\Models\forum;
use App\Models\Gallery;
use App\Models\joins;
use App\Models\Kategori;
use App\Models\kegiatan;
use App\Models\picture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CreateCommunityController extends Controller
{
    public function create()
    {
        $kategori = Kategori::all();
        return view('layouts.createcommunity', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_komunitas' => 'required',
            'image_komunitas' => 'required|image|mimes:jpeg,png,jpg,svg|max:5048',
            'description_komunitas' => 'required',
            'id_kategori' => 'required',
        ]);

        $newFotoName = 'images/community/' . Auth::user()->name . '-' . $request->input('nama_komunitas') . '.' . $request->image_komunitas->getClientOriginalExtension();
        $request->image_komunitas->move(public_path('images/community'), $newFotoName);

        $prefix = Auth::user()->KEY;
        $maxId = Community::where('id_komunitas', 'like', $prefix . '%')->max('id_komunitas');

        // Jika tidak ada nilai maksimum (tabel kosong atau belum ada dengan awalan tersebut), mulai dari 1
        if (!$maxId) {
            $nextNumber = 1;
        } else {
            // Mendapatkan dua digit terakhir dari $maxId
            $twoDigitLast = substr($maxId, -2);

            // Mengonversi dua digit terakhir ke angka
            $lastTwoDigits = (int)$twoDigitLast;

            // Menambahkan satu ke dua digit terakhir
            $nextNumber = $lastTwoDigits + 1;

            // Jika nilai $nextNumber melebihi 99, atur kembali ke 1
            $nextNumber = $nextNumber > 99 ? 1 : $nextNumber;
        }

        // Format nilai berikutnya dengan menambahkan dua huruf di awal
        $id_komunitas = $prefix . '_' . str_pad($nextNumber, 2, '0', STR_PAD_LEFT);

        $komunitas = Community::create([
            'id_komunitas' => $id_komunitas,
            'nama_komunitas' => $request->input('nama_komunitas'),
            'KEY' => Auth::user()->KEY,
            'image_komunitas' => $newFotoName,
            'description_komunitas' => $request->input('description_komunitas'),
            'id_kategori' => $request->input('id_kategori'),
        ]);

        // Create a record in AdminCommunity with the relationship to Community
        // $komunitas->adminCommunity()->create([
        //     'email' => Auth::user()->email,
        // 'id_komunitas' => $id_komunitas,
        // ]);

        $user = Auth::user();

        if ($user->KEY !== 'SUPER') {
            User::where('id', $user->id)->update(['role' => 'admin_group']);
            // return redirect()->route('dashboard')->with('success', 'User role updated.');
        } else {
            // return redirect()->route('dashboard')->with('error', 'Cannot change user role with SUPER key.');
        }

        return redirect()->route('mycommunity');
    }
    public function hapus($id_komunitas)
    {
        // Hapus semua entri yang terkait dari tabel joins
        Joins::where('id_komunitas', $id_komunitas)->delete();
        kegiatan::where('id_komunitas', $id_komunitas)->delete();
        forum::where('id_komunitas', $id_komunitas)->delete();

        // Temukan komunitas berdasarkan id dan hapus
        Community::find($id_komunitas)->delete();

        return redirect()->route('community')->with('success', 'User role updated.');
    }

    public function join(Request $request, $id)
    {
        $komunitass = Community::where('id_komunitas', $id)->first(); // pastikan hanya mendapatkan satu objek
        return view('layouts.komunitas.event', compact('komunitass'));
        // return view('layouts.komunitas.join', compact('komunitass'));
        // return view('layouts.komunitas.event', compact('komunitass', 'events'));
    }

    public function joinS($id)
    {
        $komunitass = Community::where('id_komunitas', $id)->first();

        joins::create([
            'id_komunitas' => $id,
            'email' => Auth::user()->email,
            'KEY' => Auth::user()->KEY,
        ]);
        return redirect()->route('mycommunity.Event', ['id_komunitas' => $komunitass->id_komunitas]);
    }
    public function unjoin(Request $request, $id)
    {
        $komunitass = Community::where('id_komunitas', $id)->first(); // pastikan hanya mendapatkan satu objek
        return view('layouts.komunitas.event', compact('komunitass'));
        // return view('layouts.komunitas.join', compact('komunitass'));
        // return view('layouts.komunitas.event', compact('komunitass', 'events'));
    }

    public function unjoinS($id)
    {
        $komunitass = Community::where('id_komunitas', $id)->first();

        if ($komunitass) {
            joins::where('id_komunitas', $id)->delete();
            return redirect()->route('mycommunity.Event', ['id_komunitas' => $komunitass->id_komunitas])->with('success', 'Unjoint berhasil');
        } else {
        }
    }
    public function mycommunity()
    {
        // $komunitas=Community::all();
        // Mendapatkan pengguna yang sedang login
        $user = Auth::user();

        // // Mendapatkan komunitas yang dimiliki oleh pengguna
        $komunitas = $user->komunitas;


        return view('layouts/mycommunity', compact('komunitas'));
    }
    public function event(Request $request, $id)
    {
        // Retrieve the community data
        $komunitass = Community::where('id_komunitas', $id)->first();
        $events = Kegiatan::all(); // Assuming Kegiatan is the correct model name
        $joint = joins::all();

        // Retrieve the events for the community
        // $events = $komunitass->kegiatan; // Assuming you have a relationship set up in your Community model

        return view('layouts.komunitas.event', compact('komunitass', 'events', 'joint'))
            ->with('community', $komunitass)
            ->with('events', $events);
    }

    public function isievent(Request $request, $id, $id_kegiatan)
    {
        $komunitass = Community::where('id_komunitas', $id)->first();
        $kegiatan = kegiatan::where('id_kegiatan', $id_kegiatan)->first();
        $joint = joins::all();
        $pictures = picture::all();
        // $events = kegiatan::all();
        return view('layouts.komunitas.isievent', compact('komunitass', 'kegiatan', 'joint','pictures'));
    }

    public function galery(Request $request, $id)
    {
        $komunitass = Community::where('id_komunitas', $id)->first(); // pastikan hanya mendapatkan satu objek
        $joint = joins::all();
        $galery = Gallery::all();
        return view('layouts.komunitas.galery', compact('komunitass', 'joint', 'galery'));
    }

    public function forum(Request $request, $id)
    {
        $komunitass = Community::findOrFail($id);
        $comment = forum::where('id_komunitas', $id)->get();
        $joint = joins::all();
        return view('layouts.komunitas.forum', compact('komunitass', 'comment', 'joint'));
    }

    public function forumAdd(Request $request, $id_komunitas)
    {
        $request->validate([
            'content' => 'required',
        ]);
        $community = Community::findOrFail($id_komunitas);

        // $highestIdComment = forum::max('id_comment');

        // $nextIdComment = $highestIdComment + 1;

        // Create a new comment
        $comment = new forum();
        $comment->id_komunitas = $community->id_komunitas;
        $comment->KEY = auth::user()->KEY;
        $comment->comment = $request->content;

        // Save the comment
        $comment->save();

        // Redirect back or wherever you want
        return redirect()->back()->with('success', 'Comment added successfully');

        // return view('layouts.komunitas.forum', compact('komunitass', 'comment'));
    }


    public function edit($id_komunitas)
    {
        $komunitass = Community::find($id_komunitas);
        $joints = joins::where('id_komunitas', $id_komunitas)->get();

        if (!$komunitass) {
            return redirect()->back()->with('error', 'Community not found.');
        }

        // return view('nama_tampilan', ['joints' => $joints]);

        return view('layouts.komunitas.edit', compact('komunitass', 'joints'));
    }

    public function update(Request $request, $id_komunitas)
    {
        $request->validate([
            'new_image' => 'sometimes|required|image|mimes:jpeg,png,jpg,svg|max:5048',
            'new_name' => 'sometimes|required|string|max:255',
            'description_komunitas' => 'sometimes|required|string',
        ]);

        // Find the community
        $komunitas = Community::findOrFail($id_komunitas);

        // Handle image update
        if ($request->hasFile('new_image')) {
            $newFotoName = 'images/community/' . Auth::user()->name . '-' . $request->input('new_name') . '.' . $request->file('new_image')->getClientOriginalExtension();
            $request->file('new_image')->move(public_path('images/community'), $newFotoName);
            $komunitas->image_komunitas = $newFotoName;
        }

        // Handle other updates
        if ($request->has('new_name')) {
            $komunitas->nama_komunitas = $request->input('new_name');
        }

        if ($request->has('description_komunitas')) {
            $komunitas->description_komunitas = $request->input('description_komunitas');
        }

        // Save changes
        $komunitas->save();

        return redirect()->route('mycommunity.Event', ['id_komunitas' => $id_komunitas]);
    }


    public function addevent(Request $request, $id)
    {
        $komunitass = Community::where('id_komunitas', $id)->first(); // pastikan hanya mendapatkan satu objek
        return view('layouts.komunitas.addevent', compact('komunitass'));
    }
}
