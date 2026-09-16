<?php

declare(strict_types=1);

use PortfolioSamples\RepairOrderWorkflow;
use PortfolioSamples\RepairStatus;

require dirname(__DIR__) . '/samples/RepairOrderWorkflow.php';

function assertSameValue(mixed $expected, mixed $actual, string $message): void
{
    if ($expected !== $actual) {
        throw new RuntimeException($message);
    }
}

$workflow = new RepairOrderWorkflow();

assertSameValue(
    RepairStatus::Diagnosis,
    $workflow->transition(RepairStatus::Received, RepairStatus::Diagnosis),
    'A received order should move to diagnosis.'
);

assertSameValue(
    RepairStatus::Delivered,
    $workflow->transition(RepairStatus::Ready, RepairStatus::Delivered),
    'A ready order should move to delivered.'
);

$invalidTransitionRejected = false;
try {
    $workflow->transition(RepairStatus::Received, RepairStatus::Delivered);
} catch (\DomainException) {
    $invalidTransitionRejected = true;
}

assertSameValue(true, $invalidTransitionRejected, 'An invalid transition should be rejected.');

echo "All portfolio sample tests passed." . PHP_EOL;
