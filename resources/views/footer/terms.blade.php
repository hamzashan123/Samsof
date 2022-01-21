<section class="footer-terms-container has-text-white is-size-7">
    <div class="container content-container">
        <div class="columns">
            <div class="column has-text-left has-text-centered-touch">
                <a href="{{ route('terms') }}" class="has-text-white">Terms and Conditions</a>
                <span>•</span>
                <a href="{{ route('privacy') }}" class="has-text-white">Privacy Policy</a>
            </div>
            <div class="column has-text-centered">
                <a href="https://mycalture.co.za" class="has-text-white">D&amp;D by Mycalture</a>
            </div>
            <div class="column has-text-right has-text-centered-touch">
                <p>
                    <span class="is-uppercase">©{{ \Carbon\Carbon::now()->year }} SASMFOS.</span>
                    <span>All rights reserved.</span>
                </p>
            </div>
        </div>
    </div>
</section>