<?php
namespace App\Services\Notifications;

use App\Repositories\Notifications\NotificationRepositoryInterface;

class NotificationService implements NotificationServiceInterface
{
    private $notificationRepository;

    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }
    public function getAllNotifications()
    {
        return $this->notificationRepository->all();
    }
    public function getNotificationById($id)
    {
        return $this->notificationRepository->find($id);
    }
    public function createNotification(array $data)
    {
        return $this->notificationRepository->create($data);
    }
    public function updateNotification($id, array $data)
    {
        return $this->notificationRepository->update($id,  $data);
    }
    public function deleteNotification($id)
    {
        return $this->notificationRepository->delete($id);
    }

}