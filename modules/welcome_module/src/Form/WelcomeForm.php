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
	$roles = Role::loadMultiple();
	echo $roles;
	//for($i = 0, $j = count($roles); $i < $j ; $i++) {
	$form['phone_number'] = [
     '#type' => 'textfield',
     '#title' => $this->t($roles[$i]),
	];
// }
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
    if (strlen($form_state->getValue('phone_number')) < 3) {
      $form_state->setErrorByName('phone_number', $this->t('The phone number is too short. Please enter a full phone number.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addStatus($this->t('Your phone number is @number', ['@number' => $form_state->getValue('phone_number')]));
  }

}

?>