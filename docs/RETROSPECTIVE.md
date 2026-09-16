# Project Retrospective

## What the Project Taught Me

PCSpeedAPP was valuable because it connected programming with a real operational process. The challenge was not only to create screens or database queries, but to understand how customer intake, equipment identification, diagnosis, repair, and delivery fit together.

Working from an existing application also introduced an important professional skill: understanding unfamiliar code before changing it. The project required tracing data between forms and database tables, identifying where workflows needed adaptation, and checking that changes still supported day-to-day use.

## What I Would Improve Today

With current knowledge, I would approach the implementation differently:

- Separate presentation, application logic, and database access.
- Use prepared statements consistently.
- Validate all input on the server.
- Add CSRF protection and stronger session controls.
- Store passwords with PHP's modern password-hashing API.
- Define repair statuses as an explicit, testable state machine.
- Add automated tests around the most important workflows.
- Keep secrets and environment-specific configuration outside the repository.
- Document third-party ownership and licensing before development begins.

The independently rewritten files in [`../samples/`](../samples/) demonstrate a few of these improvements without reproducing the private historical implementation.

## Professional Takeaway

The project showed me that software development includes requirements, data modelling, usability, security, maintenance, attribution, and communication—not only writing code. Reviewing it years later also reinforced the importance of knowing what can be published and documenting where a codebase came from.
