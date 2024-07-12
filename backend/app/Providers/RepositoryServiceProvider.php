<?php

namespace App\Providers;

use App\Repositories\Posts\UserPostRepository;
use App\Repositories\Posts\UserPostRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\ProfileUser\ProfileUserRepositoryInterface;
use App\Repositories\ProfileUser\ProfileUserRepository;
use App\Services\Posts\UserPostService;
use App\Services\Posts\UserPostServiceInterface;
use App\Services\ProfileUser\ProfileUserServiceInterface;
use App\Services\ProfileUser\ProfileUserService;
use App\Repositories\Stories\StoryRepository;
use App\Repositories\Stories\StoryRepositoryInterface;
use App\Services\Stories\StoryService;
use App\Services\Stories\StoryServiceInterface;
use App\Repositories\Conversation\ConversationRepository;
use App\Repositories\Conversation\ConversationRepositoryInterface;
use App\Services\Conversation\ConversationService;
use App\Services\Conversation\ConversationServiceInterface;
use App\Repositories\Emojis\EmojiRepository;
use App\Repositories\Emojis\EmojiRepositoryInterface;
use App\Services\Emojis\EmojiService;
use App\Services\Emojis\EmojiServiceInterface;
use App\Repositories\Messages\MessageRepository;
use App\Repositories\Messages\MessageRepositoryInterface;
use App\Services\Messages\MessageService;
use App\Services\Messages\MessageServiceInterface;
use App\Repositories\Notifications\NotificationRepository;
use App\Repositories\Notifications\NotificationRepositoryInterface;
use App\Services\Notifications\NotificationService;
use App\Services\Notifications\NotificationServiceInterface;
use App\Repositories\Participants\ParticipantRepository;
use App\Repositories\Participants\ParticipantRepositoryInterface;
use App\Services\Participants\ParticipantService;
use App\Services\Participants\ParticipantServiceInterface;
use App\Repositories\FriendRequests\FriendRequestRepository;
use App\Repositories\FriendRequests\FriendRequestRepositoryInterface;
use App\Services\FriendRequests\FriendRequestService;
use App\Services\FriendRequests\FriendRequestServiceInterface;
use App\Repositories\Shares\ShareRepository;
use App\Repositories\Shares\ShareRepositoryInterface;
use App\Services\Shares\ShareService;
use App\Services\Shares\ShareServiceInterface;
use App\Repositories\Posts\CommentlikeRepository;
use App\Repositories\Posts\CommentlikeRepositoryInterface;
use App\Services\Posts\CommentlikeService;
use App\Services\Posts\CommentlikeServiceInterface;


use App\Repositories\Posts\PostCommentRepository;
use App\Repositories\Posts\PostCommentRepositoryInterface;
use App\Services\Posts\PostCommentService;
use App\Services\Posts\PostCommentServiceInterface;


use App\Repositories\Posts\PostLikeRepository;
use App\Repositories\Posts\PostLikeRepositoryInterface;
use App\Services\Posts\PostLikeService;
use App\Services\Posts\PostLikeServiceInterface;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProfileUserRepositoryInterface::class, ProfileUserRepository::class);
        $this->app->bind(ProfileUserServiceInterface::class, ProfileUserService::class);
        $this->app->bind(UserPostRepositoryInterface::class, UserPostRepository::class);
        $this->app->bind(UserPostServiceInterface::class, UserPostService::class);
        $this->app->bind(StoryRepositoryInterface::class, StoryRepository::class);
        $this->app->bind(StoryServiceInterface::class, StoryService::class);
        $this->app->bind(ConversationRepositoryInterface::class, ConversationRepository::class);
        $this->app->bind(ConversationServiceInterface::class, ConversationService::class);
        $this->app->bind(EmojiRepositoryInterface::class, EmojiRepository::class);
        $this->app->bind(EmojiServiceInterface::class, EmojiService::class);
        $this->app->bind(FriendRequestRepositoryInterface::class, FriendREquestRepository::class);
        $this->app->bind(FriendREquestServiceInterface::class, FriendREquestService::class);
        $this->app->bind(MessageRepositoryInterface::class, MessageRepository::class);
        $this->app->bind(MessageServiceInterface::class, MessageService::class);
        $this->app->bind(NotificationRepositoryInterface::class, NotificationRepository::class);
        $this->app->bind(NotificationServiceInterface::class, NotificationService::class);
        $this->app->bind(ParticipantRepositoryInterface::class, ParticipantRepository::class);
        $this->app->bind(ParticipantServiceInterface::class, ParticipantService::class);
        $this->app->bind(ShareRepositoryInterface::class, ShareRepository::class);
        $this->app->bind(ShareServiceInterface::class, ShareService::class);
        $this->app->bind(CommentLikeRepositoryInterface::class, CommentLikeRepository::class);
        $this->app->bind(CommentLikeServiceInterface::class, CommentLikeService::class);
        $this->app->bind(PostCommentRepositoryInterface::class, PostCommentRepository::class);
        $this->app->bind(PostCommentServiceInterface::class, PostCommentService::class);
        $this->app->bind(PostLikeRepositoryInterface::class, PostLikeRepository::class);
        $this->app->bind(PostLikeServiceInterface::class, PostLikeService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
