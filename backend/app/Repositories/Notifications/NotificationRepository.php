<?php

namespace App\Repositories\Notifications;
use App\Models\Notification;

class NotificationRepository implements NotificationRepositoryInterface
{
    protected $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }
    public function all()
    {
        return $this->notification->all();
    }
    public function find($id)
    {
        return $this->notification->find($id);
    }
    public function create(array $data)
    {
        return $this->notification->create($data);
    }
    public function update($id, array $data)
    {
        return $this->notification->find($id)->update($data);
    }
    public function delete($id)
    {
        return $this->notification->find($id)->delete();
    }
}