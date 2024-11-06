<?php

namespace JackBerck\SoedTrade\Model;

class UserProfileUpdateRequest
{
    public ?string $user_id = null;
    public ?string $username = null;
    public ?string $profile_image = null;
    public ?string $address = null;
}
