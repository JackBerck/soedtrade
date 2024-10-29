<?php

namespace JackBerck\SoedTrade\Model;

class UserPasswordUpdateRequest
{
    public ?string $user_id = null;
    public ?string $oldPassword = null;
    public ?string $newPassword = null;
}
