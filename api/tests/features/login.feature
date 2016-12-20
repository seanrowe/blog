Feature: Login

  As a user
  I want to be able to enter my username and password into a form so that when I press a button titled "Login"  I gain
  access to the site. I want the form to also have a button called "Forgot Password" that will take me to a form
  where I will take me to the forgot password page. Finally I want the form to have a 'Signup' button that will
  take me to the Signup page when clicked.

  Background:
    Given I am not on the site

  Scenario: I login successfully
    Given I
    When I click the Login button
    Then I will be authenticated

  Scenario: I login in unsuccessfully
    Given I enter my username and password incorrectly
    When I click on the Login button
    Then I will be shown a message "The username and password you have entered is incorrect"

  Scenario: Forgot password
    Given I want to recover my password
    When I click on the Forgot Password button
    Then I will be taken to the Forgot Password page



