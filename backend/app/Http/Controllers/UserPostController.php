<?php

namespace App\Http\Controllers;

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
    public function create(CreateUserPostRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['profile_user_id'] = Auth::id();
        $this->userPostService->createUserPost($validatedData);
        return response()->json(['message' => 'Creat post successfully']);
    }
    public function update(UpdateUserPostRequest $request)
    {
        $validatedData  = $request->validated();
        $validatedData['profile_user_id'] = Auth::id();
        $postId = $validatedData['post_id'];
        $this->userPostService->updateUserPost($postId, $validatedData);
        return response()->json(['message' => 'Post updated successfully']);
    }
    public function delete(Request $request)
    {
        $userId = Auth::id();
        $postId = $request->input('post_id');
        $this->userPostService->deleteUserPost($postId, $userId);
        return response()->json(['message' => 'Post deleted successfully']);
    }
}
