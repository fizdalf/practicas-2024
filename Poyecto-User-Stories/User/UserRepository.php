<?php
interface UserRepositoryInterface
{
    public function suspendUserAccount(int $userId);
}
