<?php
$title = " ADD PRODUCT";
include_once "../config.php";
include_once "_header.php";

global $connect;
$errors = [];

if (!isset($_SESSION['submit'])){

    echo "<h2 class='loginErr'>you have not logged in. <a href='index.php'>click here to login</a></h2>";
}
else{

    $query = mysqli_query($connect, "SELECT * FROM admin WHERE adminName = '$_SESSION[adminName]' ");

    $row = mysqli_fetch_assoc($query);

?>
    <div class="dashboard-wrapper">
        <!-- side bar -->
        <?php include_once "sidebar.php"; ?>

        <!-- content -->
        <div class="content-wrapper">

            <!-- header -->
            <?php include_once "content-header.php"; ?>

            <!-- main content -->
            <div class="main-content-wrapper">
                <h2 class="main-title">add products</h2>

                <div class="content-box">
                    <form action="submit.php?a_id=<?= $row['adminID']?>" enctype="multipart/form-data" class="addProductForm" method="post">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="text-capitalize font-weight-bold mb-2 text-center">upload product pictures(up to 5)</div>
                                    <input type="file" name="productImg[]" id="" multiple required>
                                </div>
                                <div class="col-md-6 col-12">
                                    <input type="text" name="productName" placeholder="Product Name" id="formInput" required>
                                </div>
                                <div class="col-md-4 col-6">
                                    <input type="number" min="0" name="productPrice" placeholder="Product Price" id="formInput" required>
                                </div>
                                <div class="col-md-4 col-6">
                                    <input type="number" min="0" name="productQty" placeholder="Product Quantity" id="formInput">
                                </div>
                                <div class="col-md-4 col-6">
                                    <select name="productCat" class="select1" id="formInput">
                                        <option value="">-- Product Category --</option>
                                        <option value="cloths">Clothing</option>
                                        <option value="shoes"> Shoes</option>
                                        <option value="bags">Bags</option>
                                        <option value="fashion-access">Fashion Accessories</option>
                                        <option value="phone-tablet">Phones & Tablets</option>
                                        <option value="phone-tablet-access">Phone & Tablets Accessories</option>
                                        <option value="computer">Computers</option>
                                        <option value="computer-access">Computer Accessories</option>
                                        <option value="electronics">Electronics</option>
                                        <option value="others">Other Category</option>
                                    </select>

                                </div>

                                <!-- cloths container -->
                                <div class="col-12 show-product-wrapper cloths">
                                    <div class="row">
                                        <div class="col-md-4 col-6">
                                            <select name="productUser1" id="formInput">
                                                <option value="">-- Select Product User --</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="unisex">Unisex</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <select name="productType1" class="" id="formInput">
                                                <option value="">-- Cloths Type --</option>
                                                <option value="pants">Pant</option>
                                                <option value="shirts">Shirt</option>
                                                <option value="skirt">Skirt</option>
                                                <option value="hoodies">Hoodie</option>
                                                <option value="suits">Suit</option>
                                                <option value="sleepWear">Sleep Wear</option>
                                                <option value="underWear">Under Wear</option>
                                                <option value="turkishWear">Turkish Wear</option>
                                                <option value="africanWear">African Wear</option>
                                                <option value="muslimWear">Muslim Wear</option>
                                                <option value="arabianWear">Arabian Wear</option>
                                                <option value="otherTypes">Other Types</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <select name="productBrand1" id="formInput">
                                                <option value="">-- Clothing Brand --</option>
                                                <option value="armani">Armani</option>
                                                <option value="versace">Versace</option>
                                                <option value="gucci">Gucci</option>
                                                <option value="hermes">Hermes</option>
                                                <option value="prada">Prada</option>
                                                <option value="lv">Louis Vuitton</option>
                                            </select>
                                        </div>
                                        <!-- pant size -->
                                        <div class="col-12 text-center text-uppercase font-weight-bold py-2">pant size(up to 4)</div>
                                        <div class="col-md-3 col-6">
                                            <select name="pant1" id="formInput">
                                                <option value="">-- Pant Size --</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <select name="pant2" id="formInput">
                                                <option value="">-- Pant Size --</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <select name="pant3" id="formInput">
                                                <option value="">-- Pant Size --</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <input type="number" min="0" name="pant4" id="formInput" placeholder="Enter Pant Size">
                                        </div>
                                        <!-- pant size -->
                                        <!-- shirt size -->
                                        <div class="col-12 text-center text-uppercase font-weight-bold py-2">shirt size(up to 4)</div>
                                        <div class="col-md-3 col-6">
                                            <select name="shirt1" id="formInput">
                                                <option value="">-- Shirt Size --</option>
                                                <option value="xxs">XXS</option>
                                                <option value="xs">XS</option>
                                                <option value="s">S</option>
                                                <option value="m">M</option>
                                                <option value="l">L</option>
                                                <option value="xl">XL</option>
                                                <option value="xxl">XXL</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <select name="shirt2" id="formInput">
                                                <option value="">-- Shirt Size --</option>
                                                <option value="xxs">XXS</option>
                                                <option value="xs">XS</option>
                                                <option value="s">S</option>
                                                <option value="m">M</option>
                                                <option value="l">L</option>
                                                <option value="xl">XL</option>
                                                <option value="xxl">XXL</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <select name="shirt3" id="formInput">
                                                <option value="">-- Shirt Size --</option>
                                                <option value="xxs">XXS</option>
                                                <option value="xs">XS</option>
                                                <option value="s">S</option>
                                                <option value="m">M</option>
                                                <option value="l">L</option>
                                                <option value="xl">XL</option>
                                                <option value="xxl">XXL</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <select name="shirt4" id="formInput">
                                                <option value="">-- Shirt Size --</option>
                                                <option value="xxs">XXS</option>
                                                <option value="xs">XS</option>
                                                <option value="s">S</option>
                                                <option value="m">M</option>
                                                <option value="l">L</option>
                                                <option value="xl">XL</option>
                                                <option value="xxl">XXL</option>
                                            </select>
                                        </div>
                                        <!-- shirt size -->
                                    </div>
                                </div>
                                <!-- shoes container -->
                                <div class="col-12 show-product-wrapper shoes">
                                    <div class="row">
                                        <div class="col-md-4 col-6">
                                            <select name="productUser2" id="formInput">
                                                <option value="">-- Select Product User --</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="unisex">Unisex</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <select name="productType2" id="formInput">
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
                                            <select name="productBrand2" id="formInput">
                                                <option value="">-- Shoe Brand --</option>
                                                <option value="armani">Armani</option>
                                                <option value="reebok">Reebok</option>
                                                <option value="gucci">Gucci</option>
                                                <option value="adidas">Adidas</option>
                                                <option value="prada">Prada</option>
                                                <option value="jordan">Jordan</option>
                                                <option value="converse">Converse</option>
                                                <option value="nike">Nike</option>
                                            </select>
                                        </div>
                                        <!-- shoe size -->
                                        <div class="col-12 text-center text-uppercase font-weight-bold py-2">shoe size(up to 4)</div>
                                        <div class="col-md-3 col-6">
                                            <select name="shoe1" id="formInput">
                                                <option value="">-- Shoe Size --</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <select name="shoe2" id="formInput">
                                                <option value="">-- Shoe Size --</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <select name="shoe3" id="formInput">
                                                <option value="">-- Shoe Size --</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <input type="number" min="0" name="shoe4" id="formInput" placeholder="Enter Shoe Size">
                                        </div>
                                        <!-- shoe size -->
                                    </div>
                                </div>
                                <!-- bags container -->
                                <div class="col-12 show-product-wrapper bags">
                                    <div class="row">
                                        <div class="col-md-4 col-6">
                                            <select name="productUser3" id="formInput">
                                                <option value="">-- Select Product User --</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="unisex">Unisex</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <select name="productType3" id="formInput">
                                                <option value="">-- Bag Type --</option>
                                                <option value="backpack">Back Pack</option>
                                                <option value="suitcase">Suit Case</option>
                                                <option value="handbag">Hand Bag</option>
                                                <option value="briefcase">Brief Case</option>
                                                <option value="travel-bag">Travelling Bag</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <select name="productBrand3" id="formInput">
                                                <option value="">-- Bag Brand --</option>
                                                <option value="armani">Armani</option>
                                                <option value="versace">Versace</option>
                                                <option value="gucci">Gucci</option>
                                                <option value="hermes">Hermes</option>
                                                <option value="prada">Prada</option>
                                                <option value="louis vuitton">Louis Vuitton</option>
                                                <option value="chanel">Chanel</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- fashion-access container -->
                                <div class="col-12 show-product-wrapper fashion-access">
                                    <div class="row">
                                        <div class="col-md-4 col-6">
                                            <select name="productUser4" id="formInput">
                                                <option value="">-- Select Product User --</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="unisex">Unisex</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <select name="productType4" id="formInput">
                                                <option value="">-- Accessory Type --</option>
                                                <option value="watch">Watch</option>
                                                <option value="ring">Ring</option>
                                                <option value="bracelets">Bracelets</option>
                                                <option value="necklaces">Necklaces</option>
                                                <option value="socks">Socks</option>
                                                <option value="neck-tires">Neck Tires</option>
                                                <option value="head-bands">Head Bands</option>
                                                <option value="hair-tires">Hair Tires</option>
                                                <option value="belts">Belts</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <select name="productBrand4" id="formInput">
                                                <option value="">-- Accessories Brand --</option>
                                                <option value="armani">Armani</option>
                                                <option value="versace">Versace</option>
                                                <option value="gucci">Gucci</option>
                                                <option value="hermes">Hermes</option>
                                                <option value="prada">Prada</option>
                                                <option value="lv">Louis Vuitton</option>
                                                <option value="channel">chanel</option>
                                                <option value="reebok">Reebok</option>
                                                <option value="adidas">Adidas</option>
                                                <option value="jordan">Jordan</option>
                                                <option value="converse">Converse</option>
                                                <option value="nike">Nike</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- phone-tablet container -->
                                <div class="col-12 show-product-wrapper phone-tablet">
                                    <div class="row">
                                        <div class="col-md-4 col-6">
                                            <select name="productType5" id="formInput">
                                                <option value="">-- Phones and Tablets Type --</option>
                                                <option value="phones">Phones</option>
                                                <option value="tablets">Tablets</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <select name="productBrand5" id="formInput">
                                                <option value="">-- Brand Name --</option>
                                                <option value="apple">Apple</option>
                                                <option value="samsung">Samsung</option>
                                                <option value="huawei">Huawei</option>
                                                <option value="windows">Windows</option>
                                                <option value="itel">Itel</option>
                                                <option value="xiamoi">Xiaomi</option>
                                                <option value="htc">HTC</option>
                                                <option value="tecno">Tecno</option>
                                                <option value="nokia">Nokia</option>
                                                <option value="blackberry">Blackberry</option>
                                                <option value="infinix">Infinix</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <select name="ram1" id="formInput">
                                                <option value="">-- RAM Size --</option>
                                                <option value="1">1 GIG</option>
                                                <option value="2">2 GIG</option>
                                                <option value="4">4 GIG</option>
                                                <option value="6">6 GIG</option>
                                                <option value="8">8 GIG</option>
                                                <option value="12">12 GIG</option>
                                                <option value="18">18 GIG</option>
                                                <option value="20">20 GIG</option>
                                                <option value="24">24 GIG</option>
                                            </select>
                                        </div>
                                        <!-- storage size -->
                                        <div class="col-12 text-center text-uppercase font-weight-bold py-2">storage size(up to 4)</div>
                                        <div class="col-md-3 col-6">
                                            <select name="storage1" id="formInput">
                                                <option value="">-- Storage Size --</option>
                                                <option value="2">2 GIG</option>
                                                <option value="4">4 GIG</option>
                                                <option value="8">8 GIG</option>
                                                <option value="16">16 GIG</option>
                                                <option value="64">64 GIG</option>
                                                <option value="115">115 GIG</option>
                                                <option value="128">128 GIG</option>
                                                <option value="240">240 GIG</option>
                                                <option value="300">300 GIG</option>
                                                <option value="320">320 GIG</option>
                                                <option value="500">500 GIG</option>
                                                <option value="512">512 GIG</option>
                                                <option value="1000"> 1TB</option>
                                                <option value="2000"> 2TB</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <select name="storage2" id="formInput">
                                                <option value="">-- Storage Size --</option>
                                                <option value="2">2 GIG</option>
                                                <option value="4">4 GIG</option>
                                                <option value="8">8 GIG</option>
                                                <option value="16">16 GIG</option>
                                                <option value="64">64 GIG</option>
                                                <option value="115">115 GIG</option>
                                                <option value="128">128 GIG</option>
                                                <option value="240">240 GIG</option>
                                                <option value="300">300 GIG</option>
                                                <option value="320">320 GIG</option>
                                                <option value="500">500 GIG</option>
                                                <option value="512">512 GIG</option>
                                                <option value="1000"> 1TB</option>
                                                <option value="2000"> 2TB</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <select name="storage3" id="formInput">
                                                <option value="">-- Storage Size --</option>
                                                <option value="2">2 GIG</option>
                                                <option value="4">4 GIG</option>
                                                <option value="8">8 GIG</option>
                                                <option value="16">16 GIG</option>
                                                <option value="64">64 GIG</option>
                                                <option value="115">115 GIG</option>
                                                <option value="128">128 GIG</option>
                                                <option value="240">240 GIG</option>
                                                <option value="300">300 GIG</option>
                                                <option value="320">320 GIG</option>
                                                <option value="500">500 GIG</option>
                                                <option value="512">512 GIG</option>
                                                <option value="1000"> 1TB</option>
                                                <option value="2000"> 2TB</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <input type="number" min="0" name="storage4" id="formInput" placeholder="Enter Storage Size">
                                        </div>
                                        <!-- storage size -->
                                    </div>
                                </div>
                                <!-- phone-tablet-access container -->
                                <div class="col-12 show-product-wrapper phone-tablet-access">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <select name="productType6" id="formInput">
                                                <option value="">-- Accessory Type --</option>
                                                <option value="phone-battery">Phone Batteries</option>
                                                <option value="phone-charger">Phone Charges</option>
                                                <option value="phone-cases">Phone Cases</option>
                                                <option value="ear-buds">Ear Buds</option>
                                                <option value="headsets">Headsets</option>
                                                <option value="screen-protectors">Screen Protectors</option>
                                                <option value="power-banks">Power Banks</option>
                                                <option value="memory-cards">Memory Cards</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <select name="productBrand6" id="formInput">
                                                <option value="">-- Accessories Brand --</option>
                                                <option value="apple">Apple</option>
                                                <option value="samsung">Samsung</option>
                                                <option value="huawei">Huawei</option>
                                                <option value="windows">Windows</option>
                                                <option value="itel">Itel</option>
                                                <option value="xiaomi">Xiaomi</option>
                                                <option value="htc">HTC</option>
                                                <option value="tecno">Tecno</option>
                                                <option value="nokia">Nokia</option>
                                                <option value="blackberry">Blackberry</option>
                                                <option value="infinix">Infinix</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- computer container -->
                                <div class="col-12 show-product-wrapper computer">
                                    <div class="row">
                                        <div class="col-md-4 col-6">
                                            <select name="productType7" id="formInput">
                                                <option value="">-- Computer Type --</option>
                                                <option value="desktop">Desktops</option>
                                                <option value="laptops">Laptops</option>
                                                <option value="ipads">Ipads</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <select name="productBrand7" id="formInput">
                                                <option value="">-- Brand Name --</option>
                                                <option value="acer">Acer</option>
                                                <option value="apple">Apple</option>
                                                <option value="asus">Asus</option>
                                                <option value="dell">Dell</option>
                                                <option value="hp">HP</option>
                                                <option value="lenovo">Lenovo</option>
                                                <option value="toshiba">Toshiba</option>
                                                <option value="samsung">Samsung</option>
                                                <option value="microsoft">Microsoft</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <select name="processorType" id="formInput">
                                                <option value="">-- Processor Type --</option>
                                                <option value="dual core">Dual Core</option>
                                                <option value="core i3">Core i3</option>
                                                <option value="core i5">Core i5</option>
                                                <option value="core i7">Core i7</option>
                                                <option value="core i9">Core i9</option>
                                                <option value="AMD">AMD</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <select name="storageType" id="formInput">
                                                <option value="">-- Storage Type --</option>
                                                <option value="HDD">HDD</option>
                                                <option value="SSD">SSD</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <select name="ram2" id="formInput">
                                                <option value="">-- RAM Size --</option>
                                                <option value="1">1 GIG</option>
                                                <option value="2">2 GIG</option>
                                                <option value="4">4 GIG</option>
                                                <option value="6">6 GIG</option>
                                                <option value="8">8 GIG</option>
                                                <option value="12">12 GIG</option>
                                                <option value="18">18 GIG</option>
                                                <option value="20">20 GIG</option>
                                                <option value="24">24 GIG</option>
                                            </select>
                                        </div>
                                        <!-- screen size -->
                                        <div class="col-md-4 col-6">
                                            <input type="number" min="0" name="screen1" id="formInput" placeholder="Enter Screen Size">
                                        </div>
                                        <!-- screen size -->
                                        <!-- storage size -->
                                        <div class="col-12 text-center text-uppercase font-weight-bold py-2">ssd/hdd size(up to 4)</div>
                                        <div class="col-md-3 col-6">
                                            <select name="storage21" id="formInput">
                                                <option value="">-- Storage Size --</option>
                                                <option value="115">115 GIG</option>
                                                <option value="128">128 GIG</option>
                                                <option value="240">240 GIG</option>
                                                <option value="300">300 GIG</option>
                                                <option value="320">320 GIG</option>
                                                <option value="500">500 GIG</option>
                                                <option value="512">512 GIG</option>
                                                <option value="1000"> 1TB</option>
                                                <option value="2000"> 2TB</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <select name="storage22" id="formInput">
                                                <option value="">-- Storage Size --</option>
                                                <option value="115">115 GIG</option>
                                                <option value="128">128 GIG</option>
                                                <option value="240">240 GIG</option>
                                                <option value="300">300 GIG</option>
                                                <option value="320">320 GIG</option>
                                                <option value="500">500 GIG</option>
                                                <option value="512">512 GIG</option>
                                                <option value="1000"> 1TB</option>
                                                <option value="2000"> 2TB</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <select name="storage23" id="formInput">
                                                <option value="">-- Storage Size --</option>
                                                <option value="115">115 GIG</option>
                                                <option value="128">128 GIG</option>
                                                <option value="240">240 GIG</option>
                                                <option value="300">300 GIG</option>
                                                <option value="320">320 GIG</option>
                                                <option value="500">500 GIG</option>
                                                <option value="512">512 GIG</option>
                                                <option value="1000"> 1TB</option>
                                                <option value="2000"> 2TB</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <input type="number" min="0" name="storage24" id="formInput" placeholder="Enter Storage Size">
                                        </div>
                                        <!-- storage size -->
                                    </div>
                                </div>
                                <!-- computer-access container -->
                                <div class="col-12 show-product-wrapper computer-access">
                                    <div class="row">
                                        <div class="col-md-6 col-6">
                                            <select name="productType8" id="formInput">
                                                <option value="">-- Accessory Type --</option>
                                                <option value="projectors">Projectors</option>
                                                <option value="keyboard">Keyboards</option>
                                                <option value="mice">Mice</option>
                                                <option value="UPS">UPS</option>
                                                <option value="printers">Printers</option>
                                                <option value="toners">Toners</option>
                                                <option value="inks">Inks</option>
                                                <option value="external-hard-drives">External Hard Drives</option>
                                                <option value="flash-drives">Flash Drive</option>
                                                <option value="monitors">Monitors</option>
                                                <option value="system-units">System Units</option>
                                                <option value="scanners">Scanners</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <select name="productBrand8" id="formInput">
                                                <option value="">-- Brand Name --</option>
                                                <option value="acer">Acer</option>
                                                <option value="apple">Apple</option>
                                                <option value="asus">Asus</option>
                                                <option value="dell">Dell</option>
                                                <option value="hp">HP</option>
                                                <option value="lenovo">Lenovo</option>
                                                <option value="toshiba">Toshiba</option>
                                                <option value="samsung">Samsung</option>
                                                <option value="microsoft">Microsoft</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- electronics container -->
                                <div class="col-12 show-product-wrapper electronics">
                                    <div class="row">
                                        <div class="col-md-4 col-6">
                                            <select name="productType9" id="formInput">
                                                <option value="">-- Electronic Type --</option>
                                                <option value="LED-TVs">LED TVs</option>
                                                <option value="LCD-TVs">LCD TVs</option>
                                                <option value="DVD-players">DVD Players</option>
                                                <option value="speakers">Speakers</option>
                                                <option value="bluetooth-speakers">Bluetooth Speakers</option>
                                                <option value="home-theatre-speakers">Home Theatre Speakers</option>
                                                <option value="head-phones">Head Phones</option>
                                                <option value="air-conditioners">Air Conditioners</option>
                                                <option value="standing-fans">Standing Fans</option>
                                                <option value="ceiling-fans">Ceiling Fans</option>
                                                <option value="electric-irons">Electric Irons</option>
                                                <option value="rice-cookers">Rice Cookers</option>
                                                <option value="microwaves">Microwaves</option>
                                                <option value="toasters">Toasters</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-6">
                                            <select name="productBrand9" id="formInput">
                                                <option value="">-- Brand Name --</option>
                                                <option value="nasco">Nasco</option>
                                                <option value="bruhm">Bruhm</option>
                                                <option value="lg">LG</option>
                                                <option value="tcl">TCL</option>
                                                <option value="sony">Sony</option>
                                                <option value="panasonic">Panasonic</option>
                                                <option value="philips">Philips</option>
                                                <option value="hisense">Hisense</option>
                                                <option value="binaton">Binaton</option>
                                                <option value="samsung">Samsung</option>
                                            </select>
                                        </div>
                                        <!-- screen size -->
                                        <div class="col-md-4 col-6">
                                            <input type="number" name="screen2" id="formInput" placeholder="Enter Screen Size">
                                        </div>
                                    </div>
                                </div>

                                <!-- colors for all products -->
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 text-center text-uppercase font-weight-bold py-2">select product colors(up to 4 colors)</div>
                                        <div class="col-md-3 col-6">
                                            <select name="firstColor" id="formInput">-->
                                                <option value="">-- First Color --</option>
                                                <option value="red">Red</option>
                                                <option value="yellow">Yellow</option>
                                                <option value="green">Green</option>
                                                <option value="black">Black</option>
                                                <option value="white">White</option>
                                                <option value="blue">Blue</option>
                                                <option value="brown">Brown</option>
                                                <option value="pink">Pink</option>
                                                <option value="khaki">khaki</option>
                                                <option value="orange">Orange</option>
                                                <option value="silver">Silver</option>
                                                <option value="gold">Gold</option>
                                                <option value="rose">Rose</option>
                                                <option value="purple">Purple</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <select name="secondColor" id="formInput">-->
                                                <option value="">-- Second Color --</option>
                                                <option value="red">Red</option>
                                                <option value="yellow">Yellow</option>
                                                <option value="green">Green</option>
                                                <option value="black">Black</option>
                                                <option value="white">White</option>
                                                <option value="blue">Blue</option>
                                                <option value="brown">Brown</option>
                                                <option value="pink">Pink</option>
                                                <option value="khaki">khaki</option>
                                                <option value="orange">Orange</option>
                                                <option value="silver">Silver</option>
                                                <option value="gold">Gold</option>
                                                <option value="rose">Rose</option>
                                                <option value="purple">Purple</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <select name="thirdColor" id="formInput">-->
                                                <option value="">-- Third Color --</option>
                                                <option value="red">Red</option>
                                                <option value="yellow">Yellow</option>
                                                <option value="green">Green</option>
                                                <option value="black">Black</option>
                                                <option value="white">White</option>
                                                <option value="blue">Blue</option>
                                                <option value="brown">Brown</option>
                                                <option value="pink">Pink</option>
                                                <option value="khaki">khaki</option>
                                                <option value="orange">Orange</option>
                                                <option value="silver">Silver</option>
                                                <option value="gold">Gold</option>
                                                <option value="rose">Rose</option>
                                                <option value="purple">Purple</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <input type="text" name="forthColor" id="formInput" placeholder="Enter Color">
                                        </div>
                                    </div>
                                </div>
                                <!-- colors for all products -->
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-3 col-6 checkbox-txt">
                                            <input type="checkbox" name="new" id="">
                                            <span>new product</span>
                                        </div>
                                        <div class="col-md-3 col-6 checkbox-txt">
                                            <input type="checkbox" name="featured" id="">
                                            <span>featured product</span>
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="productDesc" id="" rows="5" cols="56" placeholder="Product Desc"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <input type="submit" name="insert" id="formSubmit" value="add product">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- overlay -->
        <div class="overlay"></div>
    </div>
<?php }

include_once "_footer.php";
?>
<script src="../js/categorySwap.js"></script>
<script src="../js/optionFunc.js"></script>
