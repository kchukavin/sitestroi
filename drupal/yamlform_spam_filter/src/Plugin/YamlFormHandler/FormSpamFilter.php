<?php

namespace Drupal\yamlform_spam_filter\Plugin\YamlFormHandler;

use Drupal\Core\Form\FormStateInterface;
use Drupal\yamlform\YamlFormHandlerBase;
use Drupal\yamlform\YamlFormSubmissionInterface;

/**
 * Filters spam messages.
 *
 * @YamlFormHandler(
 *   id = "yamlform_spam_filter",
 *   label = @Translation("Form Spam Filter"),
 *   category = @Translation("API"),
 *   description = @Translation("Filters spam messages."),
 *   cardinality = \Drupal\yamlform\YamlFormHandlerInterface::CARDINALITY_UNLIMITED,
 *   results = \Drupal\yamlform\YamlFormHandlerInterface::RESULTS_PROCESSED,
 * )
 */
class FormSpamFilter extends YamlFormHandlerBase
{
    protected function validateWordBlackList($text)
    {
        $separators = [' ', '.', ',', ';', '?', '<', '>'];
        $blackList = ['and', 'or', 'then', 'new', 'not', 'from', 'this', 'most', 'important'];

        $textCleaned = str_replace($separators, ' ', strtolower($text));

        $words = explode(' ', $textCleaned);

        foreach ($words as $word) {
            if (in_array($word, $blackList)) return false;
        }

        return true;
    }


    public function validateForm(array &$form, FormStateInterface $form_state, YamlFormSubmissionInterface $yamlform_submission)
    {
        $data = $form_state->getValues();

        // @TODO: Не проверять название формы и брать id поля из настроек плагина

        if ($data['form_id'] == 'yamlform_submission_forma_obratnoi_svazi_form') {
            // Блокируем сообщения со ссылками
            if (strpos($data['soobsenie'], 'http://') !== false || strpos($data['soobsenie'], 'https://') !== false) {
                $form_state->setErrorByName('soobsenie', 'Error.');
            }
            if (!$this->validateWordBlackList($data['soobsenie'])) {
                $form_state->setErrorByName('soobsenie', 'Error.');
            }
        }
    }
}