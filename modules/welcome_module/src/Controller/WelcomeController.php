<?php
namespace Drupal\welcome_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the Example module.
 */
class ExampleController extends ControllerBase {

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function welcomeMessage() {
    return [
      '#markup' => 'Hello, world',
    ];
  }

}

?>
