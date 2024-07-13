<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponseHelper;
use App\Http\Requests\UserPost\CreateUserPostRequest;
use App\Http\Requests\UserPost\UpdateUserPostRequest;
use App\Services\Posts\UserPostServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostController extends Controller
{
    private $userPostService;
    public  function  __construct(UserPostServiceInterface $userPostService)
    {
        $this->userPostService = $userPostService;
    }
    public function index()
    {
        $userId = Auth::id();
        $myPosts = $this->userPostService->getMyPosts($userId);
        return ApiResponseHelper::success(compact('myPosts'),  'Retrieved my posts successfully');
    }
    public function create(CreateUserPostRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['profile_user_id'] = Auth::id();
        $this->userPostService->createUserPost($validatedData);
        return ApiResponseHelper::success([], 'Created Post Successfully');
    }
    public function update(UpdateUserPostRequest $request)
    {
        $validatedData  = $request->validated();
        $validatedData['profile_user_id'] = Auth::id();
        $postId = $validatedData['post_id'];
        if (!$postId) {
            return  ApiResponseHelper::error('Post id is required', 400);
        }

        $post = $this->userPostService->getUserPostById('postId');
        if (!$post) {
            return ApiResponseHelper::error('Post not found', 404);
        }
        $this->userPostService->updateUserPost($postId, $validatedData);
        return ApiResponseHelper::success([], 'Updated Post Successfully');
    }
    public function delete(Request $request)
    {
        $userId = Auth::id();
        $postId = $request->input('post_id');
        if (!$postId) {
            return  ApiResponseHelper::error('Post id is required', 400);
        }
        $this->userPostService->deleteUserPost($postId, $userId);
        return ApiResponseHelper::success([], 'Deleted Post successfully');
    }
}
