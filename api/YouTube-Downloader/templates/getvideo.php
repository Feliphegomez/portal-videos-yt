
<?php if ($this->get('no_stream_map_found', false) === true) { ?>
	<p>No se encontró flujo de formato codificado.</p>
	<p>Esto es lo que obtuvimos de YouTube:</p>
	<pre><?php echo $this->get('no_stream_map_found_dump'); ?></pre>
<?php } else { ?>

	<div class="living_middle">
		<div class="container">
			<h1 class="text-center"><?php echo $this->get('video_title'); ?></h1>
			<hr>
			<div class="col-md-4 wow fadeInLeft" data-wow-delay="0.4s">
			
				<?php if ($this->get('show_thumbnail') === true) { ?><img style="width: 100%;" src="api/YouTube-Downloader/<?php echo $this->get('thumbnail_src'); ?>" border="0" hspace="2" vspace="2"><?php } ?>
				<div class="clearfix"></div>
			
				<?php if ($this->get('show_debug1', false) === true) { ?>
					<ul class="feature">
					   <li> <i class="icon-trophy"></i></li>
						<li class="feature_right"><h4>show_debug1</h4>
						<p><pre><?php echo $this->get('debug1'); ?></pre></p>
						</li>
						<div class="clearfix"></div>
					</ul>
				<?php } ?>
				<?php if ($this->get('show_debug2', false) === true) { ?>
					<ul class="feature">
					   <li> <i class="icon-trophy"></i></li>
						<li class="feature_right"><h4>debug2_expires</h4>
							<p>Estos enlaces caducarán en<?php echo $this->get('debug2_expires'); ?></p>
							<p>El servidor estaba en la dirección IP<?php echo $this->get('debug2_ip'); ?> que es un <?php echo $this->get('debug2ipbits'); ?>poco dirección IP. Tenga en cuenta que cuando se utilizan direcciones IP de 8 bits, los enlaces de descarga pueden fallar.</p>
						</li>
						<div class="clearfix"></div>
					</ul>
				<?php } ?>
				<hr />
				<?php 
					foreach($this->get('streams', []) as $format) {
						if($format['size'] !== '0B'){ 
					?>
					
						
					<ul class="feature last_grid">
						<li> <i class="icon-video"></i></li>
						<li class="feature_right">
							<h4>
								<?php 
									$t = (string) $format['type'];
									$t = substr($format['type'], -4, 5);
									
									echo $t;
									
								?>
								<a class="btn btn-default btn-type disabled" href="#"><?php echo $format['quality']; ?></a>
								<div class="label label-warning"><?php echo $format['size']; ?></div>
							</h4>								
							<p>
								<?php if ($format['show_direct_url'] === true) { ?>
									<a class="btn btn-sm btn-default btn-download" href="<?php echo $format['direct_url']; ?>" class="mime"> Direct</a>
								<?php } ?>
								<?php if ($format['show_proxy_url'] === true) { ?>
									<a class="btn btn-sm btn-primary btn-download" href="api/YouTube-Downloader/<?php echo $format['proxy_url']; ?>" class="mime"> Proxy</a>
								<?php } ?>
							</p>
						</li>
						<hr>
						<div class="clearfix"></div>
					</ul>
					
					<?php 
							} 
						} 
					?>
				<hr />
				<?php 
					$total = 0;
					foreach($this->get('formats', []) as $format) { 
						if($format['size'] !== '0B'){
							$total = $total + 1;
				?>
					<ul class="feature last_grid">
						<li> <i class="icon-audio"></i></li>
						<li class="feature_right">
							<h4>
								<a class="btn btn-default btn-type disabled" href="#"><?php echo $format['type']; ?> - <?php echo $format['quality']; ?></a>
								<div class="label label-warning"><?php echo $format['size']; ?></div>
							</h4>								
						<p>
							<?php if ($format['show_direct_url'] === true) { ?>
								<a class="btn btn-sm btn-default btn-download" href="<?php echo $format['direct_url']; ?>" class="mime"> Direct</a>
							<?php } ?>
							<?php if ($format['show_proxy_url'] === true) { ?>
								<a class="btn btn-sm btn-primary btn-download" href="api/YouTube-Downloader/<?php echo $format['proxy_url']; ?>" class="mime"> Proxy</a>
							<?php } ?>
						</p>
						</li>
						<hr>
						<div class="clearfix"></div>
					</ul>
					<?php } ?>
				<?php } ?>
				
				<?php if ($this->get('showMP3Download', false) === true) { ?>
					<h2>Convert and Download to .mp3</h2>
					<ul class="dl-list">
						<li>
							<a class="btn btn-default btn-type disabled" href="#" class="mime">audio/mp3 - <?php echo $this->get('mp3_download_quality'); ?></a>
							<a class="btn btn-primary btn-download" href="api/YouTube-Downloader/<?php echo $this->get('mp3_download_url'); ?>" class="mime"><i class="glyphicon glyphicon-download-alt"></i> Convert and Download</a>
						</li>
					</ul>
				<?php } ?>
		</div>
				
  
	  
	  
		 <div class="col-md-8 wow fadeInRight" data-wow-delay="0.4s">
		  <div class="educate_grid">
			<?php 
				$total = 0;
				foreach($this->get('streams', []) as $format) {
					if($format['size'] !== '0B'){
						$total = $total + 1;
				?>
			<?php 
					}
				} ?>
				<?php if($total == 0 && isset($_GET['videoid'])){ ?>
					<div class="col-md-12">
						<iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $_GET['videoid']; ?>" allowfullscreen=""></iframe>
					</div>
				<?php }else{ ?>
					<div class="col-md-12">
						<video width="100%" height="420" controls autoplay>
							<?php 
								foreach($this->get('streams', []) as $format) {
									if($format['size'] !== '0B'){ 
								?>
									<?php if ($format['show_direct_url'] === true) { ?>
										<source src="<?php echo $format['direct_url']; ?>" type="<?php echo $format['type']; ?>">
									<?php } ?>
									<?php if ($format['show_proxy_url'] === true) { ?>
										<source src="<?php echo $format['proxy_url']; ?>" type="<?php echo $format['type']; ?>">
									<?php } ?>
								<?php 
									} 
								} 
							?>
							Your browser does not support the video tag.
						</video>
					</div>
				<?php } ?>
					<div class="col-md-12">
						<script>
						  (function() {
							var cx = '007894479317154908154:jwktchapsu0';
							var gcse = document.createElement('script');
							gcse.type = 'text/javascript';
							gcse.async = true;
							gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
							var s = document.getElementsByTagName('script')[0];
							s.parentNode.insertBefore(gcse, s);
						  })();
						</script>
						<gcse:searchresults-only></gcse:searchresults-only>
					</div>
				
			
			<div class="clearfix"></div>
		   </div>
		 </div>
	  </div>
	</div>
	
	<!--
	<div class="living_bottom">
	  <div class="container">
		<h2 class="title block-title">Latest Posts</h2>
		<div class="col-md-6 post_left wow fadeInLeft" data-wow-delay="0.4s">
			<div class="mask1"><img src="images/pic4.jpg" alt="image" class="img-responsive zoom-img" /></div>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque cursus, sem eget sagittis sagittis, nisl magna sodales eros, ut feugiat velit velit non turpis. Cras eu nibh dapibus justo fringilla   <a href="#">More</a></p>
			<div class="divider"></div>
			<p class="field-content">30 Sep 2014</span></p>
		</div>
		<div class="col-md-6 post_left wow fadeInRight" data-wow-delay="0.4s">
			<div class="mask1"><img src="images/pic5.jpg" alt="image" class="img-responsive zoom-img" /></div>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque cursus, sem eget sagittis sagittis, nisl magna sodales eros, ut feugiat velit velit non turpis. Cras eu nibh dapibus justo fringilla   <a href="#">More</a></p>
			<div class="divider"></div>
			<p class="field-content">30 Sep 2014</span></p>
		</div>
	  </div>
	</div>
	-->
	   
<?php } ?>

		  
					