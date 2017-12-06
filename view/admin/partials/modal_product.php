<form id="frm_add_product">
    <!-- Modal Structure -->
    <div id="modal_add_product" class="modal">

        <div class="modal-content">
            <h5>Add Product</h5>
            <br>

            <div class="row">

                <div class="file-field input-field col s12 m6 l6 ">
                    <div class="btn indigo">
                        <span>Image</span>
                        <input type="file" name="image">
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" name="image_proxy">
                    </div>
                </div>

                <div class="col s12 m6 l6 input-field">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" id="name">
                </div>

            </div>

            <div class="row">
                <div class="col s12 m6 l6 input-field">
                    <label for="description">Product Description</label>
                    <textarea class="materialize-textarea" name="description" id="description"></textarea>
                </div>
                <br>

                <div class="col s12 m6 l6 input-field">
                    <label for="price">Product Price</label>
                    <input type="number" name="price" id="price">
                </div>

            </div>

            <div class="row">
                <div class="col s12 m6 l6">
                    <label class="active ">Tag</label>
                    <select name="tag" class=" grey lighten-3 browser-default">
                        <option disabled selected>Select Tag</option>
                        <option value="long sleeves">Long Sleeves</option>
                        <option value="polo">Polo</option>
                        <option value="t-shirt">T-Shirt</option>
                        <option value="shorts">Shorts</option>
                        <option value="jacket">Jacket</option>
                        <option value="skirt">Skirt</option>
                    </select>
                </div>

                <div class="input-field col s12 m6 l6">
                    <input name="quantity" id="quantity" type="number">
                    <label for="quantity">Quantity</label>
                </div>
            </div>


        </div>
        <!--end of modal content-->

        <div class="modal-footer">
            <button type="button" class="btn waves-effect indigo" id="btn_add_product">Submit</button>
        </div>

    </div>
</form>

<!-- Modal Delete -->
<div id="modal_delete" class="modal">

    <form id="frm_delete_product">
        <div class="modal-content">

            <h5>Delete Product</h5>
            <br>
            <p class="center">Are you sure you want to delete this data?</p>

            <div class="row hide">
                <div class="col s12 m12 l12">
                    <label>ID</label>
                    <input type="text" id="d1" name="id" readonly>
                </div>
            </div>


        </div>
    </form>

    <div class="modal-footer">
        <button class="btn waves-effect indigo" id="btn_delete">Ok</button>
    </div>
</div>