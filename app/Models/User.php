<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    
    public function projects()
    {
        return $this->hasMany(Project::class,'owner_id')->orderBy('updated_at','desc');
    }
    public function accessableProject()
    {
        /*$createdProject = $this->projects;

       $ids = \DB::table('project_members')->where('user_id',$this->id)->pluck('project_id');
       $sharedWithProjects = Project::find($ids);

       return $createdProject->merge($sharedWithProjects);*/ //use this or the below one

       return Project::where('owner_id',$this->id)
                        ->orWhereHas('members' , function ($query){
                            $query->where('user_id', $this->id);
                        })
                        ->get();

    }
}
