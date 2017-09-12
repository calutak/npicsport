<?php
	
?>
<script type="text/javascript">
$('#render').on('click', function(e) {
  e.preventDefault();
  // console.log($(this).attr('href'));
  $.get($(this).attr('href'), function(data) {
      var d = JSON.parse(data);

      var group = $('<div class="group'+d.round+'"></div>');
      for(r=1;r<=d.round;r++)
      {
        var round = $('<div class="r'+r+'"></div>');
        for(i=0;i<d.team[r].length;i++)
        {
          if(d.team[r][i].team_a =='')
          {
            round.append('<div><div class="bracketbox"><span class="info"> </span><span class="teama">'+d.team[r][i].team_a+'</span><span class="teamb">'+d.team[r][i].team_b+'</span></div></div>');
          }
          else if(d.team[r][i].team_b =='')
          {
            round.append('<div><div class="bracketbox"><span class="info"> </span><span class="teama">'+d.team[r][i].team_a+'</span><span class="teamb">'+d.team[r][i].team_b+'</span></div></div>');
          } 
          else if (d.team[r][i].team_a=='byes' || d.team[r][i].team_b=='byes')
          {
            round.append('<div></div>');
          }
          else
          {
            round.append('<div><div class="bracketbox"><span class="info"> </span><span class="teama">'+d.team[r][i].team_a+'</span><span class="teamb">'+d.team[r][i].team_b+'</span></div></div>');
          }
        }
        group.append(round);
      }
      
      $('#brackets').append(group);
  });
});
</script>