<style type="text/css">
	iframe{
		width: 100%;
		height: 500px;
	}
</style>
<div class="">
		<?= $Videos_static_site_view[0]->iframe ?> 
	</div>
<div class="row"  style="width: 100%; margin-bottom: 2%">
</div>
	
<ul class="accordion" data-accordion>
  <li class="row accordion-navigation">
    <p style="padding: 1%;">
    	<i class="fa fa-sun-o" aria-hidden="true"></i> <?= date('d/m/Y'); ?> 
    	<i class="fa fa-clock-o fa-1x" aria-hidden="true"></i> postagens <?= $Videos_static_site_view[0]->data ?>
    </p> 
	<h3 align="center"> <?= $Videos_static_site_view[0]->slug ?></h3>
    <div id="panel1a" class=" row content active">
      <?= $Videos_static_site_view[0]->texto ?>
    </div>
  </li>
</ul>
