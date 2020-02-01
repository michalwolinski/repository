<?php


namespace MichalWolinski\Repository\Tests;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use MichalWolinski\Repository\Repository;
use Mockery;
use TypeError;

/**
 * Class RepositoryTest
 * @package MichalWolinski\Repository\Tests
 */
class RepositoryTest extends TestCase
{

    /**
     * @var Repository
     */
    private Repository $repository;
    /**
     * @var TestModel|Mockery\LegacyMockInterface|Mockery\MockInterface
     */
    private $model;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = new Repository();
        $this->model = Mockery::mock(TestModel::class);
        $builder = Mockery::mock(Builder::class);
        $this->model->shouldReceive('newModelQuery')->andReturn($builder);
        $builder->shouldReceive('find')->andReturn($this->model);
        $builder->shouldReceive('findMany')->andReturn(new Collection());
        $builder->shouldReceive('get')->andReturn(new Collection());
    }

    /**
     * @test
     */
    public function if_incorrect_model()
    {
        $this->expectException(TypeError::class);
        $this->repository->getInstance(RepositoryTest::class);
    }

    /**
     * @test
     */
    public function it_can_get_instance()
    {
        $testRepo = $this->repository->getInstance($this->model);

        $this->assertInstanceOf(Repository::class, $testRepo);
    }

    /**
     * @test
     */
    public function it_can_get_one()
    {
        $testRepo = $this->repository->getInstance($this->model);
        $result = $testRepo->get(1);

        $this->assertEquals($this->model, $result);
    }

    /**
     * @test
     */
    public function it_can_get_many()
    {
        $testRepo = $this->repository->getInstance($this->model);
        $result = $testRepo->getMany([1,2,3]);

        $this->assertEquals(new Collection(), $result);
    }

    /**
     * @test
     */
    public function it_can_get_all()
    {
        $testRepo = $this->repository->getInstance($this->model);
        $result = $testRepo->getAll();

        $this->assertEquals(new Collection(), $result);
    }
}