<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\User;
use App\Models\Group;
use App\Models\GroupItem;
use App\Services\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Spatie\Dns\Dns;
use Spatie\Dns\Exceptions\CouldNotFetchDns;

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

        $user->groups()->delete();
        $user->groupitems()->delete();

        $user->delete();

        if (!$user) {
            return redirect()->back()->with(['error' => 'Ma\'lumot topilmadi'], 404);
        }

        
        $user->delete();
        if($user->getOriginal('img') == null){
            return redirect()->back()->with(['success' => 'Ma\'lumot muvaffaqiyatli o\'chirildi']);
        }
        else{
            $deleteImage = Storage::disk('user')->delete($user->getOriginal('img'));
            return redirect()->back()->with(['success' => 'Ma\'lumot muvaffaqiyatli o\'chirildi']);
        }

        return redirect()->back()->with(['success' => 'Rasmni o\'chirishda muammo']);
    }


    public function students(){


        $students = User::findStudents()
            // ->rightJoin('group_item', 'users.id', '=', 'group_item.student_id')
            // ->leftJoin('groups', 'group_item.group_id', '=', 'groups.id')
            // ->where('group_item.finished_at', '=', null)
            // ->select(['users.id', 'users.img', 'users.name', 'users.email', 'users.created_at', 'groups.name as groupName'])
            ->paginate(20);

        return view('backend.user.students', [
            'students' => $students
        ]);
    }

    public function addStudentStore(Request $request){
        try {
            $password = Str::random(8);
            User::insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($password),
                'user_type' => 4
            ]);
            $url = URL::to('/student');
            $data['url'] = $url;
            $data['name'] = $request->name;
            $data['email'] = $request->email;

            $data['password'] = $password;
            SendEmail::sendEmail($data);
            return response()->json(['success' => true, 'data' => "Yuborildi"]);
        }catch (\Exception $exception){
            return response()->json(['success' => false, 'data' => $exception->getMessage()]);
        }
    }


    public function groups(string $id)
    {
        $teacher = User::findOrFail($id);

        $groups = Group::with('course')->where('teacher_id', '=', $teacher->id)->get();

        return view('backend.groups.groups', [
            'groups' => $groups,
            'teacher_id' => $id
        ]);
    }

    public function pupils(string $id)
    {
        $groupItems = GroupItem::where('group_id', '=', $id)
            ->where('finished_at', '=', null)
            ->get();

        return view('backend.groups.pupils', [
            'groupItems' => $groupItems,
            'group_id' => $id
        ]);
    }


    public function finished(string $id){
        $groupItems = GroupItem::where('group_id', '=', $id)
            ->where('finished_at', '!=', null)
            ->get();

        return view('backend.groups.pupils', [
            'groupItems' => $groupItems,
            'group_id' => $id
        ]);
    }

}
