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
	  $config = $this->getConfiguration();
	$current_user = \Drupal::currentUser();
	$roles = $current_user->getRoles();
	if (in_array("administrator", $roles)) {
		
    return [
      '#markup' => $this->t('<style>#block-welcomeblock {background-color:#f5f0a8; }</style><p>You should only see this as an admin.</p>'),
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
 