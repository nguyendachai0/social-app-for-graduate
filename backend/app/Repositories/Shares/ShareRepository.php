<?php

namespace App\Repositories\Shares;
use App\Models\Share;

class ShareRepository implements ShareRepositoryInterface
{
    protected $share;

    public function __construct(Share $share)
    {
        $this->share = $share;
    }
    public function all()
    {
        return $this->share->all();
    }
    public function find($id)
    {
        return $this->share->find($id);
    }
    public function create(array $data)
    {
        return $this->share->create($data);
    }
    public function update($id, array $data)
    {
        return $this->share->find($id)->update($data);
    }
    public function delete($id)
    {
        return $this->share->find($id)->delete();
    }
}