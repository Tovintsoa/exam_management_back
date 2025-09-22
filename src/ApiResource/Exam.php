<?php

namespace App\ApiResource;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\DataProvider\Exam\ExamReadStateProcessor;
use App\State\Exam\ExamCreateStateProcessor;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new Post(
            uriTemplate: '/exams',
            status: 201,
            normalizationContext: ['groups' => ['exam:read']],
            denormalizationContext: ['groups' => ['exam:write']],
            processor: ExamCreateStateProcessor::class
        ),
        new GetCollection(
            normalizationContext: ['groups' => ['exam:read']],
            provider: ExamReadStateProcessor::class
        ),
    ]
)]
class Exam
{
    #[ApiProperty(identifier: true)]
    #[Groups(['exam:read'])]
    public ?int $id = null;
    #[Groups(['exam:read', 'exam:write'])]
    public ?string $studentName = null;
    #[Groups(['exam:read', 'exam:write'])]
    public ?string $location = null;
    #[Groups(['exam:read', 'exam:write'])]
    public ?\DateTimeInterface  $date = null;
    #[Groups(['exam:read', 'exam:write'])]
    public ?string $status = null;
    #[Groups(['exam:read', 'exam:write'])]
    public ?\DateTimeInterface $time = null;
}