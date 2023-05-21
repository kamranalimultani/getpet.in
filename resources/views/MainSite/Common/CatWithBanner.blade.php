<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>Categories</span>
                    </div>
                    <ul>
                        <li><a href="#">All</a></li>
                        @foreach ($cats as $item)
                            <li><a href="{{ url('products?cat=' . $item->id) }}">{{ $item->main_cat_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+91-7252859898</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                <div class="hero__item set-bg"
                    data-setbg="https://media.istockphoto.com/id/1417609989/photo/dog-and-cat-together-under-gray-blanket.jpg?b=1&s=170667a&w=0&k=20&c=Qx6ZZfMJn3DUhpnNRlv-fZGtb2ylaSbLhdU5DT_UU4U=">
                    <div class="hero__text">
                        <span>Take your pet home now!</span>
                        <h2>Breeds<br />100% Original</h2>
                        <p>Delivery also available!</p>
                        <a href="#" class="primary-btn">EXPLORE NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
