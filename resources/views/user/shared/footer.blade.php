<footer class="footer-section pt-5">
    <div class="container footer-top">
        <div class="row">
            <!-- widget -->
            <div class="col-xs-12 col-sm-12 col-lg-4 footer-widget">
                <div class="about-widget">
                    <img src="{{ $logo }}" alt="{{ $name_short }}">
                    <p>{{ $name_short }} <br> {{ $description_short }}</p>

                </div>
            </div>
            <!-- widget -->
            <div class="col-xs-12 col-sm-12 col-lg-4 footer-widget">
                <h6 class="fw-title">USEFUL LINK</h6>
                <div class="dobule-link">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="/about">About us</a></li>
                        <li><a href="/history">History</a></li>
                        <li><a href="{{ route('administration') }}">Administration</a></li>
                        <li><a href="/residents">Residents</a></li>
                    </ul>
                    <ul>
                        <li><a href="/activities">Activities</a></li>
                        <li><a href="{{ route('alumni') }}">Alumins</a></li>
                        <li><a href="{{ route('notice') }}">Notice Board</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="/sitemap.xml">Site map</a></li>
                    </ul>
                </div>
            </div>

            <!-- widget -->
            <div class="col-xs-12 col-sm-12 col-lg-4 footer-widget">
                <h6 class="fw-title">CONTACT</h6>
                <ul class="contact">
                    <li>
                        <p><i class="fa fa-map-marker"></i> {{ $address }}</p>
                    </li>
                    <li>
                        <p><i class="fa fa-phone"></i> {{ $phone }}</p>
                    </li>
                    <li>
                        <p><i class="fa fa-envelope"></i> {{ $email }}</p>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <!-- copyright -->
    <div class="copyright">
        <div class="container">
            <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script> All rights reserved {{ $name_short ?? "Sher-e-Banlga Hall, BUET" }} | This website is developed by <a
                    href="https://www.facebook.com/monzurul.islam1112/" target="_blank">Monzurul ISLAM</a>
                    {{-- | Template by <a href="https://colorlib.com"
                    target="_blank">Colorlib</a> --}}
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
</footer>
