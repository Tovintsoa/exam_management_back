<?php
namespace App\State\Exam;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\Exam;
use App\Enum\StatusEnum;
use App\Mapper\ApiResourceEntityMapperInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

readonly class ExamCreateStateProcessor implements ProcessorInterface,ApiResourceEntityMapperInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }
    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): \App\ApiResource\Exam
    {
         $exam = $this->toEntity($data);
         $this->entityManager->persist($exam);
         $this->entityManager->flush();
         return $this->toResource($exam);
    }

    public function toEntity(object $resource): object
    {
        $requiredFields = [
            'studentName' => 'Student Name must exist',
            'date' => 'Date Examen must exist',
            'time' => 'Time of Examen must exist',
            'status' => 'Status of Examen must exist'
        ];

        foreach ($requiredFields as $field => $message) {
            if (empty($resource->$field)) {
                throw new BadRequestHttpException($message);
            }
        }

        return new Exam()
            ->setTime($resource->time)
            ->setStudentName($resource->studentName)
            ->setLocation($resource->location)
            ->setDate($resource->date)
            ->setStatus(StatusEnum::from($resource->status));
    }

    public function toResource(object $entity): object
    {
        if (!$entity instanceof Exam) {
            throw new \InvalidArgumentException('Expected Exam entity.');
        }
        $resource = new \App\ApiResource\Exam();
        $resource->id = $entity->getId();
        $resource->studentName = $entity->getStudentName();
        $resource->location = $entity->getLocation();
        $resource->date = $entity->getDate();
        $resource->status = $entity->getStatus()->value;
        $resource->time = $entity->getTime();
        return $resource;
    }
}