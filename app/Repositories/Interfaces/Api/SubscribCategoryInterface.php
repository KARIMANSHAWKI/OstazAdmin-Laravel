<?php
namespace App\Repositories\Interfaces\Api;

interface SubscribCategoryInterface
{
    public function subscribe(array $data, $id);
}
