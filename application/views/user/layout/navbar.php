<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Minishop</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="<?php echo base_url();?>" class="nav-link">Home</a></li>
	          	<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Clothing</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="<?php echo base_url();?>produk/men">Men</a>
              	<a class="dropdown-item" href="<?php echo base_url();?>produk/women">Women</a>
              </div>
            	</li>
	          <li class="nav-item"><a href="<?php echo base_url();?>produk/custom" class="nav-link">Custom</a></li>
	          <li class="nav-item"><a href="<?php echo base_url();?>contact" class="nav-link">Contact Us</a></li>
	          <li class="nav-item cta cta-colored"><a href="<?php echo base_url();?>cart" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>