<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categorii as $keycategory =>$categoryItem)
            <li class="{{ $keycategory==0 ? 'active'  : '' }}">
                <a href="#category_id_{{$categoryItem->id}}" data-toggle="tab">{{ $categoryItem->name }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach($categorii as $keyproduct =>$productItem)

        <div class="tab-pane fade {{ $keyproduct == 0 ? 'active in' : '' }}" id="category_id_{{$productItem->id}}" >

            @foreach($productItem->productitem as $productcategory)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ config('app.base_url') . $productcategory->feature_image_path  }}" alt="" />
                            <h2>{{ number_format($productcategory->price)}} VND</h2>
                            <p>{{ $productcategory->name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

        </div>

        @endforeach
    </div>
</div><!--/category-tab-->
