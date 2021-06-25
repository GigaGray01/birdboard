<?php

namespace Tests\Setup;
use App\Models\Project;
use App\Models\User;
use App\Models\Task;

 class ProjectFactory
{
  protected $taskCount = 0;

  public function withTask($count = null)
  {
    $taskCount = $count;
  }
  public function create()
  {
    $project =  Project::factory([
        'owner_id' => User::factory()]
      )->create();

      Task::factory()->create([
        'project_id' => $project->id
      ])->count($this->$taskCount);

      return $project;
  }
}
