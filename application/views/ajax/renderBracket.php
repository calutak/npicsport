<?php
function render_bracket($tid)
{
	$max_round = $this->m_tournament->get_setting_byID($tid)->round;

	for ($rnd=1; $rnd <= $max_round; $rnd++) 
	{
		$matchesList = $this->m_match->get_match_data($tid, $rnd);
		$matches = array();

		foreach ($matchesList as $key) {
			$matches[] = $key;
		}
		$matches = array_chunk($matches, 2);
	}
	return json_encode($matches);
}
?>