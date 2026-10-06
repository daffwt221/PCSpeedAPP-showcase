# Suggested SMS Demonstration

## Walkthrough

1. Open a fictional repair order in a controlled demo environment.
2. Change its status to the status configured to send an SMS, such as ready for collection.
3. Save the order and show the application's SMS success message.
4. Show the matching SMS on a test phone or use an anonymized capture from the original demonstration.

## Spoken Version

“When the equipment is ready, the team updates the repair order. For a status configured for SMS, PCSpeedAPP submits a notification to the customer's registered number and shows whether the Vonage API accepted the request. This connects the workshop workflow to customer communication and was intended to reduce manual follow-up.”

## Accuracy Notes

- The 2023 report describes a Vonage SMS integration and notes that the SMS API is paid; this public showcase characterizes the historical integration as a proof of concept.
- The report explains the API response and an example message, but does not provide delivery-rate, time-saved, or cost results.
- The public showcase does not include the historical application or Vonage credentials. Use fictional records and a controlled test number for any live demonstration; otherwise, present the steps with an anonymized capture or storyboard.
- The PHP workflow sample in `../samples/RepairOrderWorkflow.php` is a new 2026 example of repair-status transitions. It does not implement SMS sending.

