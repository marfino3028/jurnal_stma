<section id="featured">
    <!-- start slider -->
    <!-- Slider -->

    <div class="center" id="container-search"
        style="position : relative; z-index : 100;top: 250px; left : 25%; right: 50%">
        <form action="{{ route('search') }}" method="get" class="form form-inline">
            <div class="row">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="q"
                            value="{{ request('q') }}">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div id="main-slider" class="flexslider">
        <ul class="slides">
            <li>
                <img src="{{ asset('frontEnd/img/slides/1.jpg') }}" alt="Banner #1" />
                <div class="flex-caption">
                    <h3>Banner #1</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page.
                    </p>
                    <a href="#" class="btn btn-theme">More Details</a>
                </div>
            </li>
            <li>
                <img src="{{ asset('frontEnd/img/slides/2.jpg') }}" alt="Banner #2" />
                <div class="flex-caption">
                    <h3>Banner #2</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page.
                    </p>
                    <a href="#" class="btn btn-theme">More Details</a>
                </div>
            </li>
            <li>
                <img src="{{ asset('frontEnd/img/slides/3.jpg') }}" alt="Banner #3" />
                <div class="flex-caption">
                    <h3>Banner #3</h3>
                    <p>It is a long established fact that a reader will be distracted by the readable content of a page.
                    </p>
                    <a href="#" class="btn btn-theme">More Details</a>
                </div>
            </li>
        </ul>



    </div>
    <!-- end slider -->
</section>
<!-- end Home Slider -->
