<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $touches = ['project'];//to make every change happend on model task Touches mode project(the parent).ex:when task updated,project's updated_at filed should change dynamiclly whit updated_at of task model
    protected $casts = ['completed' => 'boolean'];//it will cast 0/1 to true/false
    public $old = []; 



    protected static function boot()
    {
        parent::boot();

        
        
    }
    public function path()
    {
        return "/projects/{$this->project_id}/tasks/{$this->id}";
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function complete()
    {
         $this->update(['completed'=>true]);
       
         $this->activity()->create([
                'project_id' =>$this->project->id,
                'user_id' => $this->project->owner_id,
                'description' => 'task_completed'
            ]);
    }
    public function incomplete()
    {
         $this->update(['completed'=>false]);
       
         $this->activity()->create([
                'project_id' =>$this->project->id,
                'user_id' => $this->project->owner_id,
                'description' => 'task_incompleted'
            ]);
    }

    public function activity()
    {
       // return $this->hasMany(Activity::class)->latest();
        return $this->morphMany(Activity::class,'subject')->latest();

    }
    
}
