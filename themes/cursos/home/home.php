<div class="row">
      <div class="span12">
          <!-- BREADCRUMBS -->
          <div id="breadcrumb" class="homecrumb">
              <ul>
                  <li>Incredibly Responsive & Elegant Design<br />
                      Clean Sets the Standard for Modern and Responsive Bootstrap Themes.</li>
              </ul>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="span12">
          <!-- HOMEPAGE SLIDER STRART -->
          <div class="flexslider">
              <ul class="slides">
                  <li>
                      <img src="<?php echo theme_url() ?>img/NEW-Slide-1.png" alt="HTML5 and CSS3 theme built on the Twitter Bootstrap Framework." />
                      <div class="caption slide-1">
                          <h2>Meet your next web<br /> project’s superhero!</h2>
                          <p>Introducing Clean, an all-new, super-clean, ultra-responsive<br /> HTML5 and CSS3 theme built on the amazing Twitter Bootstrap Framework.</p>
                          <a class="btn-theme slide-btn" href="#">Buy it Now!</a>
                      </div>
                  </li>
                  <li>
                      <img src="<?php echo theme_url() ?>img/NEW-Slide-2.png" alt="Clean is ultra-responsive and looks great on all devices." />
                      <div class="caption slide-2">
                          <h2>Holy smokes this baby’s<br /> ultra responsive!</h2>
                          <p>Thanks to HTML5, CSS3 and Twitter Bootstrap the Clean theme allows you<br /> to create a single site that looks great on practically any device.</p>
                          <a class="btn-theme slide-btn" href="#">Test Drive Clean!</a>
                      </div>
                  </li>
                  <li>
                      <img src="<?php echo theme_url() ?>img/NEW-Slide-3.png" alt="Clean's modern interface design makes your content pop!" />
                      <div class="caption slide-3">
                          <h2>A clean and modern design<br /> that makes your content pop!</h2>
                          <p>A theme that utilizes a beautiful, clean and modern interface<br /> that makes your content the focus of your website visitor’s attention.</p>
                          <a class="btn-theme slide-btn" href="#">Demo it Now!</a>
                      </div>
                  </li>
                  <li>
                      <img src="<?php echo theme_url() ?>img/NEW-Slide-4.png" alt="Includes exclusive bonus pages that are very useful." />
                      <div class="caption slide-4">
                          <h2>Includes 4 exclusive bonus pages<br /> that add immediate and practical value!</h2>
                          <p>A theme that utilizes a beautiful, clean and modern interface<br /> that makes your content the focus of your website visitor's attention.</p>
                          <a class="btn-theme slide-btn" href="#">Demo it Now!</a>
                      </div>
                  </li>  
              </ul>
          </div>
          <!-- HOMEPAGE SLIDER END -->
      </div>
  </div>
  <!-- MAIN CONTENT AREA: CLEAN CUSTOM - PORTFOLIO GRID BLOCK (ORIGINALLY DESIGNED FOR HOME PAGE) -->
  <div class="portfolio-grid-1">
      <div class="title-wrapper">
          <h2>Proximos Cursos</h2><a class="all" href="#">View more projects</a>
      </div>
      <div class="clear-both"></div>
      <div id="home_responsive" class="row show-grid">
          <?php foreach($cursos as $curso): ?>
          <div class="span4 hp-wrapper">
              <div class="fancy-wrapper">
                  <a class="fancy" href="<?php echo theme_url() ?>img/portfolio-1-large.png">                                
                  </a>
                  <img alt="" src="<?php echo theme_url() ?>img/portfolio-1-small.png" />
              </div>
              <div class="bottom-block">
                  <a href="#"><?php echo $curso->name ?></a>
                  <p>web design</p>
              </div>
          </div>
          <?php endforeach; ?>

      </div>
  </div>
  <!-- MAIN CONTENT AREA: REDESIGN CUSTOM - RECENT POSTS BLOACK (ORIGINALLY DESIGNED FOR HOME PAGE) -->
  <div class="main-block block-posts">
      <div class="title-wrapper">
          <h2>LATEST NEWS FROM OUR BLOG</h2><a href="#" class="all">Read more news</a>
      </div>
      <div class="row show-grid clear-both">
          <div class="span12">
              <div class="row show-grid">
                  <div class="span4 block-post">
                      <a class="block-post-img" href="#">
                          <img alt="" src="img/Blog-Home-1.png" />
                      </a>
                      <a class="block-post-title" href="#">A Fresh, Clean Twitter Bootstrap Theme</a>
                      <p class="block-post-date">January 15, 2013</p>
                      <p class="block-post-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam adipiscing, metus eu imperdiet ornare, urna lorem porttitor tortor, at condimentum massa erat sed sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam adipiscing.</p>
                      <a class="block-post-more" href="#">Read more&nbsp;&raquo;</a>
                  </div>
                  <div class="span4 block-post">
                      <a class="block-post-img" href="#">
                          <img alt="" src="img/Blog-Home-2.png" />
                      </a>
                      <a class="block-post-title" href="#">Bootstrap 3 Readiness Guide</a>
                      <p class="block-post-date">January 15, 2013</p>
                      <p class="block-post-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam adipiscing, metus eu imperdiet ornare, urna lorem porttitor tortor, at condimentum massa erat sed sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam adipiscing.</p>
                      <a class="block-post-more" href="#">Read more&nbsp;&raquo;</a>
                  </div>
                  <div class="span4 block-post">
                      <a class="block-post-img" href="#">
                          <img alt="" src="img/Blog-Home-3.png" />
                      </a>
                      <a class="block-post-title" href="#">Learning Grid-Based Design</a>
                      <p class="block-post-date">January 15, 2013</p>
                      <p class="block-post-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam adipiscing, metus eu imperdiet ornare, urna lorem porttitor tortor, at condimentum massa erat sed sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam adipiscing.</p>
                      <a class="block-post-more" href="#">Read more&nbsp;&raquo;</a>
                  </div>
              </div>
          </div>
      </div>
  </div>