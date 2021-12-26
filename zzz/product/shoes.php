<?php ?>

<form action="" class="productForm">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center text-capitalize py-3 font-weight-bold">
                <span class="text-capitalize">upload product pictures</span>
            </div>
            <div class="col-md-4 col-6">
                <input type="file" name="picOne" id="" required>
            </div>
            <div class="col-md-4 col-6">
                <input type="file" name="picTwo" id="">
            </div>
            <div class="col-md-4">
                <input type="file" name="picThree" id="">
            </div>
            <div class="col-md-5 col-6">
                <input type="text" name="productName" placeholder="Product Name" id="formInput" required>
            </div>
            <div class="col-md-2 col-6">
                <input type="text" name="productPrice" placeholder="Product Price" id="formInput">
            </div>
            <div class="col-md-2 col-3">
                <input type="text" name="productQuantity" placeholder="Product Qty" id="formInput">
            </div>
            <div class="col-md-3 col-6">
                <select name="productUser" id="formInput" required>
                    <option value="">-- Select Product User --</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="unisex">Unisex</option>
                </select>
            </div>
            <div class="col-md-4 col-3">
                <div class="productTitle">Category</div>
                <div>
                    <input type="radio" name="shoes" id="">
                    <span>shoes</span>
                </div>
            </div>
            <div class="col-md-4 col-6">
                <select name="productType" id="formInput" required>
                    <option value="">-- Shoe Type --</option>
                    <option value="sneakers">Sneakers</option>
                    <option value="loafers">Loafers</option>
                    <option value="high_heel">High Heels</option>
                    <option value="flat_heels">Flat Heels</option>
                    <option value="boots">Boots</option>
                    <option value="Slippers">Slippers</option>
                    <option value="sandals">Sandals</option>
                </select>
            </div>
            <div class="col-md-4 col-6">
                <select name="productBrand" id="formInput">
                    <option value="">-- Shoe Brand --</option>
                    <option value="armani">Armani</option>
                    <option value="reebok">Reebok</option>
                    <option value="gucci">Gucci</option>
                    <option value="adidas">Adidas</option>
                    <option value="prada">Prada</option>
                    <option value="jordan">Jordan</option>
                    <option value="converse">Converse</option>
                </select>
            </div>
            <div class="col-md-3 col-3">
                <select name="" id="formInput">
                    <option value="">-- Shoe Size --</option>
                    <option value="">33</option>
                    <option value="">34</option>
                    <option value="">35</option>
                    <option value="">36</option>
                    <option value="">37</option>
                    <option value="">38</option>
                    <option value="">39</option>
                    <option value="">40</option>
                    <option value="">41</option>
                    <option value="">42</option>
                </select>
            </div>
            <div class="col-md-3 col-3">
                <select name="" id="formInput">
                    <option value="">-- Shoe Color --</option>
                    <option value="">white</option>
                    <option value="">black</option>
                    <option value="">brown</option>
                    <option value="">blue</option>
                    <option value="">red</option>
                    <option value="">green</option>
                </select>
                </div>
            </div>
            <div class="col-md-3 col-3 checkbox-txt">
                <input type="checkbox" name="new" id="">
                <span>new product</span>
            </div>
            <div class="col-md-3 col-3 checkbox-txt">
                <input type="checkbox" name="featured" id="">
                <span>featured product</span>
            </div>
        </div>
    </div>
</form>