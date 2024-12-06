<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/CSS/homepage.css" />
{{-- <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" /> --}}
    @extends('layouts.app')

    @section('title', 'Entropy Gardens')

    @section('content')
    <link rel="stylesheet" href="CSS/homepage.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />
    <title>Entropy Gardens</title>
  </head>
  <body>
    <secion class="hero">
  {{-- </head>
  <body> --}}
   
    <section class="hero">
      <div class="container">
        <div class="heading">
          <span>Entropy Gardens Medical Center</span>
          <p>Where Everyday Brings New Hope -- Entropy Gardens</p>
        </div>
      </div>
    </secion>
    </section>
    <section class="info">
      <div class="contact-container">
        <div class="contact-info">
          <p>
            <i class="fas fa-map-marker-alt"></i>750 E King St <br />
            Lancaster, PA 17601
          </p>
          <p>
            <i class="fas fa-phone"></i>
            <a href="tel:2232879000">+1 (717) 712-8381</a>
          </p>
        </div>
        <div class="map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3048.879919174703!2d-76.32073548429399!3d40.05812007940912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c624d65c13e70d%3A0x91fd342d5394903!2sPenn%20State%20Health%20Lancaster%20Medical%20Center!5e0!3m2!1sen!2sus!4v1700000000000!5m2!1sen!2sus"
            width="400"
            height="300"
            style="border: 0"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
        </div>
      </div>
    </section>
    <footer>
      <div class="footer-container">
        <div class="row">
          <div class="footer-top">
            <a href=""><span>Entropy Gardens</span></a>
            <div class="social">
              <ul>
                <li>
                  <i class="bi bi-facebook"></i>
                </li>
                <li>
                  <i class="bi bi-instagram"></i>
                </li>
                <li>
                  <i class="bi bi-linkedin"></i>
                </li>
                <li>
                  <i class="bi bi-twitter-x"></i>
                </li>
              </ul>
            </div>
          </div>
          <div class="footer-bottom">
            <div class="footer-left">
              <h4>Our Address</h4>
              <ul class="bottom-icon">
                <li>
                  <i class="bi bi-geo-alt"></i>
                  <span>
                    750 E King St, Lancaster Pennsylvania, 17011 United States
                  </span>
                </li>
                <li>
                  <i class="bi bi-envelope"></i>
                  <span> entropygardens@gardens.com </span>
                </li>
                <li>
                  <i class="bi bi-telephone"></i>
                  <span> +1 (717) 712-8381 </span>
                </li>
              </ul>
            </div>
            <div style="width: 200px; height: 96px" class="footer-right">
              <h4>Follow Us!</h4>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>

    @endsection
  {{-- </body>
</html> --}}
