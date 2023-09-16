<!-- jquery -->
<script src="<?= base_url("assets/front_end/modern/js/jquery.min.js") ?>"></script>

<!-- bootstrap -->
<script src="<?= base_url("assets/front_end/modern/bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js") ?>"></script>

<!-- font awesome -->
<script src="<?= base_url('assets/front_end/modern/fontawesome-free-6.4.0-web/js/all.min.js') ?>"></script>

<!-- jssocial -->
<script src="<?= base_url('assets/front_end/modern/js/jssocials.min.js') ?>"></script>

<!-- select 2 -->
<script src="<?= base_url('assets/front_end/modern/js/select2.full.min.js') ?>"></script>

<!-- sweetalert2 -->
<script src="<?= base_url('assets/front_end/modern/js/sweetalert2.all.min.js') ?>"></script>



<!-- optionally if you need to use a theme, then include the theme file as mentioned below -->
<!-- <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-star-rating@4.0.7/themes/krajee-svg/theme.js"></script> -->

<!-- Swiper JS -->
<script src="<?= base_url("assets/front_end/modern/js/swiper-js-bundle.js") ?>"></script>

<!-- lazy-load js -->
<script async src="<?= base_url("assets/front_end/modern/js/lazy-load.min.js") ?>"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.8.3/dist/lazyload.min.js"></script> -->

<!-- star rating js -->
<script src="<?= base_url('assets/front_end/modern/js/star-rating.js') ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/front_end/modern/js/star-rating.min.js') ?>" type="text/javascript"></script>

<!-- bootstrap table -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.22.1/bootstrap-table.min.js"></script>


<!-- Xzoom js -->
<script src="<?= base_url('assets/front_end/modern/xZoom-master/dist/xzoom.min.js') ?>"></script>

<!-- Xzoom js -->
<script src="https://www.elevateweb.co.uk/wp-content/themes/radial/jquery.elevatezoom.min.js"></script>

<!-- daterangepicker js -->
<script src="<?= base_url('assets/front_end/modern/js/moment.min.js') ?>"></script>
<script src="<?= base_url('assets/front_end/modern/js/daterangepicker.js') ?>"></script>

<!-- Firebase.js -->
<script src="<?= base_url('assets/front_end/modern/js/firebase-app.js') ?>"></script>
<script src="<?= base_url('assets/front_end/modern/js/firebase-auth.js') ?>"></script>
<script src="<?= base_url('assets/front_end/modern/js/firebase-firestore.js') ?>"></script>
<script src="<?= base_url('firebase-config.js') ?>"></script> 

<!-- intlTelInput -->
<script src="<?= base_url('assets/front_end/modern/js/intlTelInput.js') ?>"></script>

<!-- light box -->
<script src="<?= base_url('assets/front_end/modern/js/lightbox.js') ?>"></script>

<!-- lottie animation js -->
<script src="<?= base_url('assets/front_end/modern/js/unpkg.com_@lottiefiles_lottie-player@2.0.2_dist_lottie-player.js') ?>"></script>

<!-- jquery validation -->
<script src="<?= base_url('assets/front_end/modern/js/jquery.validate.min.js') ?>"></script>

<!-- Custom Js -->
<script src="<?= base_url('assets/front_end/modern/js/custom.js') ?>"></script>

<?php if ($this->session->flashdata('message')) { ?>
    <script>
        Toast.fire({
            icon: '<?= $this->session->flashdata('message_type'); ?>',
            title: "<?= $this->session->flashdata('message'); ?>"
        });
    </script>
<?php } ?>