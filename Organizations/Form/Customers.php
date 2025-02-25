<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Form;

use Numbers\Users\Documents\Base\Helper\MassUpload;
use Numbers\Users\Documents\Base\Helper\Validate;
use Numbers\Users\Organizations\Model\Customer\IntegrationMappings;
use Numbers\Users\Organizations\Model\Customer\SigningOfficers;
use Numbers\Users\Organizations\Model\Customer\SigningTypes;
use Numbers\Users\Users\Model\Users;
use Object\Content\Messages;
use Object\Form\Base;

class Customers extends \Object\Form\Wrapper\Base
{
    public $form_link = 'on_customers';
    public $module_code = 'ON';
    public $title = 'O/N Customers Form';
    public $options = [
        'segment' => self::SEGMENT_FORM,
        'actions' => [
            'refresh' => true,
            'new' => true,
            'back' => true,
            'import' => true
        ]
    ];
    public $containers = [
        'top' => ['default_row_type' => 'grid', 'order' => 100],
        'tabs' => ['default_row_type' => 'grid', 'order' => 500, 'type' => 'tabs'],
        'buttons' => ['default_row_type' => 'grid', 'order' => 900],
        // child containers
        'general_container' => ['default_row_type' => 'grid', 'order' => 32000],
        'contact_container' => ['default_row_type' => 'grid', 'order' => 32100],
        'logo_container' => ['default_row_type' => 'grid', 'order' => 32200],
        'operating_container' => ['default_row_type' => 'grid', 'order' => 32201, 'acl_subresource_edit' => ['ON::CUS_OPERATING']],
        'integration_mappings_container' => [
            'type' => 'details',
            'details_rendering_type' => 'table',
            'details_new_rows' => 1,
            'details_key' => IntegrationMappings::class,
            'details_pk' => ['on_custintegmap_integtype_code', 'on_custintegmap_code'],
            'order' => 35001,
        ],
        'signing_officers_container' => [
            'type' => 'details',
            'details_rendering_type' => 'grid_with_label',
            'details_new_rows' => 1,
            'details_key' => SigningOfficers::class,
            'details_pk' => ['on_custsignofficer_id'],
            'details_autoincrement' => ['on_custsignofficer_id'],
            'order' => 35001,
        ],
    ];
    public $rows = [
        'top' => [
            'on_customer_id' => ['order' => 100],
            'on_customer_name' => ['order' => 200],
        ],
        'tabs' => [
            'general' => ['order' => 100, 'label_name' => 'General'],
            'logo' => ['order' => 300, 'label_name' => 'About'],
            'operating' => ['order' => 350, 'label_name' => 'Operations', 'acl_subresource_hide' => ['ON::CUS_OPERATING']],
            'integration' => ['order' => 400, 'label_name' => 'Integration'],
            'signing_officers' => ['order' => 500, 'label_name' => 'Officers'],
            \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES => \Numbers\Countries\Widgets\Addresses\Base::ADDRESSES_DATA  + ['acl_subresource_hide' => ['ON::CUS_ADDRESSES']],
            \Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES => \Numbers\Tenants\Widgets\Attributes\Base::ATTRIBUTES_DATA  + ['acl_subresource_hide' => ['ON::CUS_ATTRIBUTES']],
        ]
    ];
    public $elements = [
        'top' => [
            'on_customer_id' => [
                'on_customer_id' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Customer #', 'domain' => 'customer_id_sequence', 'percent' => 50, 'navigation' => true],
                'on_customer_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'group_code', 'null' => true, 'percent' => 50, 'required' => true, 'navigation' => true]
            ],
            'on_customer_name' => [
                'on_customer_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'percent' => 100, 'required' => true],
            ]
        ],
        'tabs' => [
            'general' => [
                'general' => ['container' => 'general_container', 'order' => 100],
                'contact' => ['container' => 'contact_container', 'order' => 200]
            ],
            'logo' => [
                'logo' => ['container' => 'logo_container', 'order' => 100]
            ],
            'operating' => [
                'operating' => ['container' => 'operating_container', 'order' => 100]
            ],
            'integration' => [
                'integration' => ['container' => 'integration_mappings_container', 'order' => 100],
            ],
            'signing_officers' => [
                'signing_officers' => ['container' => 'signing_officers_container', 'order' => 100],
            ]
        ],
        'general_container' => [
            'on_customer_organization_id' => [
                'on_customer_organization_id' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'required' => true, 'percent' => 90, 'method' => 'select', 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive'],
                'on_customer_hold' => ['order' => 2, 'label_name' => 'Hold', 'type' => 'boolean', 'percent' => 5],
                'on_customer_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'on_customer_icon' => [
                'on_customer_icon' => ['order' => 1, 'row_order' => 250, 'label_name', 'label_name' => 'Icon', 'domain' => 'icon', 'null' => true, 'percent' => 100, 'method' => 'select', 'options_model' => '\Numbers\Frontend\HTML\FontAwesome\Model\Icons::options', 'searchable' => true],
            ],
            'separator_2' => [
                self::SEPARATOR_HORIZONTAL => ['order' => 100, 'row_order' => 400, 'label_name' => 'Contact Information', 'icon' => 'far fa-envelope', 'percent' => 100],
            ],
            'on_customer_email' => [
                'on_customer_email' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
                'on_customer_email2' => ['order' => 2, 'label_name' => 'Secondary Email', 'domain' => 'email', 'null' => true, 'percent' => 50, 'required' => false],
            ],
            'on_customer_phone' => [
                'on_customer_phone' => ['order' => 1, 'row_order' => 500, 'label_name' => 'Primary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
                'on_customer_phone2' => ['order' => 2, 'label_name' => 'Secondary Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
            ],
            'on_customer_cell' => [
                'on_customer_cell' => ['order' => 1, 'row_order' => 600, 'label_name' => 'Cell Phone', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
                'on_customer_fax' => ['order' => 2, 'label_name' => 'Fax', 'domain' => 'phone', 'null' => true, 'percent' => 50, 'required' => false],
            ],
            'on_customer_alternative_contact' => [
                'on_customer_alternative_contact' => ['order' => 1, 'row_order' => 700, 'label_name' => 'Alternative Contact', 'domain' => 'description', 'null' => true, 'percent' => 100, 'method' => 'textarea'],
            ],
        ],
        'operating_container' => [
            'on_customer_operating_country_code' => [
                'on_customer_operating_country_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Operating Country', 'domain' => 'country_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Countries\Model\Countries::optionsActive', 'onchange' => 'this.form.submit();'],
                'on_customer_operating_province_code' => ['order' => 2, 'label_name' => 'Operating Province', 'domain' => 'province_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Countries\Model\Provinces::optionsActive', 'options_depends' => ['cm_province_country_code' => 'on_customer_operating_country_code']],
            ],
            'on_customer_operating_currency_code' => [
                'on_customer_operating_currency_code' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Operating Currency Code', 'domain' => 'currency_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Currencies\Model\Currencies::optionsActive'],
                'on_customer_operating_currency_type' => ['order' => 2, 'label_name' => 'Operating Currency Type', 'domain' => 'currency_type', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Countries\Currencies\Model\Types::optionsActive'],
            ]
        ],
        'logo_container' => [
            '__logo_upload' => [
                '__logo_upload' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Upload Logo', 'type' => 'mixed', 'percent' => 50, 'method' => 'file', 'validator_method' => '\Numbers\Users\Documents\Base\Validator\Files::validate', 'validator_params' => ['types' => ['images'], 'image_size' => '200x80', 'thumbnail_size' => '125x50'], 'description' => 'Extensions: ' . Validate::IMAGE_EXTENSIONS . '. Size: 200x80.'],
                '__logo_preview' => ['order' => 2, 'label_name' => 'Preview Logo', 'percent' => 50, 'custom_renderer' => '\Numbers\Users\Documents\Base\Helper\Preview::renderPreview', 'preview_file_id' => 'on_customer_logo_file_id'],
            ],
            'on_customer_about_nickname' => [
                'on_customer_about_nickname' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Nickname', 'domain' => 'name', 'null' => true, 'percent' => 100],
            ],
            'on_customer_about_description' => [
                'on_customer_about_description' => ['order' => 1, 'row_order' => 300, 'label_name' => 'Description', 'domain' => 'description', 'null' => true, 'percent' => 100, 'method' => 'textarea'],
            ],
            self::HIDDEN => [
                'on_customer_logo_file_id' => ['label_name' => 'Logo File #', 'domain' => 'file_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'integration_mappings_container' => [
            'row1' => [
                'on_custintegmap_integtype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Integration Type', 'domain' => 'group_code', 'null' => true, 'required' => true, 'percent' => 50, 'method' => 'select', 'options_model' => '\Numbers\Tenants\Tenants\Model\Integration\Types::optionsActive', 'onchange' => 'this.form.submit();'],
                'on_custintegmap_code' => ['order' => 2, 'label_name' => 'Code', 'domain' => 'code', 'null' => true, 'required' => true, 'percent' => 45],
                'on_custintegmap_inactive' => ['order' => 3, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'row2' => [
                'on_custintegmap_name' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'percent' => 95],
                'on_custintegmap_default' => ['order' => 2, 'label_name' => 'Default', 'type' => 'boolean', 'percent' => 5],
            ]
        ],
        'signing_officers_container' => [
            'row1' => [
                'on_custsignofficer_custsigntype_code' => ['order' => 1, 'row_order' => 100, 'label_name' => 'Type', 'domain' => 'type_code', 'null' => true, 'required' => true, 'percent' => 15, 'method' => 'select', 'options_model' => SigningTypes::class, 'options_options' => ['i18n' => 'skip_sorting'], 'onchange' => 'this.form.submit();'],
                'on_custsignofficer_um_user_id' => ['order' => 2, 'label_name' => 'User', 'domain' => 'user_id', 'null' => true, 'percent' => 25, 'method' => 'select', 'options_model' => '\Numbers\Users\Users\DataSource\UsersWithPhoto::optionsActive', 'options_depends' => ['selected_organizations' => 'parent::on_customer_organization_id'], 'onchange' => 'this.form.submit();'],
                'on_custsignofficer_name' => ['order' => 3, 'label_name' => 'Name', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 45],
                'on_custsignofficer_primary' => ['order' => 4, 'label_name' => 'Primary', 'type' => 'boolean', 'percent' => 10],
                'on_custsignofficer_inactive' => ['order' => 5, 'label_name' => 'Inactive', 'type' => 'boolean', 'percent' => 5]
            ],
            'row2' => [
                'on_custsignofficer_title' => ['order' => 1, 'row_order' => 200, 'label_name' => 'Title', 'domain' => 'name', 'null' => true, 'required' => true, 'percent' => 40],
                'on_custsignofficer_email' => ['order' => 2, 'label_name' => 'Email', 'domain' => 'email', 'null' => true, 'required' => true, 'percent' => 30],
                'on_custsignofficer_cell' => ['order' => 3, 'label_name' => 'Cell Phone', 'domain' => 'phone', 'null' => true, 'required' => true, 'percent' => 30],
            ],
            self::HIDDEN => [
                'on_custsignofficer_id' => ['label_name' => 'Detail #', 'domain' => 'detail_id', 'null' => true, 'method' => 'hidden'],
            ]
        ],
        'buttons' => [
            self::BUTTONS => self::BUTTONS_DATA_GROUP
        ]
    ];
    public $collection = [
        'name' => 'ON Customers',
        'model' => '\Numbers\Users\Organizations\Model\Customers',
        'details' => [
            IntegrationMappings::class => [
                'name' => 'ON Customer Integration Mappings',
                'pk' => ['on_custintegmap_tenant_id', 'on_custintegmap_customer_id', 'on_custintegmap_integtype_code', 'on_custintegmap_code'],
                'type' => '1M',
                'map' => ['on_customer_tenant_id' => 'on_custintegmap_tenant_id', 'on_customer_id' => 'on_custintegmap_customer_id']
            ],
            SigningOfficers::class => [
                'name' => 'ON Customer Signing Officers',
                'pk' => ['on_custsignofficer_tenant_id', 'on_custsignofficer_customer_id', 'on_custsignofficer_id'],
                'type' => '1M',
                'map' => ['on_customer_tenant_id' => 'on_custsignofficer_tenant_id', 'on_customer_id' => 'on_custsignofficer_customer_id']
            ]
        ]
    ];

    public function refresh(Base & $form)
    {
        // if we preset user in officers.
        if ($form->changed_field === 'on_custsignofficer_um_user_id') {
            $form->setDetailValues($form->changed_detail, [], function ($values) use ($form) {
                if (!empty($values['on_custsignofficer_um_user_id'])) {
                    $user = Users::getStatic([
                        'where' => [
                            'um_user_id' => $values['on_custsignofficer_um_user_id']
                        ],
                        'pk' => null,
                        'single_row' => true,
                    ]);
                    return [
                        'on_custsignofficer_name' => $user['um_user_name'],
                        'on_custsignofficer_email' => $user['um_user_email'],
                        'on_custsignofficer_cell' => $user['um_user_cell']
                    ];
                } else {
                    return [
                        'on_custsignofficer_name' => null,
                        'on_custsignofficer_email' => null,
                        'on_custsignofficer_cell' => null
                    ];
                }
            });
        }
    }

    public function validate(Base & $form)
    {
        // primary address
        if (!$form->hasErrors()) {
            // primary officer
            if (count($form->values[SigningOfficers::class]) > 0) {
                $primary_first_key = null;
                $primary_officer_id = $form->validateDetailsPrimaryColumn(
                    SigningOfficers::class,
                    'on_custsignofficer_primary',
                    'on_custsignofficer_inactive',
                    'on_custsignofficer_id',
                    $primary_first_key
                );
                if ($primary_first_key && $form->values[SigningOfficers::class][$primary_first_key]['on_custsignofficer_custsigntype_code'] == 'WITNESS') {
                    $form->error(DANGER, Messages::INVALID_VALUES, SigningOfficers::class . "[" . $primary_first_key . "][on_custsignofficer_custsigntype_code]");
                    $form->error(DANGER, Messages::INVALID_VALUES, SigningOfficers::class . "[" . $primary_first_key . "][on_custsignofficer_primary]");
                }
                if (empty($form->values['\Numbers\Users\Organizations\Model\Customers\0Virtual0\Widgets\Addresses'])) {
                    $form->error(DANGER, Messages::REQUIRED_FIELD, '\Numbers\Users\Organizations\Model\Customers\0Virtual0\Widgets\Addresses[1][wg_address_type_code]');
                }
                // phone and email are mandatory fields
                $form->validateQuickRequired('on_customer_phone');
                $form->validateQuickRequired('on_customer_email');
            }
            if (!empty($form->values['\Numbers\Users\Organizations\Model\Customers\0Virtual0\Widgets\Addresses'])) {
                // primary address
                $primary_first_key = null;
                $primary_address_type = $form->validateDetailsPrimaryColumn(
                    '\Numbers\Users\Organizations\Model\Customers\0Virtual0\Widgets\Addresses',
                    'wg_address_primary',
                    'wg_address_inactive',
                    'wg_address_type_code',
                    $primary_first_key
                );
            }
        }
        // logo
        if (!$form->hasErrors() && !empty($form->values['__logo_upload'])) {
            MassUpload::uploadOneInForm($form, $form->values['__logo_upload'], 'on_customer_logo_file_id', $form->fields['__logo_upload']['options']['validator_params'] ?? []);
        }
    }

    public function overrideTabs(& $form, & $options, & $tab, & $neighbouring_values)
    {
        $result = [];
        if ($tab == 'logo' && (empty($form->values['on_customer_id']) || !\Can::systemModuleExists('DT'))) {
            $result['hidden'] = true;
        }
        return $result;
    }
}
