<?php
namespace Drupal\welcome_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the Example module.
 */
class WelcomeController extends ControllerBase {

  /**
   * Returns a simple page.
   *
   * @return array
   *   A simple renderable array.
   */
  public function welcome() {
    return [
	'#title' => 'Hello World!',
      '#markup' => 'Hello, world',
    ];
  }

}

?>
