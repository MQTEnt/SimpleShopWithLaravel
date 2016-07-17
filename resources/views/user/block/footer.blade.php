<footer id="footer">
  <section class="footersocial">
    <div class="container">
      <div class="row">
        <div class="span3 contact">
          <h2>Contact Us </h2>
          <ul>
            <?php
              $phone=DB::table('abouts')->select('value')->where('name','phone')->first();
              $email=DB::table('abouts')->select('value')->where('name','email')->first();
              $twitter=DB::table('abouts')->select('value')->where('name','twitter')->first();
              $facebook=DB::table('abouts')->select('value')->where('name','facebook')->first(); 
            ?>
            <li class="phone">{{$phone->value}}</li>
            <li class="email">{{$email->value}}</li>
          </ul>
        </div>
        <div class="span3 twitter">
          <h2>Twitter </h2>
            {{$twitter->value}}
        </div>
        <div class="span3 facebook">
          <h2>Facebook </h2>
            {{$facebook->value}}
        </div>
      </div>
    </div>
  </section>
  <!-- Footer Link
  <section class="footerlinks">
    <div class="container">
      <div class="info">
        <ul>
          <li><a href="#">Privacy Policy</a>
          </li>
          <li><a href="#">Terms &amp; Conditions</a>
          </li>
          <li><a href="#">Affiliates</a>
          </li>
          <li><a href="#">Newsletter</a>
          </li>
        </ul>
      </div>
      <div id="footersocial">
        <a href="#" title="Facebook" class="facebook">Facebook</a>
        <a href="#" title="Twitter" class="twitter">Twitter</a>
        <a href="#" title="Linkedin" class="linkedin">Linkedin</a>
        <a href="#" title="rss" class="rss">rss</a>
        <a href="#" title="Googleplus" class="googleplus">Googleplus</a>
        <a href="#" title="Skype" class="skype">Skype</a>
        <a href="#" title="Flickr" class="flickr">Flickr</a>
      </div>
    </div>
  </section>
  -->
  <section class="copyrightbottom">
    <div class="container">
      <div class="row">
        <div class="span6"> All images are copyright to their owners. </div>
        <div class="span6 textright"> ShopSimple @ 2012 </div>
      </div>
    </div>
  </section>
  <a id="gotop" href="http://www.mafiashare.net">Back to top</a>
</footer>