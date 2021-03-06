<div class="card">
    <div class="card-block">
        <p class="card-text">
        <div class="row">
            <div class="col-6 d-flex flex-column text-center">
                <span>Chọn <strong>tháng</strong></span>
                <div class="input-group mb-3 d-block">
                    <select class="custom-select" id="thang">
                        <option value="0" selected>----Tháng----</option>
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            echo '<option value="' . $i . '">' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-6 d-flex flex-column text-center">
                <span>Chọn <strong>ngày</strong></span>
                <div class="input-group mb-3 d-block">
                    <select class="custom-select" id="ngay">
                        <option value="0" selected>----Ngày----</option>
                    </select>
                </div>
            </div>
        </div>
        </p>
        <a id="xem" class="btn btn-primary btn-lg btn-block">Xem</a>
        <hr/>
        <div id="error" class="alert alert-danger d-none">Chọn ngày tháng sinh nhật đi man!</div>
        <div id="thong-tin" class="text-center d-none">
            <img class="sticker" src="" width="100px"/>
            <p></p>
            <strong><h4 id="ten-chom-sao" class="text-danger"></h4></strong>
            <h5 id="ngay-sinh"></h5>
            <p id="mo-ta"></p>
        </div>
        <a href="https://gist.github.com/tvqqq/aadcb46030f1d44ce863ccd8dc10d13b" target="_blank">View gist on <i
                    class="fab fa-github"></i></a>
    </div>
</div>
<script src="<?php echo esc_url(home_url('/')) ?>wp-content/themes/bs4wp/js/chom-sao-cua-tui.js"></script>
</div>

