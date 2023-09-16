<main>
    <section class="container py-5 text-center">
        <div style="width: 100%; height: 50vh;">
            <lottie-player src="https://assets7.lottiefiles.com/packages/lf20_evNjeW.json" background="transparent" speed="1" style="width: 100%; height: 50vh;" autoplay></lottie-player>
        </div>
        <div class="order-placed-title"><?= label('order_placed_successfully', 'ORDER PLACED SUCCESSFULLY') ?></div>
        <a class="btn btn-primary mt-3" href="<?= base_url('products') ?>"><?= label('continue_shopping', 'Continue Shopping') ?></a>
    </section>
</main>