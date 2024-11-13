<?php

namespace App\Http\Controllers;

use App\Models\kegiatan;
use App\Http\Requests\StorekegiatanRequest;
use App\Http\Requests\UpdatekegiatanRequest;
use App\Models\Community;
use App\Models\Gallery;
use App\Models\picture;
use Faker\Core\File;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function addEvent(Request $request, $id)
    {
        $komunitass = Community::where('id_komunitas', $id)->first();
        $kegiatan = kegiatan::all(); // Adjust model name
        return view('layouts.komunitas.addevent', compact('kegiatan', 'komunitass'));
    }

    public function addEventPost(Request $request, $id_komunitas)
    {
        $request->validate([
            'nama_kegiatan'     => 'required',
            'detail_kegiatan'   => 'required',
            'tgl_kegiatan'      => 'required',
            'jam_kegiatan'      => 'required',
            'slug'              => 'required',
            'gallery'           => 'required|image|mimes:jpeg,png,jpg,svg|max:5048',
        ]);

        // Generate a unique filename
        $filename = Auth::user()->name . '-' . $request->input('nama_kegiatan') . '.' . $request->file('gallery')->getClientOriginalExtension();
        $path = 'images/kegiatan/';

        // Check if file with the same name exists
        if (Storage::disk('public')->exists($path . $filename)) {
            // Handle filename conflict (e.g., add timestamp, random string, etc.)
            $filename = Auth::user()->name . '-' . $request->input('nama_kegiatan') . '_' . time() . '.' . $request->file('gallery')->getClientOriginalExtension();
        }

        // Store the new image in public/images/kegiatan
        $request->file('gallery')->storeAs($path, $filename, 'public');

        // Get the next auto-incremented value for id_kegiatan
        $id_kegiatan = DB::table('kegiatan')->max('id_kegiatan') + 1;


        // Create a new Kegiatan instance
        $kegiatan = new Kegiatan([
            'id_komunitas'      => $id_komunitas,
            'id_kegiatan'       => $id_kegiatan,
            'nama_kegiatan'     => $request->input('nama_kegiatan'),
            'detail_kegiatan'   => $request->input('detail_kegiatan'),
            'tgl_kegiatan'      => $request->input('tgl_kegiatan'),
            'jam_kegiatan'      => $request->input('jam_kegiatan'),
            'slug'              => $request->input('slug'),
            'gallery'           => $path . $filename,
        ]);

        // Save the Kegiatan model
        $kegiatan->save();

        return redirect()->route('mycommunity.Event', ['id_komunitas' => $id_komunitas])->with('success', 'Event added successfully');
    }
    public function addGalery(Request $request, $id)
    {
        $komunitass = Community::where('id_komunitas', $id)->first();
        $kegiatan = kegiatan::all(); // Adjust model name
        return view('layouts.komunitas.addgalery', compact('kegiatan', 'komunitass'));
    }

    public function addGaleryPost(Request $request, $id_komunitas)
    {
        $request->validate([
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                // Use unique filenames for each image
                $newFotoName = 'images/Galery/' . $id_komunitas . '_' . time() .'.'.$file->getClientOriginalName(); '.' . $file->getClientOriginalExtension();

                // Move the file to the specified directory
                $file->move(public_path('images/Galery'), $newFotoName);

                // Create a new Gallery record in the database
                Gallery::create([
                    'id_komunitas' => $id_komunitas,
                    'image_path' => $newFotoName,
                ]);
            }
        }

        // Redirect back with a success message
        return redirect()->route('mycommunity.Galery', ['id_komunitas' => $id_komunitas])
            ->with('success', 'Gallery images uploaded successfully!');
    }

    public function deleteGallery($id_komunitas, $id)
    {
        // Find the gallery by ID
        $gallery = Gallery::find($id);
        $komunitass = Community::where('id_komunitas', $id_komunitas)->first();

        // Check if the gallery exists
        if (!$gallery) {
            return redirect()->route('mycommunity.Galery',['id_komunitas'=> $komunitass->id_komunitas])->with('error', 'Gallery not found');
        }

        // Get the directory path
        // $directoryPath = ($gallery->image_path);
        // $directoryPath = public_path($gallery->image_path);
        // dd($directoryPath);
        // Check if the directory exists before attempting to delete
        // if (is_dir($directoryPath)) {
        //     // Use PHP's Filesystem class to delete the directory and its contents
            // $filesystem = new Filesystem();
            // $filesystem->deleteDirectory($directoryPath);
            // dd($directoryPath);
        // }

        // Delete the gallery from the database
        $gallery->delete();

        // Redirect back with a success message
        return redirect()->route('mycommunity.Galery',['id_komunitas'=> $komunitass->id_komunitas])->with('success', 'Gallery deleted successfully');
    }

    public function addPicturePost(Request $request, $id_komunitas, $id)
    {
        $request->validate([
            'picture.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('picture')) {
            foreach ($request->file('picture') as $file) {
                // Gunakan nama file yang unik untuk setiap gambar
                $newFotoName = 'images/picture/' . $id . '_' . time() . '_' . $file->getClientOriginalName();

                // Pindahkan file ke direktori yang ditentukan
                $file->move(public_path('images/picture'), $newFotoName);

                // Buat catatan gambar baru dalam basis data
                Picture::create([
                    'id_kegiatan' => $id,
                    'picture' => $newFotoName,
                ]);
            }
        } else {
            // Tidak ada file yang diunggah, tampilkan pesan kesalahan
            return redirect()->back()->with('error', 'No images uploaded!');
        }

        // Redirect kembali dengan pesan keberhasilan
        return redirect()->route('mycommunity.IsiEvent', ['id_komunitas' => $id_komunitas, 'id_kegiatan' => $id])->with('success', 'Gallery images uploaded successfully!');
    }


    public function deletePicture($id_komunitas,$id_kegiatan, $id)
    {
        // Find the gallery by ID
        $picture = picture::find($id);


        // Check if the picture exists
        if (!$picture) {
            return redirect()->route('mycommunity.IsiEvent', ['id_komunitas' => $id_komunitas, 'id_kegiatan' => $id_kegiatan])->with('error', 'picture not found');
        }

        // dd($picture);
        $picture->delete();

        // Redirect back with a success message
        return redirect()->route('mycommunity.IsiEvent', ['id_komunitas' => $id_komunitas, 'id_kegiatan' => $id_kegiatan])->with('success', 'picture deleted successfully');
    }



     public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorekegiatanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kegiatan $kegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatekegiatanRequest $request, kegiatan $kegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kegiatan $kegiatan)
    {
        //
    }
}
