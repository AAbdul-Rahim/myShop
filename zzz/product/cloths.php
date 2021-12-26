<?php ?>

<form action="" class="productForm">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <span class="text-capitalize font-weight-bold mb-2">upload product pictures</span>
                        <input type="file" name="picOne" id="" required>
                    </div>
                    <div class="col-md-5 col-12">
                        <input type="text" name="productName" placeholder="Product Name" id="formInput" required>
                    </div>
                    <div class="col-md-3 col-6">
                        <input type="text" name="productPrice" placeholder="Product Price" id="formInput" required>
                    </div>
                    <div class="col-md-2 col-6">
                        <input type="text" name="productQuantity" placeholder="Product Qty" id="formInput" required>
                    </div>
                    <div class="col-md-3 col-6">
                        <select name="productUser" id="formInput" required>
                            <option value="">-- Select Product User --</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="unisex">Unisex</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-3">
                        <div class="productTitle">Category</div>
                        <div>
                            <input type="radio" name="cloths" id="">
                            <span>clothing</span>
                        </div>
                    </div>
                    <div class="col-md-4 col-6">
                        <select name="productType" id="formInput">
                            <option value="">-- Clothing Type --</option>
                            <option value="pants">Pant</option>
                            <option value="shirts">Shirt</option>
                            <option value="hoodies">Hoodie</option>
                            <option value="suits">Suit</option>
                            <option value="sleepWear">Sleep Wear</option>
                            <option value="underWear">Under Wear</option>
                            <option value="turkishWear">Turkish Wear</option>
                            <option value="arabianWear">Arabian Wear</option>
                            <option value="africanWear">African Wear</option>
                            <option value="muslimWear">Muslim Wear</option>
                            <option value="otherTypes">Other Types</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-6">
                        <select name="productBrand" id="formInput">
                            <option value="">-- Clothing Brand --</option>
                            <option value="armani">Armani</option>
                            <option value="versace">Versace</option>
                            <option value="gucci">Gucci</option>
                            <option value="hermes">Hermes</option>
                            <option value="prada">Prada</option>
                            <option value="lv">louis vuitton</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-4 mt-1">
                        <select name="" id="formInput">
                            <option class="productTitle">-- Pants Size --</option>
                            <option value="">24</option>
                            <option value="">25</option>
                            <option value="">26</option>
                            <option value="">27</option>
                            <option value="">28</option>
                            <option value="">29</option>
                            <option value="">30</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-4 mt-1">
                        <select name="" id="formInput">
                            <option value="">-- Shirt Size --</option>
                            <option value="">XXS</option>
                            <option value="">XS</option>
                            <option value="">S</option>
                            <option value="">M</option>
                            <option value="">L</option>
                            <option value="">XL</option>
                            <option value="">XXL</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-4 mt-1">
                        <select name="" id="formInput">
                            <option value="">-- Clothing Color --</option>
                            <option value="">white</option>
                            <option value="">black</option>
                            <option value="">brown</option>
                            <option value="">khaki</option>
                            <option value="">blue</option>
                            <option value="">red</option>
                            <option value="">green</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-6 checkbox-txt">
                        <input type="checkbox" name="new" id="">
                        <span>new product</span>
                    </div>
                    <div class="col-md-6 col-6 checkbox-txt">
                        <input type="checkbox" name="featured" id="">
                        <span>featured product</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
