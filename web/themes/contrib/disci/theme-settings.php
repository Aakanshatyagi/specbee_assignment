<?php

use Drupal\Core\Form\FormStateInterface;


/**
 * Implements hook_form_FORM_ID_alter() to alter theme settings form.
 */
function disci_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {

  // Add a checkbox to enable/disable front page content.
  $form['show_frontpage_content'] = [
    '#type' => 'checkbox',
    '#title' => t('Show content on the front page'),
    '#default_value' => theme_get_setting('show_frontpage_content'),
    '#description' => t('Enable this option to display the content on the front page.'),
  ];

  // Fieldset for social media settings
  $form['social_media'] = [
    '#type' => 'fieldset',
    '#title' => t('Social Media Settings'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE, // Group initially collapsed
  ];

// Checkbox to show/hide social icons in the footer
$form['social_media']['show_footer_icons'] = [
  '#type' => 'checkbox',
  '#title' => t('Show social icons in footer'),
  '#default_value' => theme_get_setting('show_footer_icons', 'disci'),
  '#description' => t("Check this option to show social icons in footer. Uncheck to hide."),
];

// Checkbox to show/hide social icons in the top section
$form['social_media']['show_top_icons'] = [
  '#type' => 'checkbox',
  '#title' => t('Show social icons in top section'),
  '#default_value' => theme_get_setting('show_top_icons', 'disci'),
  '#description' => t("Check this option to show social icons in top section. Uncheck to hide."),
];

// Textarea to provide additional information if either footer or top icon is shown
$form['social_media']['social_icons'] = [
  '#type' => 'textarea',
  '#title' => t('Footer or Top Icon Information'),
  '#default_value' => theme_get_setting('social_icons_info', 'disci'),
  '#description' => t('Provide additional information for the footer or top icon.'),
  '#states' => [
    'visible' => [
      ':input[name="social_media[show_footer_icons]"]' => ['checked' => TRUE],
      'or',
      ':input[name="social_media[show_top_icons]"]' => ['checked' => TRUE],
    ],
  ],
];


  // Fieldset for contact information settings
  $form['contact_information'] = [
    '#type' => 'fieldset',
    '#title' => t('Contact Information'),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE, // Group initially collapsed
  ];

  // Checkbox to show/hide phone number field
  $form['contact_information']['show_contact'] = [
    '#type' => 'checkbox',
    '#title' => t('Show Contact'),
    '#default_value' => theme_get_setting('show_contact', 'disci'),
  ];

  // Phone input field
  $form['contact_information']['phone_number'] = [
    '#type' => 'tel',
    '#title' => t('Phone Number'),
    '#description' => t('Enter your phone number.'),
    '#default_value' => theme_get_setting('phone_number', 'disci'),
    '#states' => [
      'visible' => [
        ':input[name="contact_information[show_contact]"]' => ['checked' => TRUE],
      ],
    ],
  ];


  // Email input field
  $form['contact_information']['email'] = [
    '#type' => 'email',
    '#title' => t('Email'),
    '#description' => t('Enter your email address.'),
    '#default_value' => theme_get_setting('email', 'disci'),
    '#states' => [
      'visible' => [
        ':input[name="contact_information[show_contact]"]' => ['checked' => TRUE],
      ],
    ],
  ];

  // Checkbox to show/hide office hours field
  $form['contact_information']['show_office_hours'] = [
    '#type' => 'checkbox',
    '#title' => t('Show Office Hours'),
    '#default_value' => theme_get_setting('show_office_hours', 'disci'),
  ];

  // Textarea for office hours
  $form['contact_information']['office_hours'] = [
    '#type' => 'textarea',
    '#title' => t('Office Hours'),
    '#description' => t('Enter your office hours.'),
    '#default_value' => theme_get_setting('office_hours', 'disci'),
    '#states' => [
      'visible' => [
        ':input[name="contact_information[show_office_hours]"]' => ['checked' => TRUE],
      ],
    ],
  ];

  // Checkbox to show/hide location field
  $form['contact_information']['show_location'] = [
    '#type' => 'checkbox',
    '#title' => t('Show Location'),
    '#default_value' => theme_get_setting('show_location', 'disci'),
  ];

  // Textarea for location
  $form['contact_information']['location'] = [
    '#type' => 'textarea',
    '#title' => t('Location'),
    '#description' => t('Enter your location.'),
    '#default_value' => theme_get_setting('location', 'disci'),
    '#states' => [
      'visible' => [
        ':input[name="contact_information[show_location]"]' => ['checked' => TRUE],
      ],
    ],
  ];
}

/**
 * Submit handler to save theme settings.
 */
function disci_theme_settings_submit($form, FormStateInterface $form_state) {
  $values = $form_state->getValues();

  // Save social media settings
  theme_set_setting('footer_icons_show', !empty($values['social_media']['footer_icons_show']));
  theme_set_setting('top_icons_show', !empty($values['social_media']['top_icons_show']));
  
  // Save contact information settings
  theme_set_setting('show_phone_number', !empty($values['contact_information']['show_phone_number']));
  theme_set_setting('phone_number', $values['contact_information']['phone_number']);

  theme_set_setting('show_email', !empty($values['contact_information']['show_email']));
  theme_set_setting('email', $values['contact_information']['email']);

  theme_set_setting('show_office_hours', !empty($values['contact_information']['show_office_hours']));
  theme_set_setting('office_hours', $values['contact_information']['office_hours']);

  theme_set_setting('show_location', !empty($values['contact_information']['show_location']));
  theme_set_setting('location', $values['contact_information']['location']);
}
