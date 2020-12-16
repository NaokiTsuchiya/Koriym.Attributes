<?php

declare(strict_types=1);

namespace Koriym\Attributes;

use Koriym\Attributes\Annotation\Assisted;
use Koriym\Attributes\Annotation\Cacheable;
use Koriym\Attributes\Annotation\Foo;
use Koriym\Attributes\Annotation\HttpCache;
use Koriym\Attributes\Annotation\Inject;
use Koriym\Attributes\Annotation\Loggable;
use Koriym\Attributes\Annotation\Named;
use Koriym\Attributes\Annotation\Transactional;
use PDO;

#[Foo]
#[Cacheable]
class Fake
{
    #[Inject]
    #[Foo]
    public string $prop;

    #[Inject]
    public function setKey(#[Named('auth_key')] string $authKey): void // named binding
    {
    }

    #[Transactional]
    #[Loggable]
    #[HttpCache(isPrivate: true, maxAge: 50)]
    public function subscribe(string $id): void  // intercepted
    {
    }

    public function getPdo(string $id, #[Assisted ] PDO $pdo): void // runtime injection
    {
    }
}