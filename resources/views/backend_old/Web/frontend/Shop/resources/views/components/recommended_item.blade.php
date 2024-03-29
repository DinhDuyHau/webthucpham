<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
                    @foreach($productrecomend as $keyrecomend => $productrecomendItem)
                        @if($keyrecomend %3 ==0)
                            <div class="item {{ $keyrecomend == 0 ? 'active' : '' }}">
                        @endif
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ config('app.base_url') . $productrecomendItem->feature_image_path }}" alt="" />
                                    <h2>{{ number_format($productrecomendItem->price ) }} VND</h2>
                                    <p>
                                        {{ $productrecomendItem->name }}
                                    </p>
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>

                            </div>
                        </div>
                    </div>
                        @if($keyrecomend % 3 ==2)
                            </div>
                        @endif
                  @endforeach
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
