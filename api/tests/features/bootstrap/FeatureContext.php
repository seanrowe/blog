<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given /^I am on the login page$/
     */
    public function iAmOnTheLoginPage()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }

    /**
     * @Given /^I enter my username and password correctly$/
     */
    public function iEnterMyUsernameAndPasswordCorrectly()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }

    /**
     * @When /^I click the Login button$/
     */
    public function iClickTheLoginButton()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }

    /**
     * @Then /^I will be authenticated$/
     */
    public function iWillBeAuthenticated()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }

    /**
     * @Given /^I enter my username and password incorrectly$/
     */
    public function iEnterMyUsernameAndPasswordIncorrectly()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }

    /**
     * @When /^I click on the Login button$/
     */
    public function iClickOnTheLoginButton()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }

    /**
     * @Then /^I will be shown a message "([^"]*)"$/
     */
    public function iWillBeShownAMessage($arg1)
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }

    /**
     * @Given /^I want to recover my password$/
     */
    public function iWantToRecoverMyPassword()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }

    /**
     * @When /^I click on the Forgot Password button$/
     */
    public function iClickOnTheForgotPasswordButton()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }

    /**
     * @Then /^I will be taken to the Forgot Password page$/
     */
    public function iWillBeTakenToTheForgotPasswordPage()
    {
        throw new \Behat\Behat\Tester\Exception\PendingException();
    }
}
