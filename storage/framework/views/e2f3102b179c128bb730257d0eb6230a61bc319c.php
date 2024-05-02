<footer class="bg-dark footer">
  <div class="container-fluid">
    <div class="d-lg-flex align-items-center row gx-0 gy-4 g-md-5">
      <div class="col-lg-6">
        <?php if(auth()->check()): ?>
          <a href="<?php echo e(route('customer.home')); ?>" class="app-brand-link mb-4">
          <?php else: ?>
            <a href="<?php echo e(route('guest.home')); ?>" class="app-brand-link mb-4">
        <?php endif; ?>
        <span class="app-brand-logo demo me-2 rotate-180">
          <span style="color:#9055FD;">
            <svg width="30" height="24" viewBox="0 0 250 196" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M12.3002 1.25469L56.655 28.6432C59.0349 30.1128 60.4839 32.711 60.4839 35.5089V160.63C60.4839 163.468 58.9941 166.097 56.5603 167.553L12.2055 194.107C8.3836 196.395 3.43136 195.15 1.14435 191.327C0.395485 190.075 0 188.643 0 187.184V8.12039C0 3.66447 3.61061 0.0522461 8.06452 0.0522461C9.56056 0.0522461 11.0271 0.468577 12.3002 1.25469Z"
                fill="currentColor"></path>
              <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
                d="M0 65.2656L60.4839 99.9629V133.979L0 65.2656Z" fill="black"></path>
              <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
                d="M0 65.2656L60.4839 99.0795V119.859L0 65.2656Z" fill="black"></path>
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M237.71 1.22393L193.355 28.5207C190.97 29.9889 189.516 32.5905 189.516 35.3927V160.631C189.516 163.469 191.006 166.098 193.44 167.555L237.794 194.108C241.616 196.396 246.569 195.151 248.856 191.328C249.605 190.076 250 188.644 250 187.185V8.09597C250 3.64006 246.389 0.027832 241.935 0.027832C240.444 0.027832 238.981 0.441882 237.71 1.22393Z"
                fill="currentColor"></path>
              <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
                d="M250 65.2656L189.516 99.8897V135.006L250 65.2656Z" fill="black"></path>
              <path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
                d="M250 65.2656L189.516 99.0497V120.886L250 65.2656Z" fill="black"></path>
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z"
                fill="currentColor"></path>
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z"
                fill="white" fill-opacity="0.15"></path>
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z"
                fill="currentColor"></path>
              <path fill-rule="evenodd" clip-rule="evenodd"
                d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z"
                fill="white" fill-opacity="0.3"></path>
            </svg>
          </span>
        </span>
        <span class="app-brand-text demo footer-link fw-semibold ms-1">Warung Digital</span>
        </a>
        <p class="footer-text footer-logo-description mb-4">
          Most Powerful &amp; Comprehensive 🤩 Laravel Admin Template with Elegant Material Design &amp; Unique
          Layouts.
        </p>
        <form>
          <div class="d-flex mt-2 gap-3">
            <div class="form-floating form-floating-outline w-px-250">
              <input type="text" class="form-control bg-transparent" id="newsletter-1" placeholder="Your email"
                fdprocessedid="udhaku">
              <label for="newsletter-1">Subscribe</label>
            </div>
            <button type="submit" class="btn btn-primary waves-effect waves-light"
              fdprocessedid="golq1">Subscribe</button>
          </div>
        </form>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <h6 class="footer-title mb-4 text-white">Demos</h6>
        <ul class="list-unstyled mb-0">
          <li class="mb-3">
            <a href="javascript:void(0)" target="_blank" class="footer-link">Vertical Layout</a>
          </li>
          <li class="mb-3">
            <a href="javascript:void(0)" target="_blank" class="footer-link">Horizontal Layout</a>
          </li>
          <li class="mb-3">
            <a href="javascript:void(0)" target="_blank" class="footer-link">Bordered Layout</a>
          </li>
          <li class="mb-3">
            <a href="javascript:void(0)" target="_blank" class="footer-link">Semi Dark Layout</a>
          </li>
          <li>
            <a href="javascript:void(0)" target="_blank" class="footer-link">Dark Layout</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <h6 class="footer-title mb-4 text-white">Pages</h6>
        <ul class="list-unstyled mb-0">
          <li class="mb-3">
            <a href="javascript:void(0)" class="footer-link">Pricing</a>
          </li>
          <li class="mb-3">
            <a href="javascript:void(0)" class="footer-link">Payment<span
                class="badge rounded-pill bg-primary ms-2">New</span></a>
          </li>
          <li class="mb-3">
            <a href="javascript:void(0)" class="footer-link">Checkout</a>
          </li>
          <li class="mb-3">
            <a href="javascript:void(0)" class="footer-link">Help Center</a>
          </li>
          <li>
            <a href="<?php echo e(route('login')); ?>" target="_blank" class="footer-link">Login/Register</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-4">
        
      </div>
    </div>
  </div>
  </div>
  <div class="footer-bottom py-3">
    <div
      class="container d-lg-flex flex-wrap align-items-center justify-content-between flex-md-row flex-column text-center text-md-start">
      <div class="mb-2 mb-md-0">
        <span class="footer-text">©
          <script>
            document.write(new Date().getFullYear());
          </script> Copyrights. Made with <i class="tf-icons mdi mdi-heart text-danger"></i> by
        </span>
        <a href="https://themeselection.com" target="_blank" class="footer-link fw-medium footer-theme-link">Kyy
          Studio</a>
      </div>
      <div>
        <a href="https://github.com/rezkiandra" class="footer-link me-2" target="_blank"><i
            class="mdi mdi-github"></i></a>
        <a href="https://facebook.com/kyyzfe" class="footer-link me-2" target="_blank"><i
            class="mdi mdi-facebook"></i></a>
        <a href="https://wa.me/+6289693890856" class="footer-link me-2" target="_blank"><i
            class="mdi mdi-whatsapp"></i></a>
        <a href="https://www.instagram.com/kyy.fe" class="footer-link" target="_blank"><i
            class="mdi mdi-instagram"></i></a>
      </div>
    </div>
  </div>
</footer>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/footer-guest.blade.php ENDPATH**/ ?>