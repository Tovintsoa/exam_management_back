<?php

namespace App\DataProvider\Exam;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\Entity\Exam;
use Doctrine\ORM\EntityManagerInterface;

readonly class ExamReadStateProcessor implements ProviderInterface
{
    public function __construct(private EntityManagerInterface $em){

    }
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $qb = $this->em->getRepository(Exam::class)->createQueryBuilder('e');
        $exams = $qb->getQuery()->getResult();
        $resources = [];
        foreach ($exams as $examEntity) {
            $exam = new \App\ApiResource\Exam();
            $exam->id = $examEntity->getId();
            $exam->studentName = $examEntity->getStudentName();
            $exam->location = $examEntity->getLocation();
            $exam->date = $examEntity->getDate();
            $exam->time = $examEntity->getTime();
            $exam->status = $examEntity->getStatus()->value;
            $resources[] = $exam;
        }
        return $resources;
    }
}