Feature: Feedback page
  In order to provide feedback to our company
  As a customer
  I need to complete an online Feedback page with my feedback


  @feedback
  Scenario: Customer completes the Feedback page with valid data and submits the page
    Given I am on "/feedback.html"
    And I fill in "name" with "Bob Jones"
    And I fill in "email" with "bob@gmail.com"
    And I fill in "phone" with "02075645342"
    And I fill in "city" with "London"
    And I select "Complaint" from "feedback_options"
    And I fill in "your_message" with "The food was cold, and I will never come back here again!"
    And I check "by_email"
    When I press "Send"
    Then I should see "Customer feedback received"


  @feedback @javascript @smoke
  Scenario Outline: Customer completes the Feedback page with valid data and submits the page
    Given I am on "/feedback.html"
    And I fill in "name" with "<Name>"
    And I fill in "email" with "<Email>"
    And I fill in "phone" with "<Phone>"
    And I fill in "city" with "<City>"
    And I select "<Feedback>" from "feedback_options"
    And I fill in "your_message" with "<Message>"
    When I press "Send"
    Then I should see "Customer feedback received"

    Examples:
      | Name | Email          | Phone           | City       | Feedback   | Message                                 |
      | Mike | mike@gmail.com | 02076557744     | Manchester | Question   | What time do you open?                  |
      | Sam  | sam@gmail.com  | +44 1266 773366 | Aberdeen   | Suggestion | Are you open on Sundays?                |
      | John | john@gmail.com | (020) 8833 6688 | Bristol    | Other      | How do I return my item - it is faulty! |


  @feedback @javascript
  Scenario: Customer completes the Feedback page with valid data and submits the page (cleaner version)
    Given I visit the Feedback page
    And I enter the username Mike
    And I enter the email "mike@gmail.com"
    And I enter the phone number 02037683371
    And I enter a city of London
    And I select the feedback Question
    And I enter the message "What time do you open on Sunday? Please let me know via email."
    And I tick the Email checkbox
    When I press "Send"
    Then I should see "Customer feedback received"

  @feedback @javascript
  Scenario: Verify the fields on the Feedback page
    Given I visit the Feedback page
    Then I verify the fields on the Feedback page

