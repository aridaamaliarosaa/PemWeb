<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <img src="https://drummingreview.com/wp-content/uploads/2018/10/Best-Thumb-Piano.jpg" alt="Carousel Image 1" width="200">
            <div class="carousel-caption">
                <h3> Calm and Relaxing Sounds</h3>
                <p> Enjoy high-quality and well made instruments </p>
            </div>
        </div>

        <div class="item">
            <img src="http://1tonedrums.com/wp-content/uploads/GZ3A5798.jpg" alt="Carousel Image 2" height="200">
            <div class="carousel-caption">
                <h3> Free Shipping around South East Asia </h3>
                <p> Get these high quality original Kalimbas and Mbiras now! </p>
            </div>
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container text-center">
    <h3> Highlighted Products </h3>
    <br> <br>
    <div class="row">
        <?php 
            foreach($top_products as $product){
				echo $this->load->view('templates/product_card', ['product' => $product, 'categories' => $categories], TRUE);
            }
        ?>
    </div>
</div>