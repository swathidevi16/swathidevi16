<?php

namespace Drupal\vrtx_lang_redirect\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\ConfigFormBase;

/**
 * Vrtx anslation Redirect default settings form.
 */
class DefaultSettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'vrtx_translation_redirect_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['vrtx_lang_redirect.default'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Get default settings.
    $config = $this->config('vrtx_lang_redirect.default');
    $form['redirecturl'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Redirect URL'),
      '#default_value' => $config->get('redirect_url'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Save the configuration.
    $this->config('vrtx_lang_redirect.default')
      ->set('redirect_url', $form_state->getValue('redirecturl'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
