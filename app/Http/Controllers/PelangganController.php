<?php

namespace App\Http\Controllers;

use App\Models\AlamatModel;
use App\Models\CustomerModel;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pelanggan';
        $sub_title = 'Kelola Data Pelanggan!';

        $pelanggan = Pelanggan::where('role', 'pelanggan')->get();

        return view('content.pelanggan.index', compact(
            'pelanggan',
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
        $title = 'Pelanggan';
        $sub_title = 'Tambah Data Pelanggan!';

        return view('content.pelanggan.create', compact(
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
            'inpNo' => 'required|min:10'
        ]);

        $pelanggan = Pelanggan::create([
            'name' => $request->inpNama,
            'email' => $request->inpEmail,
            'no_hp' => $request->inpNo,
            'member' => $request->inpMember,
            'role' => 'pelanggan',
            'password' => Hash::make($request->inpEmail)
        ]);

        return redirect()->route('pelanggan.index')->with(['success' => 'Data Berhasil Disimpan']);
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
        $title = 'Pelanggan';
        $sub_title = 'Edit Data Pelanggan!';

        $pelanggan = Pelanggan::find($id);
        return view('content.pelanggan.edit', compact(
            'pelanggan',
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
            'inpNo' => 'required|min:10'
        ]);

        if ($request->inpPassLama != '') {
            if (Hash::check($request->inpPassLama, auth()->user()->password)) {
                if ($request->inpPassBaru != '') {
                    if ($request->inpPassBaru == $request->inpPassConfirm) {
                        $dataUp['password'] = Hash::make($request->inpPassBaru);
                        $dataUpCustomer['password'] = $request->inpPassBaru;
                    } else {
                        return redirect()->route('pelanggan.edit',  $id)->with(['danger' => 'Konfirmasi Password Salah']);
                    }
                }
            } else {
                return redirect()->route('pelanggan.edit',  $id)->with(['danger' => 'Password Lama Salah']);
            }
        }

        $dataUpCustomer['nama'] = $request->inpNama;
        $dataUpCustomer['email'] = $request->inpEmail;
        $dataUpCustomer['no_telp'] = $request->inpNo;

        $customer = CustomerModel::findOrFail($id);
        $customer->update($dataUpCustomer);

        $dataUp['name'] = $request->inpNama;
        $dataUp['email'] = $request->inpEmail;
        $dataUp['no_hp'] = $request->inpNo;
        $dataUp['member'] = $request->inpMember;
        $dataUp['role'] = 'pelanggan';

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($dataUp);
        if (auth()->user()->role == 'pelanggan') {
            return redirect()->route('dashboard')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('pelanggan.index')->with(['success' => 'Data Berhasil Disimpan']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);
        $alamat = AlamatModel::where('id_user', $id);
        $pelanggan->delete();
        $alamat->delete();

        return redirect()->route('pelanggan.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
