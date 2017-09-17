<div class="form-group col-md-3">
  <label style="padding-top: 4%;">Choose tournament</label>
</div>
<div class="form-group col-md-2">
  <select class="form-control select2" id="year" name="year">
    <?php foreach ($tournament as $row) 
    {
      echo '<option value="'.$row->tournament_name.'">'.$row->tournament_name.'</option>';
    }
    ?>
  </select>
</div>
<div class="form-group col-md-2">
  <button class="btn btn-info btournament">Go</button>
</div>