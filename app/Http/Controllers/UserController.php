<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use App\Http\Requests;
use App\DataTables\UserDataTable;
use App\Repositories\UserRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\AppBaseController;
use App\Mail\NotifyNewUser;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Illuminate\Http\Request;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $roles = \App\Models\Role::pluck('name','id');
        return view('users.create')->with('role',$roles);
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $user = $this->userRepository->create($input);
        $passwd = $request->password;
        Mail::to($user->email)->send(new NotifyNewUser($user,$passwd));
        $user->sendEmailVerificationNotification(); 

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);
        $roles = \App\Models\Role::pluck('name','id');

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user)->with('role', $roles);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $data = $request->filled('password') ? $request->all() : $request->except('password');
        if($user->email != $request->email){
            $data['email_verified_at']=null;
            $user = $this->userRepository->update($data, $id);
            $user->sendEmailVerificationNotification(); 
        }else{
            $user = $this->userRepository->update($data, $id);
        }

        Flash::success('User updated successfully.');

        return view('users.show')->with('user', $user);
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }

    public function import(Request $request){
        $validatedData = $request->validate([
            'users' => 'required|mimes:xls,xlsx,csv|max:2048',
        ]);
        if($request->has('users') && $validatedData) {
            $file = $request->file('users');
            Excel::import(new UsersImport, $file);
        }
        Flash::success('User imported successfully.');
        return redirect(route('users.index'));
    }
}
