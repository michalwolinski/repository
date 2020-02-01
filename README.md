# Repository

Repository Pattern implementation for Laravel.

---
## Installation by Composer
1. Run
    ```php   
    composer require michalwolinski/repository
    ``` 
    in console to install this library.
---

## Usage

I propose to use Dependency Injection to inject `Repository` interface.

Example implementation in service class:
```

use MichalWolinski\Repository\Interfaces\Repository;
use App\User;

class Service {

    private Repository $repository;

    public function __construct(Repository $repository, User $user)
    {
        $this->repository = $repository->getInstance($user);
    }

    public getAllUsers(): void
    {
        $allUsers = $this->repository->getAll();
    }

    public getUserById(int $id): void
    {
        $user = $this->repository->get($id);
    }

    public getUserByIds(array $ids): void
    {
        $users = $this->repository->getMany($ids);
    }
}
```

## Authors

* **Michal Wolinski** - [Haxmedia](https://haxmedia.pl)

## License

This project is licensed under the MIT License.