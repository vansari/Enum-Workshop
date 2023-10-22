<?php

declare(strict_types=1);

namespace EnumWorkshop\WithoutEnum;

class Shop
{
    /** @var int $onlineStatus represents the online status 1 = online, 0 = offline */
    private int $onlineStatus = 0;

    public function __construct(private readonly string $country)
    {
    }

    public function getCurrency(): string
    {
        return match ($this->country) {
            'DE', 'FR', 'ES' => 'EUR',
            'GB' => 'Pound',
            default => throw new \InvalidArgumentException()
        };
    }

    /**
     * Returns the ISO-639-2/B language code
     */
    public function getLanguageCode(): string
    {
        return match ($this->country) {
            'DE' => 'ger',
            'FR' => 'fre',
            'ES' => 'spa',
            'GB' => 'eng',
            default => throw new \InvalidArgumentException()
        };
    }

    public function setOnlineStatus(int $status): self
    {
        $this->onlineStatus = $status;
        return $this;
    }

    public function getOnlineStatus(): int
    {
        return $this->onlineStatus;
    }
}
