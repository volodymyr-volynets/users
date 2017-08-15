<?php

namespace Numbers\Users\Users\DataSource;
class Messages extends \Object\DataSource {
	public $db_link;
	public $db_link_flag;
	public $pk = ['message_id'];
	public $columns;
	public $orderby;
	public $limit;
	public $single_row;
	public $single_value;
	public $options_map =[];
	public $options_active =[];
	public $column_prefix = '';

	public $cache = true;
	public $cache_tags = [];
	public $cache_memory = false;

	public $primary_model = '\Numbers\Users\Users\Model\Message\Recipients';
	public $parameters = [
		'user_id' => ['name' => 'User #', 'domain' => 'user_id'],
		'message_id' => ['name' => 'Message #', 'domain' => 'message_id'],
	];

	public function query($parameters, $options = []) {
		if (empty($parameters['user_id'])) {
			$parameters['user_id'] = \User::id();
		}
		// columns
		$this->query->columns([
			'message_id' => 'a.um_mesrecip_message_id',
			'timestamp' => 'b.um_mesheader_inserted_timestamp',
			'read' => 'a.um_mesrecip_read',
			'subject' => 'b.um_mesheader_subject',
			'to_user_id' => 'a.um_mesrecip_user_id',
			'to_name' => 'd.um_user_name',
			'to_email' => 'a.um_mesrecip_user_email',
			'to_type_id' => 'a.um_mesrecip_type_id',
			'from_name' => 'b.um_mesheader_from_name',
			'from_email' => 'b.um_mesheader_from_email',
			'body' => 'c.um_mesbody_body',
			'keywords' => 'b.um_mesheader_keywords'
		]);
		// joins
		$this->query->join('LEFT', new \Numbers\Users\Users\Model\Message\Headers(), 'b', 'ON', [
			['AND', ['a.um_mesrecip_message_id', '=', 'b.um_mesheader_id', true], false]
		]);
		$this->query->join('LEFT', new \Numbers\Users\Users\Model\Message\Bodies(), 'c', 'ON', [
			['AND', ['b.um_mesheader_body_id', '=', 'c.um_mesbody_id', true], false]
		]);
		$this->query->join('LEFT', new \Numbers\Users\Users\Model\Users(), 'd', 'ON', [
			['AND', ['a.um_mesrecip_user_id', '=', 'd.um_user_id', true], false]
		]);
		$this->query->where('AND', ['a.um_mesrecip_user_id', '=', $parameters['user_id']]);
		// message id
		if (!empty($parameters['message_id'])) {
			$this->query->where('AND', ['a.um_mesrecip_message_id', '=', $parameters['message_id']]);
		}
	}
}