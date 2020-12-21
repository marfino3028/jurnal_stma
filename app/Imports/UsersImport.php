<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyNewUser;

class UsersImport implements ToCollection, WithStartRow
{
    use Importable;
    protected $role = ['1'=>'Administrator','2'=>'Dosen','3'=>'Mahasiswa','4'=>'User'];

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Support\Collection
    */
    public function collection(Collection $rows)
    {
        $messages = [
            'required'  => 'Harap seluruh kolom di isi.',
            '*.3.unique'    => 'Alamat Email sudah didaftarkan',
            '*.1.unique'    => 'Username sudah didaftarkan',
            '*.4.min'    => 'Password minimal :min karakter',
        ];
        Validator::make($rows->toArray(), [
            '*.0' => 'required',
            '*.1' => 'required|unique:users,username',
            '*.2' => 'required',
            '*.3' => 'required|unique:users,email',
            '*.4' => 'required|min:6',

        ],$messages)->validate();

        foreach ($rows as $row) 
        {
            $user = User::create([
                'name'=> $row[0],
                'username'=> $row[1],
                'role_id'=>array_search($row[2],$this->role),
                'email'=>$row[3],
                'password'=>$row[4],
            ]);
            Mail::to($user->email)->send(new NotifyNewUser($user,$row[4]));
            $user->sendEmailVerificationNotification(); 
        }

    }

}
