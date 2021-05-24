<?php
namespace Drupal\welcome_module\Plugin\Block;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "welcome_block",
 *   admin_label = @Translation("Welcome block"),
 *   category = @Translation("Welcome!"),
 * )
 */
class WelcomeBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
	if (\Drupal::currentUser()->hasPermission('see welcome message')) {
	$welcome = \Drupal::state()->get('welcome_message'); 
    return [
	
      '#markup' => $this->t('<style>#block-welcomeblock {background-color:#f5f0a8; }</style><p>' . $welcome . '</p>'),
    ];
	}
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }

}
 