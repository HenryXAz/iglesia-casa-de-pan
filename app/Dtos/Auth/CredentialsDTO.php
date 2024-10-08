<?php
namespace App\Dtos\Auth;

class CredentialsDTO extends  \Spatie\LaravelData\Data
{
    public  function __construct(
        public readonly string $identifier,
        public readonly string $password,
    )
    {}
}
