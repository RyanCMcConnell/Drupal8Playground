<?php

namespace Drupal\welcome_module\Form;
use Drupal\user\Entity\Role;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Implements an example form.
 */
class WelcomeForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'welcome_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
	
	$form['welcome-message'] = [
	 '#type' => 'textarea',
	 '#title' => $this->t('Message'),
	 '#description' => $this->t('Choose a custom welcome message for all users with the "See welcome message" permission.'),
	 '#required' => TRUE,
	 ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    

}
}
