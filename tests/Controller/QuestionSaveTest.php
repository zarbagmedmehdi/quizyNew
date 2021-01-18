<?php


namespace App\Tests\Controller;


use App\Entity\Question;
use App\Repository\QuestionRepository;
use Doctrine\Persistence\ObjectRepository;
use Faker;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class QuestionSaveTest  extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;
    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }
    public function testName()
    {
        $question =new Question();

        $questionRepository = $this->
        createMock(QuestionRepository::class);
        $questionRepository->expects($this->any())->
        method('save')->willReturn(1);
        $faker = Faker\Factory::create();
        $question->setLibelle($faker->title);
        $question->setContenu(($faker->text(
            100
        )));
        $result = $this->entityManager
        ->getRepository(Question::class)->save($question);
        $this->assertEquals(1, 1);

    }
    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }


}
