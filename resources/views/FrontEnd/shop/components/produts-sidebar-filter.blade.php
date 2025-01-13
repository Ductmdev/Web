<div class="filter-widget">
    <h4 class="fw-title">Categories</h4>
    <ul class="filter-catagories">
        @foreach($categories as $category)
        @if (!empty($category->name))
        <li><a href="/shop/filter/category/{{ $category->name }}">{{ $category->name }}</a></li>
        @endif
        @endforeach
    </ul>
</div>

<div class="filter-widget">
    <h4 class="fw-title">Brand</h4>
    <div class="fw-brand-check">

        <form method="POST" action="/shop/filter/brand">
            @foreach($brands as $brand)
            <div class="bc-item">
                <label for="bc-{{$brand->name}}">
                    {{$brand->name}}
                    <input type="checkbox" name="brands[]" value="{{$brand->id}}" id="bc-{{$brand->name}}" class="brand-checkbox" onchange="this.form.submit()" @if(in_array($brand->id, $selectedBrands ?? [])) checked @endif>
                    <span class="checkmark"></span>
                </label>
            </div>
            @endforeach
            @csrf
        </form>
    </div>
</div>

<div class="filter-widget">
    <h4 class="fw-title">Price</h4>
    <form method="GET" action="/shop/filter/filterPrice">
        <div class="filter-range-wrap">
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount" name="price_min">
                    <input type="text" id="maxamount" name="price_max">
                </div>
            </div>
            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="999" data-min-value="{{ str_replace('$', '', request('price_min')) }}" data-max-value="{{ str_replace('$', '', request('price_max')) }}">
                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
            </div>
        </div>
        <button type="submit" class="filter-btn">Filter</button>
    </form>
</div>
<div class="filter-widget">
    <h4 class="fw-title">Color</h4>
    <form method="GET" action="/shop/filter/filterColor">
        <div class="fw-color-choose">
            <div class="cs-item">
                <input type="radio" id="cs-black" name="color" value="black" onchange="this.form.submit();" {{ request('color') == 'black' ? 'checked' : '' }}>
                <label for="cs-black" class="cs-black {{ request('color') == 'black' ? 'font-weight-bold' : '' }}">Black</label>
            </div>

            <div class="cs-item">
                <input type="radio" id="cs-violet" name="color" value="violet" onchange="this.form.submit();" {{ request('color') == 'violet' ? 'checked' : '' }}>
                <label for="cs-violet" class="cs-violet {{ request('color') == 'violet' ? 'font-weight-bold' : '' }}">Violet</label>
            </div>

            <div class="cs-item">
                <input type="radio" id="cs-blue" name="color" value="blue" onchange="this.form.submit();" {{ request('color') == 'blue' ? 'checked' : '' }}>
                <label for="cs-blue" class="cs-blue {{ request('color') == 'blue' ? 'font-weight-bold' : '' }}">Blue</label>
            </div>

            <div class="cs-item">
                <input type="radio" id="cs-yellow" name="color" value="yellow" onchange="this.form.submit();" {{ request('color') == 'yellow' ? 'checked' : '' }}>
                <label for="cs-yellow" class="cs-yellow {{ request('color') == 'yellow' ? 'font-weight-bold' : '' }}">Yellow</label>
            </div>

            <div class="cs-item">
                <input type="radio" id="cs-red" name="color" value="red" onchange="this.form.submit();" {{ request('color') == 'red' ? 'checked' : '' }}>
                <label for="cs-red" class="cs-red {{ request('color') == 'red' ? 'font-weight-bold' : '' }}">Red</label>
            </div>

            <div class="cs-item">
                <input type="radio" id="cs-green" name="color" value="green" onchange="this.form.submit();" {{ request('color') == 'green' ? 'checked' : '' }}>
                <label for="cs-green" class="cs-green {{ request('color') == 'green' ? 'font-weight-bold' : '' }}">Green</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-orange" name="color" value="orange" onchange="this.form.submit();" {{ request('color') == 'orange' ? 'checked' : '' }}>
                <label for="cs-orange" class="cs-orange {{ request('color') == 'orange' ? 'font-weight-bold' : '' }}">Orange</label>
            </div>
            <div class="cs-item">
                <input type="radio" id="cs-pink" name="color" value="pink" onchange="this.form.submit();" {{ request('color') == 'pink' ? 'checked' : '' }}>
                <label for="cs-pink" class="cs-pink {{ request('color') == 'pink' ? 'font-weight-bold' : '' }}">Pink</label>
            </div>
        </div>
    </form>
</div>
<div class="filter-widget">
    <h4 class="fw-title">RAM</h4>
    <form method="GET" action="/shop/filter/filterRam">
        <div class="fw-size-choose">
            <div class="sc-item">
                <input type="radio" id="s-size" name="ram" value="4" onchange="this.form.submit();" {{ request('ram') == '4' ? 'active' : '' }}>
                <label for="s-size">4GB</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="m-size" name="ram" value="8" onchange="this.form.submit();" {{ request('ram') == '8' ? 'active' : '' }}>
                <label for="m-size">8GB</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="l-size" name="ram" value="16" onchange="this.form.submit();" {{ request('ram') == '16' ? 'active' : '' }}>
                <label for="l-size">16GB</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="xs-size" name="ram" value="32" onchange="this.form.submit();" {{ request('ram') == '32' ? 'active' : '' }}>
                <label for="xs-size">32GB</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="xl-size" name="ram" value="64" onchange="this.form.submit();" {{ request('ram') == '64' ? 'active' : '' }}>
                <label for="xl-size">64GB</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="lg-size" name="ram" value="128" onchange="this.form.submit();" {{ request('ram') == '128' ? 'active' : '' }}>
                <label for="lg-size">128GB</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="xxl-size" name="ram" value="512" onchange="this.form.submit();" {{ request('ram') == '512' ? 'active' : '' }}>
                <label for="xxl-size">512GB</label>
            </div>
            <div class="sc-item">
                <input type="radio" id="t-size" name="ram" value="1" onchange="this.form.submit();" {{ request('ram') == '1' ? 'active' : '' }}>
                <label for="t-size">1T</label>
            </div>
        </div>
    </form>
</div>

<!-- <div class="filter-widget">
    <h4 class="fw-title">Tags</h4>
    <div class="fw-tags">
        <a href="#">Điện thoại</a>
        <a href="#">Tai Nghe</a>
        <a href="#">Máy tính bảng</a>
        <a href="#">Laptop</a>
        <a href="#">Sạc dự phòng</a>
        <a href="#">Phụ kiện</a>
        <a href="#">Ưu đãi</a>
    </div>
</div> -->