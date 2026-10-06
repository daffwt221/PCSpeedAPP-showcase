# Conceptual Architecture

This document describes the project at a high level without reproducing private implementation details.

## Application Layers

### Web Interface

The application provided browser-based screens for workshop staff. Forms and tables supported daily tasks such as finding customers, registering equipment, creating repair orders, and updating repair progress.

### Application Logic

PHP handled form submissions, validation, workflow changes, database operations, authentication, reports, and print-oriented views.

### Data Storage

MySQL or MariaDB stored the operational records used by the application. The public showcase does not include the historical database, schema dump, backups, or real records.

## Functional Areas

| Area | Responsibility |
| --- | --- |
| Customers | Contact details and customer history |
| Repair orders | Equipment intake, reported problems, and technical work |
| Catalogue | Equipment types, brands, accessories, and statuses |
| Workflow | Progress from reception through repair and delivery |
| Notifications | Status-triggered SMS proof of concept through Vonage |
| Documents | Repair summaries, labels, and print views |
| Reporting | Operational lists and project reporting |
| Administration | Authentication, backups, and supporting tools |

## Typical Workflow

1. A customer and their contact details are located or registered.
2. The equipment and reported problem are recorded.
3. A repair order is created with an initial status.
4. Workshop staff update technical notes and progress.
5. The order moves through diagnosis, repair, completion, and delivery. Submitting an order with an SMS-enabled status triggers a Vonage request using that status's configured message. In the historical PHP flow, the request happens before the database update; a reported send failure exits before the order change is saved.
6. A service document can be printed for operational use.

This description represents the academic project's business flow, not the current implementation or practices of PCSpeed.

