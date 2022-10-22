<x-user-layout>
   <x-slot name="title">
        Contact
    </x-slot>


    <!-- Courses section -->
    <section class="contact-page spad pt-0 mt-4">
        <div class="container">
            <div class="">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="contact-info-warp">
                            <div class="contact-info">
                                <h4>Address</h4>
                                <p>40 Baria Street 133/2, NewYork City, US</p>
                            </div>
                            <div class="contact-info">
                                <h4>Phone</h4>
                                <p>(+88) 111 555 666</p>
                            </div>
                            <div class="contact-info">
                                <h4>Email</h4>
                                <p>infodeercreative@gmail.com</p>
                            </div>
                            <div class="contact-info">
                                <h4>Working time</h4>
                                <p>Monday - Friday: 08 AM - 06 PM</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Google map -->
                        <div class="map map-responsive" id="map-canvas">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.609494378751!2d90.3883305159234!3d23.725635395636747!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8dcc16d5881%3A0x779348afc0f672bf!2sSher-E-Bangla%20Hall%2C%20BUET!5e0!3m2!1sen!2sjp!4v1666416585009!5m2!1sen!2sjp"
                                width="600" height="500" style="border:0;" allowfullscreen frameborder="0"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>


            </div>
            <div class="contact-form spad pb-0">
                <div class="section-title text-center">
                    <h3>INQUIRY</h3>
                </div>
                <livewire:contact-form/>
            </div>
        </div>
    </section>
    <!-- Courses section end-->





</x-user-layout>
