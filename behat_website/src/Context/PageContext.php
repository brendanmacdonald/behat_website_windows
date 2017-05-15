<?php

/**
 * @file
 * Class PageContext provides generic test methods for other Context files.
 */

namespace CWTest\Context;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\MinkExtension\Context\MinkContext;
use PHPUnit_Framework_Assert as Assertions;

/**
 * Class PageContext
 * @package CWTest\Context
 */
class PageContext implements Context {

  //  Buttons.
  const BUTTON_SAVE_AND_PUBLISH = 'Save and publish';

  /**
   * @var HelperContext
   */
  public $helperContext;

  /**
   * @var MinkContext
   */
  public $minkContext;

  /**
   * PageContext constructor.
   */
  public function __construct() {
  }

  /**
   * @BeforeScenario
   *
   * @param BeforeScenarioScope $scope
   *
   * Allow access to the HelperContext.
   */
  public function gatherContexts(BeforeScenarioScope $scope) {
    $environment = $scope->getEnvironment();
    $this->helperContext = $environment->getContext('CWTest\Context\HelperContext');
    $this->minkContext = $environment->getContext('Behat\MinkExtension\Context\MinkContext');
  }

  /**
   * Verify the field is displayed on the screen.
   * @param string $field
   */
  protected function verifyField($field) {
    Assertions::assertTrue($this->minkContext->getSession()
      ->getPage()
      ->hasField($field), $field . ' field not found');
  }

  /**
   * Verify the fields displayed on the screen.
   * @param array $fields
   */
  protected function verifyFields($fields) {
    foreach ($fields as $field) {
      Assertions::assertTrue($this->minkContext->getSession()
        ->getPage()
        ->hasField($field), $field . ' field not found');
    }
  }

  /**
   * Verify the frame is displayed on the screen.
   * @param string $frame
   */
  protected function verifyFrame($frame) {
    Assertions::assertTrue($this->helperContext->hasFrame($frame), $frame . ' frame not found');

  }

  /**
   * Verify the frames displayed on the screen.
   * @param array $frames
   */
  protected function verifyFrames($frames) {
    foreach ($frames as $frame) {
      Assertions::assertTrue($this->helperContext->hasFrame($frame), $frame . ' frame not found');
    }
  }

  /**
   * Verify the button is displayed on the screen.
   * @param string $button
   */
  protected function verifyButton($button) {
    Assertions::assertTrue($this->minkContext->getSession()
      ->getPage()
      ->hasButton($button), $button . ' button not found');
  }

  /**
   * Verify the buttons displayed on the screen.
   * @param array $buttons
   */
  protected function verifyButtons($buttons) {
    foreach ($buttons as $button) {
      Assertions::assertTrue($this->minkContext->getSession()
        ->getPage()
        ->hasButton($button), $button . ' button not found');
    }
  }

  /**
   * Verify the regions displayed on the screen.
   * @param array $regions
   */
  protected function verifyRegions($regions) {
    foreach ($regions as $region) {
      $this->helperContext->minkContext->assertElementOnPage($region);
    }
  }

  /**
   * Verify the links displayed on the screen.
   * @param array $links
   */
  protected function verifyLinks($links) {
    foreach ($links as $link) {
      Assertions::assertTrue($this->minkContext->getSession()
        ->getPage()
        ->hasLink($link), $link . ' link not found');
    }
  }

  /**
   * Press the SAVE AND PUBLISH button
   */
  protected function pressSaveAndPublish() {
    $this->minkContext->getSession()
      ->getPage()
      ->pressButton(self::BUTTON_SAVE_AND_PUBLISH);
  }
}