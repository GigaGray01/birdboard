<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ProjectInvitationRequest;




class ProjectInvitationController extends Controller
{
    /**
     * Invite a new user to the project.
     *
     * @param  Project                  $project
     * @param  ProjectInvitationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProjectInvitationRequest $request,Project $project)
    {
        //$this->authorize('manage',$project);

        // $validated = $request->validate([
        //     'email' => ['required','exists:users,email'],
        // ],[
        //     'email.exists' => 'email owner should has account in birdboard first !',            
        // ]);

        $user = User::Where('email',request('email'))->first();
        $project->invite($user);

        return redirect($project->path());
    }
}
