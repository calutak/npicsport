<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Drawing
        <small>Sport Event Information System NPIC</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('adm')?>"><i class="fa fa-home"></i>Dashboard</a></li>
        <li><a href="<?php echo site_url('adm/drawing')?>">Drawing</a></li>
        <li class="active">Here</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
  <?php echo $this->session->flashdata('response'); ?>
  <div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Drawing Team for Tournament</h3>
    </div>
    <form id="find" action="<?php echo site_url('adm/drawing/find') ?>" method="post">
      <div class="box-body">
        <?php if(empty($tdropdown)) { ?>
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>No tournament qualified!
        </div>
        <?php } else { ?>
        <div class="form-group col-md-3">
          <label style="padding-top: 4%;">Choose Tournament</label>
        </div>
        <div class="form-group col-md-2">
          <select class="form-control" name="tid">
            <?php foreach ($tdropdown as $row) 
            {
              echo '<option value="'.$row->tournament_id.'">'.$row->tournament_name.'</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-2">
          <button type="submit" class="btn btn-info">Go</button>
        </div>
        <?php } ?>
      </div>
    </form>
    <div class="clearfix"></div>
    <div class="box-body container"></div>
  </div>
</section>

<script>
  $(document).ready(function () {
    $('form[id="find"]').submit(function(e) {
      e.preventDefault();
      $.ajax({
        url:$(this).attr('action'),
        type:$(this).attr('method'),
        data:$(this).serialize(),
        success:function(data) {
          // console.log(data);
          var d = data.split('</div>[');
          $('.container').html(d[0]+'</div>').promise().done(function() {
            var json = JSON.parse('['+d[1]);
            // $( "input[type=text]" ).autocomplete({
            //    source: json
            // });
          });
          $('.teamdrag').draggable({
              tolerance: 'intersect',
              cursor: 'move',
              revert: 'invalid'
            });
          $('.drops').droppable({
            tolerance: 'intersect',
            accept: ".teamdrag",
            drop: function (event, ui) {
              this.value = $(ui.draggable).text();
              // console.log($(ui.draggable).find('h4').attr('id'));
              var spanid = $(this).attr('id');
              // $(ui.draggable).toggleClass('bg-default bg-danger');
              // $(ui.draggable).toggleClass('teamdrag dropped');
              $('span[id='+spanid+']').toggleClass('reassign assigned');
              // $('span[id='+spanid+']').toggleClass($(ui.draggable).find('h4').attr('id'));

              $('.assigned').click(function (){
                $('input[id='+spanid+']').val('');
                // $(ui.draggable).toggleClass('bg-default bg-danger');
                $('span[id='+spanid+']').toggleClass('reassign assigned');
              });
            }
          });
          // var groups = $("ol.ddd").sortable({
          //   group: 'limited_drop_targets',
          //   drop: false
          // });
          // var group = $("ol.limited_drop_targets").sortable({
          //   group: 'limited_drop_targets',
          //   isValidTarget: function  ($item, container) {
          //     if($item.is(".highlight"))
          //       return true;
          //     else
          //       return $item.parent("ol")[0] == container.el[0];
          //   },
          //   onDrop: function ($item, container, _super) {
          //     $('#serialize_output').text(
          //       group.sortable("serialize").get().join("\n"));
          //     _super($item, container);
          //     console.log(group);
          //   },
          //   serialize: function (parent, children, isContainer) {
          //     return isContainer ? children.join() : parent.text();
          //   },
          //   tolerance: 6,
          //   distance: 10
          // });
        }
      });
    });
  });
</script>