<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Tampilkan daftar semua pengguna dengan filter dan paginasi.
     */
    public function index(Request $request)
    {
        $roles = ['admin', 'pelanggan'];

        $users = User::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->input('search');
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('no_telepon', 'like', "%{$search}%");
            })
            ->when($request->filled('role'), function ($query) use ($request) {
                return $query->where('role', $request->input('role'));
            })
            ->latest()
            ->paginate(10);

        return view('admin.users.index', compact('users', 'roles'));
    }

    /**
     * Tampilkan formulir untuk membuat pengguna baru.
     */
    public function create()
    {
        $roles = ['admin', 'pelanggan'];
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Simpan pengguna baru ke database.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_telepon' => ['required', 'string', 'max:15'],
            'role' => ['required', 'string', Rule::in(['admin', 'pelanggan'])],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('admin.users.index')
            ->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Tampilkan formulir untuk mengedit pengguna yang ada.
     */
    public function edit(User $user)
    {
        $roles = ['admin', 'pelanggan'];
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Perbarui data pengguna di database.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'no_telepon' => ['required', 'string', 'max:15'],
            'role' => ['required', 'string', Rule::in(['admin', 'pelanggan'])],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('admin.users.index')
            ->with('success', 'Pengguna berhasil diperbarui.');
    }

    /**
     * Hapus pengguna dari database.
     */
    public function destroy(User $user)
    {
        // Cegah admin menghapus diri sendiri
        if (auth()->id() === $user->id) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }



    /**
     * Tampilkan profil pengguna saat ini (admin).
     */    public function profile()
    {
        $user = auth()->user();
        return view('admin.users.profile', compact('user'));
    }
    /**
     * Update profil pengguna saat ini (admin) termasuk foto profil dan password.
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'no_telepon' => ['required', 'string', 'max:15'],
            'password' => ['nullable', 'string', 'min:8'],
            'profile_photo' => ['nullable', 'image', 'max:2048'], // max 2MB
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $path = $request->file('profile_photo')->store('profile', 'public');
            $validatedData['profile_photo_path'] = $path;
        }

        $user->update($validatedData);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Hapus foto profil admin.
     */
    public function deletePhoto(Request $request)
    {
        $user = auth()->user();

        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
            $user->update(['profile_photo_path' => null]);
        }

        return redirect()->back()->with('success', 'Foto profil berhasil dihapus.');
    }
}
