<?php

function flash_message($type, $message, $url)
{
	$ci = &get_instance();
	$ci->session->set_flashdata(
		'message',
		'<div class="alert alert-' . $type . ' alert-dismissable fade show">
			' . $message . ' 
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
			  </button>
		</div>'
	);
	redirect($url);
}

function isLogin()
{
	$ci = &get_instance();
	if (!$ci->session->userdata('user_id')) {
		redirect('pages');
	}
}

function logged()
{
	$ci = &get_instance();
	if ($ci->session->userdata('user_id')) {
		redirect('pages');
	}
}

function random_str(
	int $length = 64,
	string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
	if ($length < 1) {
		throw new \RangeException("Length must be a positive integer");
	}
	$pieces = [];
	$max = mb_strlen($keyspace, '8bit') - 1;
	for ($i = 0; $i < $length; ++$i) {
		$pieces[] = $keyspace[random_int(0, $max)];
	}
	return implode('', $pieces);
}

function idr_format($number)
{
	return number_format($number, 0, ',', '.');
}

function status_button($status)
{
	if ($status) {
		return "<span class='badge badge-success'>Sukses</span>";
	}

	return "<span class='badge badge-danger'>Belum dibayar</span>";
}
