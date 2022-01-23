<?php

declare(strict_types=1);

namespace App\Src\Instant\Domain;

use App\Src\Instant\Domain\Image;
use App\Src\Instant\Domain\InstantId;
use App\Src\Instant\Domain\Title;

final class InstantEntity
{
    private InstantId $id;
    private int $createdAtTimestamp;
    private Title $title;
    private Image $image;
    private int $owner_id;
    private int $loversCount;

    public function __construct(
        InstantId $id, 
        Title $title, 
        Image $image, 
        int $owner_id,
        int $createdAtTimestamp,
        int $loversCount)
    {
        $this->id = $id;
        $this->title = $title;
        $this->image = $image;
        $this->owner_id = $owner_id;
        $this->createdAtTimestamp = $createdAtTimestamp;
        $this->loversCount = $loversCount;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            new InstantId($data['id']),
            new Title($data['title']),
            new Image($data['image']),
            $data['owner_id'],
            $data['createdAtTimestamp'],
            $data['loversCount']
        );
    }

    public function loversCount(): int
    {
        return $this->loversCount;
    }
    
    public function id(): InstantId
    {
        return $this->id;
    }

    public function createdAtTimestamp(): int
    {
        return $this->createdAtTimestamp;
    }

    public function owner(): int
    {
        return $this->owner_id;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id()->value(),
            'title' => $this->title->value(),
            'image' => $this->image->value(),
            'owner_id' => $this->owner_id,
            'createdAtTimestamp' => $this->createdAtTimestamp,
            'loversCount' => $this->loversCount,
        ];
    }
}
