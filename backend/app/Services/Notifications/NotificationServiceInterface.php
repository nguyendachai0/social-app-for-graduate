<?php

namespace App\Services\Notifications;

interface NotificationServiceInterface 
{
    public function getAllNotifications();
    public function getNotificationById($id);
    public function createNotification(array $data);
    public function updateNotification($id, array $data);
    public function deleteNotification($id);
}