<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::find()->paginate(20);

        return view('backend.user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        $validate = $request->validate([
//            'user_type' => 'required',
//            'name' => 'required',
//            'email' => 'required',
//        ]);


        $user = new User();

        if ($request->file('img')) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make('12345678');
            $user->user_type = $request->user_type;
            $user->img = $request->file('img')->store('/images/user', ['disk' => 'user']);
            if ($user->save()) {
                return redirect()->route('backend.user.index')->with('success', 'Ma\'lumotlar kiritildi');
            }
            return redirect()->back()->with('errors', 'Ma\lumotni saqlashda xatolik');
        }

        return redirect()->back()->with('errors', 'Rasm yuklanmadi');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.user.show', [
            'model' => User::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.user.edit', [
            'model' => User::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make('12345678');
        $user->user_type = $request->user_type;

        if ($request->file('img') != null && Storage::disk('user')->delete($user->getOriginal('img'))) {
            $user->img = $request->file('img')->store('/images/user', ['disk' => 'user']);
            if ($user->update()) {
                return redirect()->route('backend.user.show', $id)->with('success', 'Ma\'lumotlar kiritildi');
            }
        } else {
            $user->img = $user->getOriginal('img');
            if ($user->update()) {
                return redirect()->route('backend.user.show', $id)->with('success', 'Ma\'lumotlar kiritildi');
            }
        }

        return redirect()->back()->with('danger', 'Rasm yuklanmadi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if (!$user) {
            return redirect()->back()->with(['error' => 'Ma\'lumot topilmadi'], 404);
        }

        $user->delete();
        $deleteImage = Storage::disk('user')->delete($user->getOriginal('img'));
        if ($user && $deleteImage) {
            return redirect()->back()->with(['success' => 'Ma\'lumot muvaffaqiyatli o\'chirildi']);
        }

        return redirect()->back()->with(['success' => 'Rasmni o\'chirishda muammo']);
    }
}
