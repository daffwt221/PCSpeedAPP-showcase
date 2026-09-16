<?php

declare(strict_types=1);

namespace PortfolioSamples;

use DomainException;

enum RepairStatus: string
{
    case Received = 'received';
    case Diagnosis = 'diagnosis';
    case AwaitingApproval = 'awaiting_approval';
    case Repairing = 'repairing';
    case Ready = 'ready';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';
}

final class RepairOrderWorkflow
{
    /** @var array<string, list<RepairStatus>> */
    private const TRANSITIONS = [
        'received' => [RepairStatus::Diagnosis, RepairStatus::Cancelled],
        'diagnosis' => [RepairStatus::AwaitingApproval, RepairStatus::Repairing, RepairStatus::Cancelled],
        'awaiting_approval' => [RepairStatus::Repairing, RepairStatus::Cancelled],
        'repairing' => [RepairStatus::Ready, RepairStatus::Cancelled],
        'ready' => [RepairStatus::Delivered],
        'delivered' => [],
        'cancelled' => [],
    ];

    /** @return list<RepairStatus> */
    public function allowedTransitions(RepairStatus $currentStatus): array
    {
        return self::TRANSITIONS[$currentStatus->value];
    }

    public function transition(RepairStatus $currentStatus, RepairStatus $nextStatus): RepairStatus
    {
        if (!in_array($nextStatus, $this->allowedTransitions($currentStatus), true)) {
            throw new DomainException(sprintf(
                'A repair order cannot move from "%s" to "%s".',
                $currentStatus->value,
                $nextStatus->value
            ));
        }

        return $nextStatus;
    }
}
