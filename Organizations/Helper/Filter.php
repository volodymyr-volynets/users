<?php

namespace Numbers\Users\Organizations\Helper;
class Filter {
	const F_ORGANIZATION_ID = ['label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'searchable' => 1, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGrouped'];
	const F_ORGANIZATION_ID_ACTIVE = ['label_name' => 'Organization', 'domain' => 'organization_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'searchable' => 1, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Organizations::optionsGroupedActive'];
	const F_CUSTOMER_ID = ['label_name' => 'Customer', 'domain' => 'customer_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'searchable' => 1, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Customers::optionsGrouppedTree'];
	const F_CUSTOMER_ID_ACTIVE = ['label_name' => 'Customer', 'domain' => 'customer_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'searchable' => 1, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Customers::optionsGrouppedTreeActive'];
	const F_LOCATION_ID = ['label_name' => 'Location', 'domain' => 'location_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'searchable' => true, 'tree' => true, 'options_model' => '\Numbers\Users\Organizations\Model\Locations::optionsGrouppedSearch', 'options_options' => ['skip_photo_id' => true]];
	const F_DISTRICT_ID = ['label_name' => 'District', 'domain' => 'district_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Organizations\Model\Districts'];
	const F_MARKET_ID = ['label_name' => 'Market', 'domain' => 'market_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Organizations\Model\Markets'];
	const F_REGION_ID = ['label_name' => 'Region', 'domain' => 'region_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Organizations\Model\Regions'];
	const F_BRAND_ID = ['label_name' => 'Brand', 'domain' => 'brand_id', 'null' => true, 'method' => 'multiselect', 'multiple_column' => 1, 'options_model' => '\Numbers\Users\Organizations\Model\Brands'];
}