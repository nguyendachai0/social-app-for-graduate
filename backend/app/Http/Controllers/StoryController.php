<?php

namespace App\Http\Controllers;

use App\Http\Requests\Story\CreateStoryRequest;
use App\Http\Requests\Story\UpdateStoryRequest;
use App\Services\Stories\StoryServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    private $storyService;
    public function __construct(StoryServiceInterface $storyService)
    {
        $this->storyService = $storyService;
    }
    public function index()
    {
        $myStories = $this->storyService->getAllStorys();
    }
    public function create(CreateStoryRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['profile_user_id'] = Auth::id();
        $this->storyService->createStory($validatedData);
        return response()->json(['message' => 'Create Story Successfully']);
    }
    public function update(UpdateStoryRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['profile_user_id'] = Auth::id();
        $storyId = $validatedData['story_id'];

        if (!$storyId) {
            return response()->json(['message' => 'Story ID is required'], 400);
        }

        $this->storyService->updateStory($storyId, $validatedData);
        return  response()->json(['message' => 'Story updated successfully']);
    }
    public  function delete(Request $request)
    {
        $userId = Auth::id();
        $storyId = $request->input('story_id');

        if (!$storyId) {
            return response()->json(['message' => 'Story ID is required'], 400);
        }

        $this->storyService->deleteStory($storyId, $userId);
        return  response()->json(['message' => 'Story deleted successfully']);
    }
}
