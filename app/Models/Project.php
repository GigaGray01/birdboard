<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    //protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','description','owner_id','notes'];
    public $old = []; 

    public function path()
    {
        return "/projects/{$this->id}";
    } 

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($body)
    {
        $task = $this->tasks()->create(['body' => $body]);
        // Activity::create([
        //     'project_id' =>$this->id,
        //     'description' => 'task created'
        // ]); i moved it to Task model in boot fun() cuz when it here it while fire the event ONLY if i use addTask().But if i added task to a project using other ways it would not fire the event
        return $task;
    }
    public function activity()
    {
        return $this->hasMany(Activity::class)->latest();

    }
    public function invite(User $user)
    {
        if (! $this->members()->where(['user_id' => $user->id,'project_id' => $this->id])->exists()) 
        {
            if ($this->owner_id == $user->id)
            {
                return redirect($this->path())->with('msg', 'You are the owner already!');
            }
            return $this->members()->attach($user);
        }
        else
        {
            return redirect($this->path())->with('msg', 'user already invited!');
        }
    }
    public function members()
    {
        return $this->belongsToMany(User::class,'project_members')->withTimestamps();
    }
}
