<?php

namespace Numbers\Users\Printing\Model\Collection;
class Headers extends \Object\Collection {
	public $data = [
		'name' => 'P8 Headers',
		'model' => '\Numbers\Users\Printing\Model\Headers',
		'details' => [
			'\Numbers\Users\Printing\Model\Header\Fields' => [
				'name' => 'P8 Header Fields',
				'pk' => ['p8_hdrfield_tenant_id', 'p8_hdrfield_header_id', 'p8_hdrfield_model_code', 'p8_hdrfield_column_name', 'p8_hdrfield_hdrrowtype_code'],
				'type' => '1M',
				'map' => ['p8_header_tenant_id' => 'p8_hdrfield_tenant_id', 'p8_header_id' => 'p8_hdrfield_header_id'],
				'details' => [
					'\Numbers\Users\Printing\Model\Header\Field\MultipleColumns' => [
						'name' => 'P8 Header Field Multiple Columns',
						'pk' => ['p8_hdrfldmult_tenant_id', 'p8_hdrfldmult_header_id', 'p8_hdrfldmult_model_code', 'p8_hdrfldmult_column_name', 'p8_hdrfldmult_hdrrowtype_code', 'p8_hdrfldmult_multiple_model_code', 'p8_hdrfldmult_multiple_column_name'],
						'type' => '1M',
						'map' => ['p8_hdrfield_tenant_id' => 'p8_hdrfldmult_tenant_id', 'p8_hdrfield_header_id' => 'p8_hdrfldmult_header_id', 'p8_hdrfield_model_code' => 'p8_hdrfldmult_model_code', 'p8_hdrfield_column_name' => 'p8_hdrfldmult_column_name', 'p8_hdrfield_hdrrowtype_code' => 'p8_hdrfldmult_hdrrowtype_code'],
					]
				]
			]
		]
	];
}