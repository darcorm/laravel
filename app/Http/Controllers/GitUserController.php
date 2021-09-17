<?php

namespace App\Http\Controllers;

use App\Models\GitUser;
use App\Jobs\ProcessGitUserData;
use App\Http\Controllers\GitApiController;

class GitUserController extends Controller
{
    /**
     * Fetch Data from the Git Users API at
     * https://api.github.com/users/${user}/starred 
     */
    public function fetchApi() 
    {
        $gitApiData = GitApiController::fetchGitUserData();
        $this->store($gitApiData);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store($gitApiData)
    {
        ProcessGitUserData::dispatch($gitApiData);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return GitUser::all() ?? "No records found";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */
    public function destroy($id)
    {
        $existingRecord = GitUser::find($id);
        if ($existingRecord) {
            $existingRecord->delete();
            return "Record successfully deleted.";
        }

        return "No records found.";
    }
    
}
