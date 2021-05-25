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
	   if (isset(\Drupal::state()->get('select_answered')) {
		   echo ('<p>' . \Drupal::state()->get('select_answered') . '</p>');
	   }
	   
   }
   
    public function blockForm(array $form, FormStateInterface $form_state) {
	if (\Drupal::currentUser()->isAuthenticated()) {
	$form['select_answer'] = [
	 '#type' => 'select',
	 '#title' => $this->t('Select one'),
	 '#description' => $this->t('What is your favorite fruit?'),
	 '#required' => TRUE,
	 ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#button_type' => 'primary',
    ];
    return $form;
	}
  }

public function submitForm(array &$form, FormStateInterface $form_state) {
    
  \Drupal::state()->set('select_answered', $form_state->getValue('select_answer'));
 $this->messenger()->addStatus($this->t('Thank you! You submitted the following: @message', ['@message' => $form_state->getValue('select_answer')]));
 drupal_flush_all_caches();

}


  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    return AccessResult::allowedIfHasPermission($account, 'access content');
  }

}
 