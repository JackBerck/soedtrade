<?php

namespace JackBerck\SoedTrade\Model;

class UserProfileUpdateRequest
{
    public ?string $user_id = null;
    public ?string $username = null;
    public ?string $email = null;
    public ?string $password = null;
    public ?string $profile_image = null;
    public ?string $phone_number = null;
    public ?string $address = null;
}
