# Independently Rewritten Code Samples

These small examples were created from scratch during a 2026 portfolio review. They are **not extracts, recovered files, or generated diffs** from PGOSTEC or from the private 2023 PCSpeedAPP source tree, and they are not presented as code submitted during the original PAP.

Their purpose is to demonstrate how I would approach a few of the project's core problems today while keeping the historical implementation private.

## Included Samples

### `CustomerRepository.php`

A compact PDO repository demonstrating typed PHP, prepared statements, controlled result shapes, and separation between database access and presentation code.

### `RepairOrderWorkflow.php`

An explicit state machine for a repair order. It prevents arbitrary status changes and makes the permitted workflow easy to review and test.

### `CsrfGuard.php`

A small CSRF helper using session-bound random tokens and timing-safe comparison for state-changing requests.

### `schema.sql`

A simplified relational model for customers and repair orders, including foreign keys, constrained statuses, and useful indexes. It is a new educational model and is not the historical company database schema.

## Running the Sample Tests

With PHP 8.1 or newer:

```bash
php tests/run.php
```

The tests exercise the repair-order transition rules without requiring the private application or a database server.

## Publication Rules

Future samples should only be added when they are independently written, contain no confidential details, and can be understood without access to proprietary code.
