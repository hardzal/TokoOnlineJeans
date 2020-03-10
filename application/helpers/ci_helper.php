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
