<?php

class UserGateway
{
    public function getAll()
    {
        $users = UserQuery::create()->find()->toArray();
        return $users;
    }
}