<?php

namespace App\Http\Controllers;

use App\Models\Pengelola;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PengelolaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pengelola';
        $sub_title = 'Kelola Data Pengelola!';

        $pengelola = Pengelola::where('role', 'super_admin')->orWhere('role', 'pengelola')->get();

        return view('content.pengelola.index', compact(
            'pengelola',
            'title',
            'sub_title'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Pengelola';
        $sub_title = 'Tambah Data Pengelola!';

        return view('content.pengelola.create', compact(
            'title',
            'sub_title'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'inpNama' => 'required|max:255',
            'inpEmail' => 'required|email|max:255|unique:users,email',
            'inpNo' => 'required|min:10',
            'inpRole' => 'required'
        ]);

        $pengelola = Pengelola::create([
            'name' => $request->inpNama,
            'email' => $request->inpEmail,
            'no_hp' => $request->inpNo,
            'role' => $request->inpRole,
            'password' => Hash::make($request->inpEmail)
        ]);

        return redirect()->route('pengelola.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Pengelola';
        $sub_title = 'Edit Data Pengelola!';

        $pengelola = Pengelola::find($id);
        return view('content.pengelola.edit', compact(
            'pengelola',
            'title',
            'sub_title'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'inpNama' => 'required|max:255',
            'inpEmail' => 'required|email|max:255',
            'inpNo' => 'required|min:10',
            'inpRole' => 'required'
        ]);

        // echo auth()->user()->password . "<hr>" . Hash::make($request->inpPassLama) . "<hr>" . $request->inpPassLama . "<hr>" . Hash::check($request->inpPassLama, auth()->user()->password);
        // die;

        // $dataUp['password'] = "";

        if ($request->inpPassLama != '') {
            if (Hash::check($request->inpPassLama, auth()->user()->password)) {
                if ($request->inpPassBaru != '') {
                    if ($request->inpPassBaru == $request->inpPassConfirm) {
                        $dataUp['password'] = Hash::make($request->inpPassBaru);
                    } else {
                        return redirect()->route('pengelola.edit',  $id)->with(['danger' => 'Konfirmasi Password Salah']);
                    }
                }
            } else {
                return redirect()->route('pengelola.edit',  $id)->with(['danger' => 'Password Lama Salah']);
            }
        }

        $dataUp['name'] = $request->inpNama;
        $dataUp['email'] = $request->inpEmail;
        $dataUp['no_hp'] = $request->inpNo;
        $dataUp['role'] = $request->inpRole;

        $pengelola = Pengelola::findOrFail($id);
        $pengelola->update($dataUp);
        return redirect()->route('pengelola.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengelola = Pengelola::find($id);
        $pengelola->delete();
        return redirect()->route('pengelola.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
