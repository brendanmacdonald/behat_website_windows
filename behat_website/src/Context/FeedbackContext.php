<?php

/**
 *@file
 * Class FeedbackContext tests the behaviour of the Feedback page.
 */

namespace CWTest\Context;

use CWTest\Exception\CWContextException;

class FeedbackContext extends PageContext  {

  //  Fields.
  const FIELD_NAME = 'name';
  const FIELD_EMAIL = 'email';
  const FIELD_PHONE = 'phone';
  const FIELD_CITY = 'city';
  const FIELD_FEEDBACK = 'feedback_options';
  const FIELD_MESSAGE = 'your_message';
  const FIELD_BY_EMAIL = 'by_email';
  const FIELD_BY_PHONE = 'by_phone';

  //  Buttons.
  const BUTTON_SEND = 'Send';

  // Strings.
  const STRING_EMAIL = "Email";

  /**
   * The path to the Feedback page.
   * @var string
   */
  private $path = '/feedback.html';

  /**
   * LoginContext constructor.
   */
  public function __construct() {
    parent::__construct();
  }

  /**
   * @Given I visit the Feedback page
   */
  public function iVisitTheFeedbackPage() {
    $this->minkContext->visitPath($this->path);
  }

  /**
   * @Given I enter the username :username
   *
   * @param string $name
   */
  public function iEnterAUsername($name) {
    $this->minkContext->getSession()
      ->getPage()
      ->fillField(self::FIELD_NAME, $name);
  }

  /**
   * @Given I enter the email :email
   *
   * @param string $email
   */
  public function iEnterTheEmail($email) {
    $this->minkContext->getSession()
      ->getPage()
      ->fillField(self::FIELD_EMAIL, $email);
  }

  /**
   * @Given I enter the phone number :number
   *
   * @param string $number
   */
  public function iEnterThePhoneNumber($number) {
    $this->minkContext->getSession()
      ->getPage()
      ->fillField(self::FIELD_PHONE, $number);
  }

  /**
   * @Given I enter a city of :city
   *
   * @param string $city
   */
  public function iEnterACityOf($city) {
    $this->minkContext->getSession()
      ->getPage()
      ->fillField(self::FIELD_CITY, $city);
  }

  /**
   * @Given I select the feedback :feedback
   *
   * @param string $subject
   */
  public function iSelectTheSubject($subject) {
    $this->minkContext->getSession()
      ->getPage()
      ->selectFieldOption(self::FIELD_FEEDBACK, $subject);
  }

  /**
   * @Given I enter the message :message
   *
   * @param string $message
   */
  public function iEnterTheMessage($message) {
    $this->minkContext->getSession()
      ->getPage()
      ->fillField(self::FIELD_MESSAGE, $message);
  }

  /**
   * @Given I tick the :checkbox checkbox
   *
   * @param string $checkbox
   */
  public function iCheckTheCheckbox($checkbox) {
    if ($checkbox == self::STRING_EMAIL) {
      $this->minkContext->getSession()
        ->getPage()
        ->checkField(self::FIELD_BY_EMAIL);
    }
  }

  /**
   * @Given I press Submit Message
   */
  public function iPressSubmitMessage() {
    $this->minkContext->getSession()
      ->getPage()
      ->pressButton(self::BUTTON_SEND);
  }

  /**
   * @Given I am still on the Feedback page
   */
  public function iAmStillOnTheLoginPage() {
    $current_url = $this->minkContext->getSession()->getCurrentUrl();
    if (strpos($current_url, $this->path) === FALSE) {
      throw new CWContextException("No longer on the Loginpage, but on {$current_url}.");
    }
  }

  /**
 * @Given I verify the fields on the Feedback page
 */
  public function iVerifyTheFieldsOnTheFeedbackPage() {
    $this->verifyField(self::FIELD_NAME);
    $this->verifyField(self::FIELD_EMAIL);
    $this->verifyField(self::FIELD_PHONE);
    $this->verifyField(self::FIELD_CITY);
    $this->verifyField(self::FIELD_FEEDBACK);
    $this->verifyField(self::FIELD_MESSAGE);
    $this->verifyField(self::FIELD_BY_EMAIL);
    $this->verifyButton(self::BUTTON_SEND);
  }
}