<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelper;
use App\Http\Requests\Story\CreateStoryRequest;
use App\Http\Requests\Story\UpdateStoryRequest;
use App\Models\Story;
use App\Services\Stories\StoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StoryController extends Controller
{
    private $storyService;
    public function __construct(StoryServiceInterface $storyService)
    {
        $this->storyService = $storyService;
    }
    public function index()
    {
        $userId = Auth::id();
        $myStories = $this->storyService->getMyStories($userId);
        return ApiResponseHelper::success(compact('myStories'),  'Retrieved my stories successfully');
    }
    public function create(CreateStoryRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['profile_user_id'] = Auth::id();
        $this->storyService->createStory($validatedData);
        return ApiResponseHelper::success([], 'Created Story Successfully');
    }
    public function update(UpdateStoryRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['profile_user_id'] = Auth::id();
        $storyId = $validatedData['story_id'];
        if (!$storyId) {
            return ApiResponseHelper::error('Story ID is required', 400);
        }
        $this->storyService->updateStory($storyId, $validatedData);
        return  ApiResponseHelper::success([], 'Updated Story Successfully');
    }
    public  function delete(Request $request)
    {
        $userId = Auth::id();
        $storyId = $request->input('story_id');
        if (!$storyId) {
            return ApiResponseHelper::error('Story ID is required', 400);
        }
        $this->storyService->deleteStory($storyId, $userId);
        return  ApiResponseHelper::success([], 'Deleted Story Successfully');
    }
}
