<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>

<body id="home">
  <!-- Navbar -->
  <nav class="navbar sticky-top navbar-expand-lg navbar-light">
    <div class="container">
      <a href="#home" class="navbar-brand">
        <img src="<?php echo get_template_directory_uri() . '/app/images/fahad-logo.png'; ?>" height="75"
          alt="Fahad Al Falasi Logo">
      </a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#main-menu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="main-menu">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="#home" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="#stores" class="nav-link">Stores</a></li>
          <li class="nav-item"><a href="#quotes" class="nav-link">Quotes</a></li>
          <li class="nav-item"><a href="#testimonials" class="nav-link">Testimonials</a></li>
          <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
          <li class="nav-item"><a href="#author" class="nav-link">Meet The Author</a></li>
        </ul>
      </div>
    </div>
  </nav><!-- navbar-end -->

  <!-- Showcase -->
  <section class="showcase">
    <div class="primary-overlay">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <h1 class="display-3 mt-0 mt-md-5 pt-5 font-weight-bolder">The Hunt for Corona</h1>
            <p class="lead">To all victims of COVID-19, a virus that, alas, has achieved something many states have not:
              it has spread equality without regard to gender, color, or status.
            </p>
            <!-- <a href="#" class="btn btn-outline-secondary btn-lg mt-3 text-white text-uppercase">
              <i class="fas fa-arrow-right"></i>
              Read More
            </a> -->
          </div>
          <div class="col-lg-7">
            <div class="showcase__image">
              <img src="<?php echo get_template_directory_uri() . '/app/images/book-cover-2.png'; ?>" class="img-fluid"
                alt="Book Image">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!-- showcase-end -->



  <!-- Stores -->
  <section id="stores" class="stores py-5 bg-light">
    <div class="container">
      <h2 class="section-title">Find Our Book On</h2>
      <div class="owl-carousel mt-5">
        <?php
          $args = [
            'post_type'       => 'store',
            'posts_per_page'  => -1
          ];

          $stores = new WP_Query( $args );

          while ( $stores->have_posts() ) {
            $stores->the_post(); ?>

        <div class="stores__item">
          <a href="<?php echo get_field( 'book_link_in_the_store' )['url']; ?>" target="_blank">
            <div class="stores__item-logo">
              <img src="<?php echo get_field( 'store_image' ); ?>">
            </div>
          </a>
        </div>
        <?php }
          wp_reset_postdata();
        ?>
      </div>
    </div>
  </section><!-- stores-end -->

  <!-- Screenshots -->
  <section id="quotes" class="screenshots py-5">
    <div class="container">
      <h2 class="section-title">Screenshots & Quotes</h2>
      <div class="row mt-5">
        <?php
          $args = [
            'post_type'       => 'screenshot',
            'posts_per_page'  => 6,
            'orderby'         => 'rand'
          ];

          $screenshots = new WP_Query( $args );

          while ( $screenshots->have_posts() ) {
            $screenshots->the_post(); ?>

        <div class="col-md-6 col-lg-4">
          <div class="screenshots__item mx-auto" data-toggle="modal" data-target="#screenshot-modal-<?php the_ID(); ?>">
            <div class="screenshots__item-caption d-flex align-items-center justify-content-center h-100 w-100">
              <div class="screenshots__item-caption-content text-center text-green">
                <i class="fas fa-plus fa-3x"></i>
              </div>
            </div>
            <img class="img-fluid" src="<?php echo get_field( 'screenshot_image' ); ?>">
          </div>
        </div>

        <!-- Screenshot Modal -->
        <div class="screenshot__modal modal fade" id="screenshot-modal-<?php the_ID(); ?>" tabindex="-1" role="dialog"
          aria-labelledby="portfolioModal1Label" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-body text-center">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-lg-8">
                      <h2 class="screenshot__modal-title mt-5 text-uppercase"><?php the_title(); ?></h2>
                      <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon">
                          <i class="fas fa-star text-green"></i>
                        </div>
                        <div class="divider-custom-line"></div>
                      </div>
                      <img class="img-fluid rounded mb-5" src="<?php echo get_field( 'screenshot_image' ); ?>">
                      <?php the_content(); ?>
                      <button class="btn btn-primary" href="#" data-dismiss="modal">
                        <i class="fas fa-times fa-fw"></i>
                        Close Window
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php }
          wp_reset_postdata();
        ?>
      </div>
    </div>
  </section><!-- screenshots-end -->

  <!-- Testimonials -->
  <section id="testimonials" class="testimonials py-5 bg-light text-center">
    <div class="container">
      <h2 class="section-title">What Readers Say?</h2>
      <div class="owl-carousel">
        <?php
          $args = [
            'post_type'       => 'testimonial',
            'posts_per_page'  => 7,
            'orderby'         => 'rand'
          ];

          $testimonials = new WP_Query( $args );

          while ( $testimonials->have_posts() ) {
            $testimonials->the_post(); ?>

        <div class="testimonials__item px-3 py-5">
          <div class="testimonials__item-img mx-auto mb-3">
            <i class="fas fa-quote-left text-green"></i>
          </div>
          <div class="testimonials__item-quote">
            <?php the_content(); ?>
          </div>
          <div class="testimonials__item-name mt-4">
            <h5 class="text-green font-weight-bolder mb-1"><?php the_title(); ?></h5>
          </div>
        </div>
        <?php }
          wp_reset_postdata();
        ?>
      </div>
    </div>
  </section><!-- testimonials-end-->

  <!-- Newsletter -->
  <section class="newsletter py-5">
    <div class="container">
      <h2 class="section-title text-white">Get Our Updates!</h2>
      <form method="POST" action="<?php //the_permalink(); ?>">
        <?php echo do_shortcode( '[contact-form-7 id="489" title="Email Subscriptions"]' ); ?>
      </form>
    </div>
  </section><!-- newsletter-end -->

  <!-- About -->
  <section id="about" class="about py-5 bg-light">
    <div class="container">
      <h2 class="section-title">About This Book</h2>
      <div class="row mt-4">
        <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
          <h3 class="section-subtitle">Why This Book?</h3>
          <div id="accordion">
            <div class="card">
              <div class="card-header">
                <h5 class="mb-0">
                  <div href="#collapse1" data-toggle="collapse" data-parent="#accordion">
                    <i class="fas fa-arrow-circle-down"></i> The Blurb of the Book
                  </div>
                </h5>
              </div>
              <div id="collapse1" class="collapse show">
                <div class="card-body">
                  <p>Daphne, a girl with a chaplet of flowers woven around her braided hair and an overflowing passion
                    for life that is reciprocated back to her, is oblivious to the existence of a heartbroken wooer who
                    is fervently spitting heat like an active volcano. This gives rise to her tragedy; for not all love
                    is mutual.
                  <p>She vanishes into the human masses, endeavoring to conceal herself from Apollo, but her getaway
                    makes his heart grow even fonder. Not only has he endured the bitterness of being repelled, but this
                    insolence has become a challenge that must be won. He is determined to try, even if it leads to her
                    eradication . . . for some infatuation kills.</p>
                  <p>To reveal her location, he fires a volley of arrows at her, tipped with an infinitesimal yet
                    detrimental curse. However, these arrows for a dubious cause will expose humans instead—what lies on
                    and beneath the surface, their virtues and vices, their angst and yearnings.</p>
                  <p>Among thousands of stories that reflect human anguish in the era of Corona, this collection of
                    stories lifts the curtain on twelve of them.
                    The hunt continues: Corona’s hunt for humans’ demise, humans’ hunt for a Corona remedy, and Apollo’s
                    hunt for Daphne’s acceptance. The hunt unwaveringly continues. . .</p>
                  </p>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h5 class="mb-0">
                  <div href="#collapse2" data-toggle="collapse" data-parent="#accordion">
                    <i class="fas fa-arrow-circle-down"></i> The Stories of the Collection
                  </div>
                </h5>
              </div>
              <div id="collapse2" class="collapse">
                <div class="card-body">
                  <li>Prologue</li>
                  <li>Old Buddies Club</li>
                  <li>A Battle on Two Fronts</li>
                  <li>Wingless Plane</li>
                  <li>Nightfall Visitor</li>
                  <li>Buy & Squander Store</li>
                  <li>Sacred Mission</li>
                  <li>The Flutist</li>
                  <li>The Language of Eyes</li>
                  <li>A Journey for Indulgence</li>
                  <li>Familial Decision</li>
                  <li>By the Roadside</li>
                  <li>Reunion Soiree</li>
                  <li>Epilogue</li>
                </div>
              </div>
            </div>
          </div>
        </div><!-- dol-1-end -->
        <div class="col-md-6">
          <h3 class="section-subtitle text-center text-md-left">Read My Tweets on <i class="fab fa-twitter mt-4"></i>
          </h3>
          <div class="twitter-feed">
            <a class="twitter-timeline" href="https://twitter.com/aufahadalfalasi?ref_src=twsrc%5Etfw">
            </a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </div>
        </div>
      </div>
    </div>
  </section><!-- about-end -->


  <!-- Meet the Author -->
  <section id="author" class="author py-5 bg-light">
    <div class="container">
      <h2 class="section-title">Meet The Author</h2>
      <div class="row mt-5">
        <div class="col-lg-6 text-center text-md-left">
          <p class="lead">Fahad Alfalasi grew up in Dubai, UAE, where its serene undulating creek converges the charm of
            the East with the progressive West.</p>
          <p class="lead">Fahad’s childhood passion for reading drove him to aim for the other end of the rainbow – the
            sibylline
            world of writing.</p>
          <p class="lead">As a legal advisor, the unlimited skies of fiction provide solace from the rigor of the
            practice of law.</p>
          <p class="lead">After a few publications, owing to the busyness of life, his work underwent a long pause, but
            the COVID-19
            crisis that jolted the planet reignited his old flame, inspiring him to explore mankind’s eeriness and
            expectations.</p>
          <p class="lead">The Hunt of Corona is Fahad’s first flash fiction collection.</p>
        </div>
        <div class="col-lg-6">
          <div class="author__image mx-auto">
            <img class="img-fluid" src="<?php echo get_template_directory_uri() . '/app/images/author-image.png'; ?>"
              alt="Fahad Al Falasi image">
          </div>
        </div>
      </div>
    </div>
  </section><!-- meet-the-author-end -->

  <!-- Contact Me -->
  <section class="contact py-5">
    <div class="container">
      <form method="POST" action="<?php the_permalink(); ?>">
        <div class="row">
          <div class="col-md-6">
            <h2 class="display-4 mb-4 d-none d-md-block">Contact Me</h2>
            <h2 class="section-title d-block d-md-none">Contact Me</h2>
            <div class="input-group input-group-lg mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
              </div>
              <input type="text" name="contact-user-name" class="form-control" placeholder="Name">
            </div>

            <div class="input-group input-group-lg mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
              <input type="text" name="contact-user-email" class="form-control" placeholder="Email">
            </div>
          </div>
          <div class="col-md-6">
            <div class="input-group input-group-lg mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-pencil-alt"></i>
                </span>
              </div>
              <textarea class="form-control" name="contact-user-message" placeholder="Message" rows="5"></textarea>
            </div>

            <input type="submit" value="Send Me A Message" class="btn btn-primary btn-lg">
          </div>
        </div>
      </form>
    </div>
  </section><!-- contact-me-end -->

  <footer class="bg-light text-center text-green py-3">
    <p class="font-weight-bold lead">Copyright &copy; 2022</p>
  </footer>

  <?php wp_footer(); ?>
</body>

</html>