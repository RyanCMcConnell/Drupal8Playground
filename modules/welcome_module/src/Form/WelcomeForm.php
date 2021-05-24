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
	 
	$form['welcome-user'] = [
     '#type' => 'select',
	 '#title' => $this->t('User type'),
	 '#description' => $this->t('Change the welcome message for this type of user'),
     '#options' => user_role_names(TRUE),
	];
	
	$form['welcome-message'] = [
	 '#type' => 'textarea',
	 '#title' => $this->t('Message'),
	 '#description' => $this->t('This is the message that will display for the selected user.'),
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

