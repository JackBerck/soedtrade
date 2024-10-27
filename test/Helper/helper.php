<?php

namespace JackBerck\SoedTrade\App {

    function header(string $value)
    {
        echo $value;
    }
}

namespace JackBerck\SoedTrade\Service {

    function setcookie(string $name, string $value)
    {
        echo "$name: $value";
    }
}
