<div class="box-header with-border">
    <h3 class="box-title">Knockout Phase</h3>
</div>
<div class="box-body">
	<form action="<?php echo site_url('adm/drawing/match/'.$tid); ?>" method="post">
	<div class="col-md-10">
		<h4> Registered Team </h4>
	    <?php 
	    if(!empty($registered_team))
	    {
	    $i=0;
	        foreach ($registered_team as $row) {
	    		// echo '<span class="col-sm-3 bg-default">';
	            echo '<span id=\'t'.$i.'\' class="col-sm-3 bg-default text-muted teamdrag">';
	            echo '<h4 id=\'t'.$i.'\'>'.$row->team_name.'</h4>';
	    		// echo '<ol class=\'list-group limited_drop_targets ddd vertical\'>';
	      //       echo '<li class=\'list-group-item highlight\'>'.$row->team_name.'</li>';
	    		// echo '</ol>';
	            echo '</span>';
	            $i++;
	        } 
	    ?>
<div class="col-md-12"><hr></div>
	<input type="hidden" name="counts" value="<?php echo count($registered_team); ?>">
	<?php
	$y=0;
		for ($i=0; $i < (count($registered_team)/2); $i++) 
		{ 
			echo '<span class="col-sm-3">';
			echo '<label>Group '.($i+1).'</label>';
			echo '<span class=\'input-group\'>';
			// echo '<olclass=\'limited_drop_targets vertical\'>';
			// echo '<input id=\'team'.$y.'\' type=\'hidden\' name=\'team[]\'>';
			// echo '</ol>'; 
			// echo '<span id=\'team'.$y.'\' class=\'input-group-addon reassign\'><i class=\'fa fa-refresh\'></i></span>';
			echo '<input id=\'team'.$y.'\' type=\'text\' name=\'team[]\' class=\'form-control drops\' readonly>';
			echo '</span>';
			echo '<center><h4>VS</h4></center>';
			echo '<span class=\'input-group\'>';
			// echo '<ol class=\'limited_drop_targets vertical\'>';
			// echo '<input id=\'team'.($y+1).'\' type=\'hidden\' name=\'team[]\'>';
			// echo '</ol>'; 
			// echo '<span id=\'team'.($y+1).'\' class=\'input-group-addon reassign\'><i class=\'fa fa-refresh\'></i></span>';
			echo '<input id=\'team'.($y+1).'\' type=\'text\' name=\'team[]\' class=\'form-control drops\' readonly>';
			echo '</span>';
			echo '</span>';
			$y+=2;
		}
	?>
<div class="col-md-12"><hr></div>
	<div class="clearfix"></div>
	<button type="submit" class="btn btn-default pull-right drawteam">Set First Round</button>
	</form>
	<?php 
	    }
	    else
	    {
	        echo '<h4 class=\'text-red\'> No Team validated team for this Tournament! </h4>';
	    }
	?>
	</div>
</div>