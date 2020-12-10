<footer class="footer-area section_gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-4  col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <?php $company=DB::select('SELECT *  FROM company');
        foreach($company as $value){
            $aboutus=$value->aboutus;
            $fb=$value->facebook;
            $tw=$value->twitter;
            $in=$value->instagram;
             $sn=$value->snapchat;
        }?>
      
    
            <h6>About Us</h6>
            <p>
                <?php

echo htmlspecialchars_decode($aboutus);
?>
            </p>
          </div>
        </div>
       
        <div class="col-lg-4  col-md-6 col-sm-6">
          <div class="single-footer-widget mail-chimp">
            <h6 class="mb-20">Instragram Feed</h6>
            <ul class="instafeed d-flex flex-wrap">
              <li><img src="img/i1.jpg" alt=""></li>
              <li><img src="img/i2.jpg" alt=""></li>
              <li><img src="img/i3.jpg" alt=""></li>
              <li><img src="img/i4.jpg" alt=""></li>
              <li><img src="img/i5.jpg" alt=""></li>
              <li><img src="img/i6.jpg" alt=""></li>
              <li><img src="img/i7.jpg" alt=""></li>
              <li><img src="img/i8.jpg" alt=""></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-2 col-md-6 col-sm-6">
          <div class="single-footer-widget">
            <h6>Follow Us</h6>
            <p>Let us be social</p>
            <div class="footer-social d-flex align-items-center">
              <a href="{{$fb}}"><i class="fa fa-facebook"></i></a>
              <a href="{{$tw}}"><i class="fa fa-twitter"></i></a>
              <a href="{{$in}}"><i class="fa fa-snapchat"></i></a>
              <a href="{{$sn}}"><i class="fa fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
       
      </div>
    </div>
  </footer>