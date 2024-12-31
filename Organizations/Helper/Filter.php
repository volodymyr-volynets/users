<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Users\Organizations\Helper;

class Filter
{
    public const F_ORGANIZATION_ID = ['label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGrouped'];
    public const F_ORGANIZATION_ID_ACTIVE = ['label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive'];
    public const F_CUSTOMER_ID = ['label_name' => 'Customer', 'domain' => 'customer_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Customers::optionsGrouppedTree'];
    public const F_CUSTOMER_ID_ACTIVE = ['label_name' => 'Customer', 'domain' => 'customer_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Customers::optionsGrouppedTreeActive'];
    public const F_LOCATION_ID = ['label_name' => 'Location', 'domain' => 'location_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Locations::optionsGrouppedSearch', 'options_options' => ['skip_photo_id' => true]];
    public const F_DISTRICT_ID = ['label_name' => 'District', 'domain' => 'district_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'searchable' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Districts'];
    public const F_MARKET_ID = ['label_name' => 'Market', 'domain' => 'market_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'searchable' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Markets'];
    public const F_REGION_ID = ['label_name' => 'Region', 'domain' => 'region_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'searchable' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Regions'];
    public const F_BRAND_ID = ['label_name' => 'Brand', 'domain' => 'brand_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'searchable' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Brands'];
    // other
    public const F_ORGANIZATION_ID_SINGLE = ['label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'method' => 'select', 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGrouped'];
    public const F_CUSTOMER_ID_SINGLE = ['label_name' => 'Customer', 'domain' => 'customer_id', 'null' => true, 'method' => 'select', 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Customers::optionsGrouppedTree'];
    public const F_LOCATION_ID_SINGLE = ['label_name' => 'Location', 'domain' => 'location_id', 'null' => true, 'method' => 'select', 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\DataSource\LocationsWithNumber', 'options_options' => ['skip_photo_id' => true]];
    public const F_LOCATION_NUMBER = ['label_name' => 'Location Number', 'domain' => 'location_number', 'null' => true];
}
