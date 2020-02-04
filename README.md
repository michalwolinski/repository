# Repository

Repository Pattern implementation for Laravel.
Criteria are based on Filter Design Pattern.

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
```php

use MichalWolinski\Repository\Criteria\OrderBy;use MichalWolinski\Repository\Criteria\Status;use MichalWolinski\Repository\Interfaces\Repository;
use App\User;

class Service {

    private Repository $repository;

    public function __construct(Repository $repository, User $user)
    {
        $this->repository = $repository->getInstance($user);
    }

    public function getAllUsers(): void
    {
        $allUsers = $this->repository->getAll();
    }

    public function getUserById(int $id): void
    {
        $user = $this->repository->get($id);
    }

    public function getUserByIds(array $ids): void
    {
        $users = $this->repository->getMany($ids);
    }

    public function getGmailUsers(): void
    {
        $users = $this->repository->getWhere('email', 'LIKE', '%@gmail.com');
    }

    public function getByCriteria(): void 
    {
        $criteria = [
            new Status('Active'),
            new OrderBy('created_at')
        ];
        
        $users = $this->repository->getByCriteria($criteria);
    }

}
```

## Authors

* **Michal Wolinski** - [Haxmedia](https://haxmedia.pl)

## License

This project is licensed under the MIT License.