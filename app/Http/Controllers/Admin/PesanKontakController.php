<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PesanKontak;
use Illuminate\Http\Request;

class PesanKontakController extends Controller
{
    public function index()
    {
        $pesan = PesanKontak::latest()->get();
        return view('admin.pesan.index', compact('pesan'));
    }

    public function show($id)
    {
        $pesan = PesanKontak::findOrFail($id);

        // Ubah status jadi sudah dibaca kalau masih belum
        if (!$pesan->is_read) {
            $pesan->is_read = true;
            $pesan->save();
        }

        return view('admin.pesan.show', compact('pesan'));
    }

    public function destroy($id)
    {
        $pesan = PesanKontak::findOrFail($id);
        $pesan->delete();

        return redirect()->route('admin.pesan.index')->with('success', 'Pesan berhasil dihapus.');
    }
}
