

  


        
        
       
                <div class="row show-grid">
                    <div class="span12">
                        <!-- BREADCRUMBS -->
                        <div id="breadcrumb">
                            <ul>
                                <li>News and Blog</li>
                            </ul>
                        </div>
                    </div>
                    <!-- NEWS AND BLOG MAIN CONTENT START -->
                    <div class="span12">
                        <div class="row show-grid clear-both">
                            <div class="span8">
                                
                                <?php foreach($posts as $post): ?>
                                <div class="post-item">
                                    <img alt="" src="<?php echo $post->getImageSrc()  ?> " />
                                    <h2><?php echo $post->name ?></h2>
                                    <p class="date">January 15, 2013</p>
                                    <p class="post-description">
                                        <?php echo $post->getExcerpt(); ?>
                                    </p>
                                    <a class="post-more" href="<?php echo $post->getPermalink("article/"); ?>">Read more...</a>
                                </div>
                                <?php endforeach;?>
                            </div>
                            <div id="right-sidebar" class="span4 blog-sidebar">
                                <div class="">
                                    <h2>Recent Posts Widget</h2>
                                    <ul>
                            			<li><i class="icon-ok"></i> List item 1</li>
                            			<li><i class="icon-ok"></i> List item 2</li>
                            			<li><i class="icon-ok"></i> List item 3</li>
                            			<li><i class="icon-ok"></i> List item 4</li>
                            			<li><i class="icon-ok"></i> List item 5</li>
                           				<li><i class="icon-ok"></i> List item 6</li>
                                    </ul>
                                </div>
                                <div class="text-widget">
                                    <h2>Text Widget</h2>
                                    <p>SLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar vulputate justo quis adipiscing. Nunc egestas imperdiet faucibus. In viverra volutpat condimentum. Donec laoreet vulputate eros eget aliquam. Duis scelerisque gravida arcu. Nullam ligula risus, sollicitudin non facilisis sed, facilisis eget dolor. Vivamus aliquet felis eget ipsum euismod eget gravida eros ullamcorper. Nam purus lorem, pretium vitae porta eget, porta quis mauris. In sed lacus et odio rutrum lacinia sed a magna. Fusce tincidunt lectus in eros feugiat porta. Donec accumsan porta consequat. Nulla non elementum felis. Proin luctus laoreet orci, non faucibus nisl interdum accumsan. Nulla volutpat ligula ligula.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- NEWS AND BLOG MAIN CONTENT END -->
                </div>
         
      
  
