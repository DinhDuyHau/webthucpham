<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            @foreach($categorii as $catItem)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$catItem->id}}">
                                @if($catItem->categorysmall->count())
                                    <span class="badge pull-right">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                @endif
                                {{ $catItem->name }}
                            </a>
                        </h4>
                    </div>

                    <div id="sportswear_{{$catItem->id}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach($catItem->categorysmall as $catsmallItem)
                                    <li><a href="#"> {{$catsmallItem->name}} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!--/category-products-->
    </div>
</div>
